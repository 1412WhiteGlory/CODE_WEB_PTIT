<?php
session_start();
// Kết nối CSDL (dùng lại cấu hình từ DTN.php)
$servername = "localhost";
$dbusername = "root";
$dbpassword = "1234";
$dbname = "users";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8");
} catch(PDOException $e) {
    die("Kết nối CSDL thất bại: " . $e->getMessage());
}

$registerError = $loginError = $registerSuccess = '';
// Xử lý đăng ký
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    if (!$username || !$email || !$password) {
        $registerError = 'Vui lòng nhập đầy đủ thông tin!';
    } else {
        // Kiểm tra trùng email/username
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
        $stmt->execute([$email, $username]);
        if ($stmt->fetch()) {
            $registerError = 'Email hoặc tên tài khoản đã tồn tại!';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'doanvien')");
            try {
                if ($stmt->execute([$username, $email, $hash])) {
                    // Sau khi đăng ký thành công, chuyển hướng sang trang đăng nhập với thông báo
                    header('Location: login.php?registerSuccess=1');
                    exit();
                } else {
                    $registerError = 'Đăng ký thất bại!';
                }
            } catch (PDOException $e) {
                $registerError = 'Lỗi SQL: ' . $e->getMessage();
            }
        }
    }
}
// Hiển thị thông báo đăng ký thành công nếu có
if (isset($_GET['registerSuccess']) && $_GET['registerSuccess'] == '1') {
    $registerSuccess = 'Đăng ký thành công! Vui lòng đăng nhập.';
}
// Xử lý đăng nhập
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    if (!$email || !$password) {
        $loginError = 'Vui lòng nhập đầy đủ thông tin!';
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            header('Location: DTN.php');
            exit();
        } else {
            $loginError = 'Email hoặc mật khẩu không đúng!';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css"/>
</head>  
<body>
    <div class="container" id="container">

        <div class="form-container register-container">
        <form id="registerForm" action="login.php" method="post">
    <h1>Đăng ký</h1>
    <input
      type="text"
      id="registerUsername"
      name="username"
      placeholder="Tên tài khoản"
      value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>"
    >
    <input
      type="email"
      id="registerEmail"
      name="email"
      placeholder="Email"
      value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"
    >
    <input
      type="password"
      id="registerPassword"
      name="password"
      placeholder="Mật khẩu"
    >
    <div id="registerError" style="color:red;min-height:20px;">
      <?php echo $registerError
          ? "<span style='color:red'>{$registerError}</span>"
          : ($registerSuccess
              ? "<span style='color:green'>{$registerSuccess}</span>"
              : ""); ?>
    </div>
    <button type="submit" name="register">Đăng ký</button>
    …
</form>
        </div>

        <div class="form-container login-container">
        <form id="loginForm" action="login.php" method="post">
    <h1>Đăng nhập</h1>
    <input
      type="email"
      id="loginEmail"
      name="email"
      placeholder="Email"
      value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"
    >
    <input
      type="password"
      id="loginPassword"
      name="password"
      placeholder="Mật khẩu"
    >
    <button type="submit" name="login">Đăng nhập</button>
</form>

        </div>
        
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <p>Nếu bạn đã có tài khoản, vui lòng đăng nhập ở đây</p>
                    <button class="ghost" id="login">Đăng nhập
                        <i class="lni lni-arrow-left login"></i>
                        <a href="DTN.php"></a>
                    </button>
                </div>
                <div class="overlay-panel overlay-right">
                    <p>Nếu bạn chưa có tài khoản, đăng ký để không bỏ lỡ những trải nghiệm</p>
                    <button class="ghost" id="register">Đăng ký
                        <i class="lni lni-arrow-right register"></i>
                    </button>
                </div>
            </div>
        </div>

    </div>

    <script src="login.js"></script>
</body>
</html>


