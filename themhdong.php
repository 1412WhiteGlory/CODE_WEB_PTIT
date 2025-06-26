<?php
session_start();
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'doanvien';

// Kết nối CSDL
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

// Tạo bảng hoatdong nếu chưa có
$conn->exec("CREATE TABLE IF NOT EXISTS hoatdong (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ten VARCHAR(255) NOT NULL,
    diadiem VARCHAR(255) NOT NULL,
    thoigian DATETIME NOT NULL,
    donvi VARCHAR(255) NOT NULL,
    soluong INT NOT NULL,
    loai VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

$err = $msg = '';
if ($role === 'admin' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten = trim($_POST['ten'] ?? '');
    $diadiem = trim($_POST['diadiem'] ?? '');
    $thoigian = $_POST['thoigian'] ?? '';
    $donvi = trim($_POST['donvi'] ?? '');
    $soluong = intval($_POST['soluong'] ?? 0);
    $loai = trim($_POST['loai'] ?? '');
    if (!$ten || !$diadiem || !$thoigian || !$donvi || !$soluong || !$loai) {
        $err = 'Vui lòng nhập đầy đủ thông tin!';
    } else {
        try {
            $stmt = $conn->prepare("INSERT INTO hoatdong (ten, diadiem, thoigian, donvi, soluong, loai) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$ten, $diadiem, $thoigian, $donvi, $soluong, $loai]);
            $msg = 'Tạo hoạt động thành công!';
        } catch (PDOException $e) {
            $err = 'Lỗi: ' . $e->getMessage();
        }
    }
}
// Lấy danh sách hoạt động
$ds_hoatdong = [];
try {
    $stmt = $conn->query("SELECT * FROM hoatdong ORDER BY thoigian DESC");
    $ds_hoatdong = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm hoạt động - Đoàn Thanh Niên</title>
  <link rel="stylesheet" href="./bootstrap-3.4.1-dist/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>
    body { 
        font-family: 'Roboto', Arial, sans-serif; 
        background-color: #f5f5f5; 
    }
    .panel-info { 
        border-color: #1e88e5; 
        box-shadow: 0 2px 8px rgba(30,136,229,0.08); 
        border-radius: 12px; 
        overflow: hidden; 
    }
    .panel-info > .panel-heading { 
        background-color: #1e88e5; 
        color: #fff; 
        font-size: 20px; 
        padding: 18px 20px; 
        border-radius: 12px 12px 0 0; 
        letter-spacing: 1px; 
    }
    .list-group.widget-list { 
        font-size: 18px; 
        border-radius: 0 0 12px 12px; 
        overflow: hidden; 
        margin-bottom: 0; 
    }
    .widget-list .list-group-item { 
        padding: 18px 24px; 
        border: none; 
        background: #f5faff; 
        color: #1e88e5; 
        font-weight: 500; 
        transition: background 0.2s, color 0.2s, box-shadow 0.2s; 
        border-bottom: 1px solid #e3f2fd; 
        position: relative; 
        border-radius: 0 !important; 
    }
    .widget-list .list-group-item:last-child { 
        border-bottom: none; 
        border-radius: 0 0 12px 12px !important; 
    }
    .widget-list .list-group-item:hover, .widget-list .list-group-item:focus { 
        background: #1e88e5; 
        color: #fff; 
        text-decoration: none; 
        box-shadow: 0 2px 8px rgba(30,136,229,0.12); 
        z-index: 2; 
    }
    .widget-sidebar { 
        margin-top: 40px; 
    }
    .main-content { 
        margin-top: 40px; 
    }
    .section-title { 
        color: #0277bd; 
        border-bottom: 2px solid #1e88e5; 
        padding-bottom: 10px; 
        margin-bottom: 20px; 
        font-weight: bold; 
        text-transform: uppercase; 
    }
    .form-group label { font-weight: 500; }
    .table-hoatdong th, .table-hoatdong td { text-align: center; vertical-align: middle; }
  </style>
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="DTN.php">
          <img src="Picture_used/logoDTN_PTIT.png" alt="Logo Đoàn">
          <h1>ĐOÀN THANH NIÊN</h1>
        </a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="DTN.php">Trang chủ</a></li>
          <li><a href="TC.php">Cơ cấu tổ chức Đoàn</a></li>
          <li><a href="QLDV.php">Quản lý Đoàn viên</a></li>
          <li class="dropdown">
            <a href="#" class="login-btn dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user-circle"></i> <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Đăng nhập'; ?>
            </a>
            <ul class="dropdown-menu">
              <li class="user-info">
                <p><strong>Xin chào, <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Khách'; ?>!</strong></p>
              </li>
              <li><a href="#" id="showProfileInfo"><i class="fa fa-id-card"></i> Thông tin cá nhân</a></li>
              <li><a href="?logout=1"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-md-3 widget-sidebar">
        <div class="panel panel-info">
          <div class="panel-heading"><strong>Chức năng</strong></div>
          <div class="list-group widget-list">
            <a href="theodoi.php" class="list-group-item">Theo dõi hoạt động</a>
            <a href="capnhat.php" class="list-group-item">Cập nhật hoạt động</a>
            <a href="bangxh.php" class="list-group-item">Bảng xếp hạng</a>
            <?php if($role === 'admin'): ?>
              <a href="themhdong.php" class="list-group-item active">Thêm hoạt động</a>
              <a href="themds.php" class="list-group-item">Thêm danh sách tham gia</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-md-9 main-content">
        <h2 class="section-title">THÊM HOẠT ĐỘNG</h2>
        <?php if($role !== 'admin'): ?>
          <div class="alert alert-danger">Chỉ admin mới có quyền tạo hoạt động!</div>
        <?php else: ?>
          <?php if($err): ?><div class="alert alert-danger"><?php echo $err; ?></div><?php endif; ?>
          <?php if($msg): ?><div class="alert alert-success"><?php echo $msg; ?></div><?php endif; ?>
          <form method="post" class="panel panel-default" style="border-radius:12px;padding:30px;box-shadow:0 2px 8px rgba(30,136,229,0.06);margin-bottom:30px;">
            <div class="form-group">
              <label for="ten">Tên hoạt động</label>
              <input type="text" class="form-control" name="ten" id="ten" required>
            </div>
            <div class="form-group">
              <label for="diadiem">Địa điểm</label>
              <input type="text" class="form-control" name="diadiem" id="diadiem" required>
            </div>
            <div class="form-group">
              <label for="thoigian">Thời gian</label>
              <input type="datetime-local" class="form-control" name="thoigian" id="thoigian" required>
            </div>
            <div class="form-group">
              <label for="donvi">Đơn vị tổ chức</label>
              <input type="text" class="form-control" name="donvi" id="donvi" required>
            </div>
            <div class="form-group">
              <label for="soluong">Số lượng người tham gia</label>
              <input type="number" class="form-control" name="soluong" id="soluong" min="1" required>
            </div>
            <div class="form-group">
              <label for="loai">Loại hoạt động</label>
              <input type="text" class="form-control" name="loai" id="loai" required>
            </div>
            <button type="submit" class="btn btn-primary">Tạo hoạt động</button>
          </form>
        <?php endif; ?>
        <h3 style="margin-top:40px;">Danh sách hoạt động đã tạo</h3>
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hoatdong" style="background:#fff;border-radius:12px;overflow:hidden;">
            <thead>
              <tr>
                <th>Tên hoạt động</th>
                <th>Địa điểm</th>
                <th>Thời gian</th>
                <th>Đơn vị tổ chức</th>
                <th>Số lượng</th>
                <th>Loại</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($ds_hoatdong as $hd): ?>
                <tr>
                  <td><?php echo htmlspecialchars($hd['ten']); ?></td>
                  <td><?php echo htmlspecialchars($hd['diadiem']); ?></td>
                  <td><?php echo date('d/m/Y H:i', strtotime($hd['thoigian'])); ?></td>
                  <td><?php echo htmlspecialchars($hd['donvi']); ?></td>
                  <td><?php echo htmlspecialchars($hd['soluong']); ?></td>
                  <td><?php echo htmlspecialchars($hd['loai']); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- Popup xem/chỉnh sửa thông tin cá nhân -->
  <div id="profileInfoModal" class="modal" style="display:none;position:fixed;z-index:9999;left:0;top:0;width:100vw;height:100vh;background:rgba(0,0,0,0.4);">
    <div style="background:#fff;max-width:480px;margin:60px auto;padding:32px;border-radius:16px;box-shadow:0 4px 24px rgba(30,136,229,0.10);position:relative;">
      <h2 style="color:#1e88e5;text-align:center;margin-bottom:28px;">Thông tin cá nhân</h2>
      <form id="profileInfoForm">
        <label for="profile_class" style="font-weight:500;color:#1e88e5;">Lớp</label>
        <input type="text" name="class" id="profile_class" class="form-control" style="border-radius:8px;margin-bottom:14px;">
        <label for="profile_phone" style="font-weight:500;color:#1e88e5;">Số điện thoại</label>
        <input type="text" name="phone" id="profile_phone" class="form-control" style="border-radius:8px;margin-bottom:14px;">
        <label for="profile_address" style="font-weight:500;color:#1e88e5;">Địa chỉ</label>
        <input type="text" name="address" id="profile_address" class="form-control" style="border-radius:8px;margin-bottom:14px;">
        <label for="profile_birthday" style="font-weight:500;color:#1e88e5;">Ngày sinh</label>
        <input type="date" name="birthday" id="profile_birthday" class="form-control" style="border-radius:8px;margin-bottom:14px;">
        <label for="profile_hometown" style="font-weight:500;color:#1e88e5;">Quê quán</label>
        <input type="text" name="hometown" id="profile_hometown" class="form-control" style="border-radius:8px;margin-bottom:14px;">
        <label for="profile_join_date" style="font-weight:500;color:#1e88e5;">Ngày vào đoàn</label>
        <input type="date" name="join_date" id="profile_join_date" class="form-control" style="border-radius:8px;margin-bottom:18px;">
        <button type="submit" class="btn btn-success" style="width:100%;border-radius:8px;">Lưu thông tin</button>
        <button type="button" onclick="document.getElementById('profileInfoModal').style.display='none'" class="btn btn-primary" style="margin:18px auto 0 auto;display:block;border-radius:8px;">Đóng</button>
      </form>
    </div>
  </div>
  <script>
  document.getElementById('showProfileInfo')?.addEventListener('click', async function(e) {
    e.preventDefault();
    const res = await fetch('profile.php?ajax=1');
    if (res.ok) {
      const data = await res.json();
      document.getElementById('profile_class').value = data.class || '';
      document.getElementById('profile_phone').value = data.phone || '';
      document.getElementById('profile_address').value = data.address || '';
      document.getElementById('profile_birthday').value = data.birthday || '';
      document.getElementById('profile_hometown').value = data.hometown || '';
      document.getElementById('profile_join_date').value = data.join_date || '';
      document.getElementById('profileInfoModal').style.display = 'block';
    }
  });
  document.getElementById('profileInfoForm').onsubmit = async function(e) {
    e.preventDefault();
    const form = e.target;
    const data = new FormData(form);
    const res = await fetch('profile.php', {method:'POST', body:data});
    if (res.ok) {
      alert('Cập nhật thành công!');
      document.getElementById('profileInfoModal').style.display = 'none';
    }
  };
  </script>
</body>
</html>
