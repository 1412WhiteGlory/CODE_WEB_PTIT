<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$servername = "localhost";
$dbusername = "root";
$dbpassword = "1234";
$dbname = "users";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->exec("set names utf8");

$username = $_SESSION['username'];
$msg = '';
if (isset($_GET['ajax']) && $_GET['ajax'] == '1') {
    $stmt = $conn->prepare("SELECT username, class, phone, address, join_date, birthday, hometown FROM users WHERE username=?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($user);
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $class = $_POST['class'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $join_date = $_POST['join_date'] ?? '';
    $birthday = $_POST['birthday'] ?? '';
    $hometown = $_POST['hometown'] ?? '';
    $stmt = $conn->prepare("UPDATE users SET class=?, phone=?, address=?, join_date=?, birthday=?, hometown=? WHERE username=?");
    $stmt->execute([$class, $phone, $address, $join_date, $birthday, $hometown, $username]);
    $msg = "Cập nhật thông tin thành công!";
}
// Lấy thông tin hiện tại
$stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Bổ sung thông tin cá nhân</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    body { 
      font-family: 'Roboto', Arial, sans-serif; 
      background: #f5f5f5; 
    }
    .profile-form { 
      max-width: 480px; 
      margin: 40px auto; 
      background: #fff; 
      border-radius: 16px; 
      box-shadow: 0 4px 24px rgba(30,136,229,0.10); 
      padding: 32px; 
    }
    h2 { 
      color: #1e88e5; 
      text-align: center; 
      margin-bottom: 28px; 
    }
    label { 
      font-weight: 500; 
      color: #1e88e5; 
      margin-bottom: 6px; 
      display: block; 
    }
    input[type="text"], input[type="date"] { 
      border-radius: 8px; 
      border: 1px solid #b3e5fc; 
      padding: 8px 12px; 
      font-size: 16px; 
      width: 100%; 
      margin-bottom: 18px; 
      background: #f8fbff; 
    }
    .btn-save { 
      border-radius: 8px; 
      font-size: 17px; 
      padding: 8px 28px; 
      font-weight: 500; 
      box-shadow: 0 2px 8px rgba(30,136,229,0.08); 
      background: linear-gradient(90deg, #42e695 0%, #3bb2b8 100%); 
      border: none; 
      color: #fff; 
      transition: background 0.2s, box-shadow 0.2s; 
      display: block; 
      margin: 0 auto; 
    }
    .btn-save:hover { 
      background: linear-gradient(90deg, #1e88e5 0%, #42a5f5 100%); 
      color: #fff; 
      box-shadow: 0 4px 16px rgba(30,136,229,0.16); 
    }
    .alert-success { 
      background: #e3fcec; 
      color: #388e3c; 
      border-radius: 8px; 
      padding: 10px 16px; 
      margin-bottom: 18px; 
      text-align: center; 
    }
  </style>
</head>
<body>
  <form class="profile-form" method="post">
    <h2>Bổ sung thông tin cá nhân</h2>
    <?php if($msg): ?><div class="alert-success"><?php echo $msg; ?></div><?php endif; ?>
    <label for="class">Lớp</label>
    <input type="text" name="class" id="class" value="<?php echo htmlspecialchars($user['class'] ?? ''); ?>">
    <label for="phone">Số điện thoại</label>
    <input type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($user['phone'] ?? ''); ?>">
    <label for="address">Địa chỉ</label>
    <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($user['address'] ?? ''); ?>">
    <label for="birthday">Ngày sinh</label>
    <input type="date" name="birthday" id="birthday" value="<?php echo htmlspecialchars($user['birthday'] ?? ''); ?>">
    <label for="hometown">Quê quán</label>
    <input type="text" name="hometown" id="hometown" value="<?php echo htmlspecialchars($user['hometown'] ?? ''); ?>">
    <label for="join_date">Ngày vào đoàn</label>
    <input type="date" name="join_date" id="join_date" value="<?php echo htmlspecialchars($user['join_date'] ?? ''); ?>">
    <button type="submit" class="btn-save" href="QLDV.php">Lưu thông tin</button>
  </form>
</body>
</html> 