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
// Lấy danh sách hoạt động
$ds_hoatdong = [];
try {
    $stmt = $conn->query("SELECT * FROM hoatdong ORDER BY thoigian DESC");
    $ds_hoatdong = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {}
// Lấy danh sách thành viên tham gia cho từng hoạt động
$ds_thamgia = [];
if ($ds_hoatdong) {
    $ids = array_column($ds_hoatdong, 'id');
    if ($ids) {
        $in = implode(',', array_map('intval', $ids));
        $stmt = $conn->query("SELECT hoatdong_id, username FROM thamgia WHERE hoatdong_id IN ($in)");
        foreach ($stmt as $row) {
            $ds_thamgia[$row['hoatdong_id']][] = $row['username'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cập nhật hoạt động - Đoàn Thanh Niên</title>
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
    .table-hoatdong th, .table-hoatdong td { text-align: center; vertical-align: middle; }
    .list-thamgia { margin: 0; padding: 0; list-style: none; }
    .list-thamgia li { display: inline-block; margin: 0 8px 8px 0; padding: 4px 10px; background: #e3f2fd; border-radius: 6px; }
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
              <i class="fa fa-user-circle"></i> <?php echo isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ? htmlspecialchars($_SESSION['username']) : 'Đăng nhập'; ?>
            </a>
            <ul class="dropdown-menu">
              <?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']): ?>
                <li class="user-info">
                  <p><strong>Xin chào, <?php echo htmlspecialchars($_SESSION['username']); ?>!</strong></p>
                </li>
                <li><a href="#" id="showProfileInfo"><i class="fa fa-id-card"></i> Thông tin cá nhân</a></li>
                <li><a href="?logout=1"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
              <?php else: ?>
                <li><a href="?login=1"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
              <?php endif; ?>
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
            <a href="capnhat.php" class="list-group-item active">Cập nhật hoạt động</a>
            <a href="bangxh.php" class="list-group-item">Bảng xếp hạng</a>
            <?php if($role === 'admin'): ?>
              <a href="themhdong.php" class="list-group-item">Thêm hoạt động</a>
              <a href="themds.php" class="list-group-item">Thêm danh sách tham gia</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-md-9 main-content">
        <h2 class="section-title">CẬP NHẬT HOẠT ĐỘNG</h2>
        <div class="panel panel-default" style="border-radius:12px;box-shadow:0 2px 8px rgba(30,136,229,0.06);padding:30px;">
          <?php if (empty($ds_hoatdong)): ?>
            <p>Chưa có hoạt động nào được tạo.</p>
          <?php else: ?>
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
                    <th>Thành viên tham gia</th>
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
                      <td>
                        <?php if(!empty($ds_thamgia[$hd['id']])): ?>
                          <ul class="list-thamgia">
                            <?php foreach($ds_thamgia[$hd['id']] as $tv): ?>
                              <li><?php echo htmlspecialchars($tv); ?></li>
                            <?php endforeach; ?>
                          </ul>
                        <?php else: ?>
                          <span class="text-muted">Chưa có ai đăng ký</span>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Popup xem/chỉnh sửa thông tin cá nhân -->
  <div id="profileInfoModal" class="modal" style="display:none;position:fixed;z-index:9999;left:0;top:0;width:100vw;height:100vh;background:rgba(0,0,0,0.4);">
    <div style="background:#fff;max-width:480px;margin:60px auto;padding:32px;border-radius:16px;box-shadow:0 4px 24px rgba(30,136,229,0.10);position:relative;">
      <h2 style="color:#1e88e5;text-align:center;margin-bottom:28px;">Thông tin cá nhân</h2>
      <form id="profileInfoForm">
        <div id="profileInfoFields"></div>
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
      let html = '';
      html += `<label><b>Tên tài khoản:</b> <input type='text' name='username' value='${data.username}' readonly class='form-control' style='margin-bottom:10px;border-radius:8px;'></label>`;
      html += `<label><b>Lớp:</b> <input type='text' name='class' value='${data.class||''}' class='form-control' style='margin-bottom:10px;border-radius:8px;'></label>`;
      html += `<label><b>Số điện thoại:</b> <input type='text' name='phone' value='${data.phone||''}' class='form-control' style='margin-bottom:10px;border-radius:8px;'></label>`;
      html += `<label><b>Địa chỉ:</b> <input type='text' name='address' value='${data.address||''}' class='form-control' style='margin-bottom:10px;border-radius:8px;'></label>`;
      html += `<label><b>Ngày sinh:</b> <input type='date' name='birthday' value='${data.birthday||''}' class='form-control' style='margin-bottom:10px;border-radius:8px;'></label>`;
      html += `<label><b>Quê quán:</b> <input type='text' name='hometown' value='${data.hometown||''}' class='form-control' style='margin-bottom:10px;border-radius:8px;'></label>`;
      html += `<label><b>Ngày vào đoàn:</b> <input type='date' name='join_date' value='${data.join_date||''}' class='form-control' style='margin-bottom:10px;border-radius:8px;'></label>`;
      document.getElementById('profileInfoFields').innerHTML = html;
      document.getElementById('profileInfoModal').style.display = 'block';
    }
  });
  document.getElementById('profileInfoForm').onsubmit = async function(e) {
    e.preventDefault();
    const form = e.target;
    const data = new FormData(form);
    const res = await fetch('profile.php', {method:'POST', body:data});
    if (res.ok) {
      document.getElementById('profileInfoModal').style.display = 'none';
      location.reload();
    }
  };
  </script>
</body>
</html>
