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

$err = $msg = '';
if ($role === 'admin' && isset($_POST['save_manual'])) {
    $rows = $_POST['rows'] ?? [];
    foreach ($rows as $row) {
        $msv = trim($row['msv'] ?? '');
        $hoten = trim($row['hoten'] ?? '');
        $tenhd = trim($row['tenhd'] ?? '');
        $diadiem = trim($row['diadiem'] ?? '');
        $donvi = trim($row['donvi'] ?? '');
        $soluong = intval($row['soluong'] ?? 0);
        $loai = trim($row['loai'] ?? '');
        if (!$msv || !$tenhd || !$loai) continue;

        // Kiểm tra hoạt động đã có chưa
        $stmt_hd = $conn->prepare("SELECT id FROM hoatdong WHERE ten=? LIMIT 1");
        $stmt_hd->execute([$tenhd]);
        $hoatdong_id = $stmt_hd->fetchColumn();
        if (!$hoatdong_id) {
            $now = date('Y-m-d H:i:s');
            $diadiem = $diadiem ?: 'Không rõ';
            $donvi = $donvi ?: 'Nhập tay';
            $soluong = $soluong > 0 ? $soluong : 9999;
            $stmt_new = $conn->prepare("INSERT INTO hoatdong (ten, diadiem, thoigian, donvi, soluong, loai, trangthai) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt_new->execute([$tenhd, $diadiem, $now, $donvi, $soluong, $loai, 'Đã diễn ra']);
            $hoatdong_id = $conn->lastInsertId();
        }

        // Tính điểm theo loại
        $diem = 0;
        if ($loai == '3.1' || $loai == '3.2') $diem = 2;
        elseif ($loai == '2.1' || $loai == '2.2') $diem = 1;
        elseif ($loai == '1.4') $diem = 3;

        // Lưu vào bảng danhsach
        $stmt = $conn->prepare("INSERT INTO danhsach (msv, hoatdong_id, loai, diem) VALUES (?, ?, ?, ?)");
        $stmt->execute([$msv, $hoatdong_id, $loai, $diem]);
        
        // Lưu vào bảng thamgia nếu chưa có
        $stmt2 = $conn->prepare("SELECT 1 FROM thamgia WHERE hoatdong_id=? AND username=?");
        $stmt2->execute([$hoatdong_id, $msv]);
        if (!$stmt2->fetch()) {
            $stmt3 = $conn->prepare("INSERT INTO thamgia (hoatdong_id, username) VALUES (?, ?)");
            $stmt3->execute([$hoatdong_id, $msv]);
        }
    }
    $msg = 'Lưu danh sách thành công!';
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm danh sách tham gia - Đoàn Thanh Niên</title>
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
    /* Bảng nhập liệu đẹp */
    #manual-table {
      background: #fff;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(30,136,229,0.10);
      margin-top: 10px;
      font-size: 17px;
    }
    #manual-table th {
      background: linear-gradient(90deg, #42a5f5 0%, #1e88e5 100%);
      color: #fff;
      font-size: 18px;
      border: none;
      text-align: center;
      padding: 14px 0;
      letter-spacing: 1px;
    }
    #manual-table td {
      background: #f8fbff;
      border: none;
      text-align: center;
      vertical-align: middle;
      padding: 10px 0;
      font-weight: 500;
      font-size: 16px;
      transition: background 0.2s;
    }
    #manual-table input[type="text"] {
      border-radius: 8px;
      border: 1px solid #b3e5fc;
      padding: 6px 10px;
      font-size: 16px;
      width: 100%;
      background: #fff;
      box-shadow: 0 1px 2px rgba(30,136,229,0.04);
      transition: border 0.2s, box-shadow 0.2s;
    }
    #manual-table input[type="text"]:focus {
      border-color: #1e88e5;
      outline: none;
      box-shadow: 0 2px 8px rgba(30,136,229,0.10);
    }
    #manual-table tr:hover td {
      background: #e3f2fd;
    }
    .btn-success {
      border-radius: 8px;
      font-size: 17px;
      padding: 8px 28px;
      font-weight: 500;
      box-shadow: 0 2px 8px rgba(30,136,229,0.08);
      background: linear-gradient(90deg, #42e695 0%, #3bb2b8 100%);
      border: none;
      transition: background 0.2s, box-shadow 0.2s;
    }
    .btn-success:hover {
      background: linear-gradient(90deg, #1e88e5 0%, #42a5f5 100%);
      color: #fff;
      box-shadow: 0 4px 16px rgba(30,136,229,0.16);
    }
    .panel.panel-default {
      border-radius: 16px;
      box-shadow: 0 2px 8px rgba(30,136,229,0.08);
      border: none;
    }
    .alert {
      border-radius: 8px;
      font-size: 16px;
    }
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
              <a href="themhdong.php" class="list-group-item">Thêm hoạt động</a>
              <a href="themds.php" class="list-group-item active">Thêm danh sách tham gia</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-md-9 main-content">
        <h2 class="section-title">THÊM DANH SÁCH THAM GIA</h2>
        <div class="panel panel-default" style="border-radius:12px;box-shadow:0 2px 8px rgba(30,136,229,0.06);padding:30px;">
          <?php if($role === 'admin'): ?>
          <form method="post">
            <div class="form-group">
              <label for="msv" style="font-weight:500;color:#1e88e5;">Mã sinh viên (MSV)</label>
              <input type="text" name="rows[0][msv]" id="msv" class="form-control" required style="border-radius:8px;">
            </div>
            <div class="form-group">
              <label for="hoten" style="font-weight:500;color:#1e88e5;">Họ tên</label>
              <input type="text" name="rows[0][hoten]" id="hoten" class="form-control" style="border-radius:8px;">
            </div>
            <div class="form-group">
              <label for="tenhd" style="font-weight:500;color:#1e88e5;">Tên hoạt động</label>
              <input type="text" name="rows[0][tenhd]" id="tenhd" class="form-control" required style="border-radius:8px;">
            </div>
            <div class="form-group">
              <label for="diadiem" style="font-weight:500;color:#1e88e5;">Địa điểm</label>
              <input type="text" name="rows[0][diadiem]" id="diadiem" class="form-control" style="border-radius:8px;">
            </div>
            <div class="form-group">
              <label for="donvi" style="font-weight:500;color:#1e88e5;">Đơn vị tổ chức</label>
              <input type="text" name="rows[0][donvi]" id="donvi" class="form-control" style="border-radius:8px;">
            </div>
            <div class="form-group">
              <label for="soluong" style="font-weight:500;color:#1e88e5;">Số lượng</label>
              <input type="number" name="rows[0][soluong]" id="soluong" class="form-control" min="1" style="border-radius:8px;">
            </div>
            <div class="form-group">
              <label for="loai" style="font-weight:500;color:#1e88e5;">Loại hoạt động</label>
              <input type="text" name="rows[0][loai]" id="loai" class="form-control" required style="border-radius:8px;">
            </div>
            <button type="submit" name="save_manual" class="btn btn-success">Lưu</button>
          </form>
          <?php if($err): ?><div class="alert alert-danger"><?php echo $err; ?></div><?php endif; ?>
          <?php if($msg): ?><div class="alert alert-success"><?php echo $msg; ?></div><?php endif; ?>
          <?php endif; ?>
          <p>Nhập thông tin 1 bạn tham gia hoạt động. Các trường <b>Tên hoạt động, Loại</b> là bắt buộc.</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
