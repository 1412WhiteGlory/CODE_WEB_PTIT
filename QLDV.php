<?php
session_start();
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: DTN.php');
    exit();
}
if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
    echo '<!DOCTYPE html><html lang="vi"><head><meta charset="UTF-8"><title>Quản lý Đoàn viên</title></head><body><h3>Bạn cần đăng nhập để xem nội dung này.</h3><a href="login.php" class="btn btn-primary">Đăng nhập</a></body></html>';
    exit();
}
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

// Xử lý CRUD
$crudError = $crudSuccess = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $role === 'admin') {

    // Thêm đoàn viên
    if (isset($_POST['add'])) {
        $member_code = trim($_POST['member_code']);
        $name = trim($_POST['name']);
        $dob = $_POST['dob'];
        $class = trim($_POST['class']);
        $faculty = trim($_POST['faculty']);
        $position = trim($_POST['position']);
        if (!$member_code || !$name || !$dob || !$class || !$faculty || !$position) {
            $crudError = 'Vui lòng nhập đầy đủ thông tin!';
        } else {
            try {
                $stmt = $conn->prepare("INSERT INTO members (member_code, name, dob, class, faculty, position) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$member_code, $name, $dob, $class, $faculty, $position]);
                $crudSuccess = 'Thêm đoàn viên thành công!';
            } catch (PDOException $e) {
                $crudError = 'Lỗi: ' . $e->getMessage();
            }
        }
    }

    // Sửa đoàn viên
    if (isset($_POST['edit'])) {
        $id = (int)$_POST['id'];
        $member_code = trim($_POST['member_code']);
        $name = trim($_POST['name']);
        $dob = $_POST['dob'];
        $class = trim($_POST['class']);
        $faculty = trim($_POST['faculty']);
        $position = trim($_POST['position']);
        if (!$member_code || !$name || !$dob || !$class || !$faculty || !$position) {
            $crudError = 'Vui lòng nhập đầy đủ thông tin!';
        } else {
            try {
                $stmt = $conn->prepare("UPDATE members SET member_code=?, name=?, dob=?, class=?, faculty=?, position=? WHERE id=?");
                $stmt->execute([$member_code, $name, $dob, $class, $faculty, $position, $id]);
                $crudSuccess = 'Cập nhật thông tin thành công!';
            } catch (PDOException $e) {
                $crudError = 'Lỗi: ' . $e->getMessage();
            }
        }
    }
    
    // Xóa đoàn viên
    if (isset($_POST['delete'])) {
        $id = (int)$_POST['id'];
        try {
            $stmt = $conn->prepare("DELETE FROM members WHERE id=?");
            $stmt->execute([$id]);
            $crudSuccess = 'Xóa đoàn viên thành công!';
        } catch (PDOException $e) {
            $crudError = 'Lỗi: ' . $e->getMessage();
        }
    }
}
// Lấy danh sách đoàn viên
$members = [];
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
try {
    if ($search !== '') {
        $searchParam = "%$search%";
        $stmt = $conn->prepare("SELECT * FROM members WHERE member_code LIKE ? OR name LIKE ? OR dob LIKE ? OR class LIKE ? OR faculty LIKE ? OR position LIKE ? ORDER BY id DESC");
        $stmt->execute([$searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam]);
    } else {
        $stmt = $conn->query("SELECT * FROM members ORDER BY id DESC");
    }
    $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $crudError = 'Lỗi: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý Đoàn viên - Đoàn Thanh Niên</title>
  <link rel="stylesheet" href="./bootstrap-3.4.1-dist/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
      font-family: 'Roboto', Arial, sans-serif;
      background-color: #f5f5f5;
    }
    
    /* header */
    .navbar {
      background-color: #3399FF;
      border: none;
      border-radius: 0;
      margin-bottom: 0;
    }
    
    .navbar-brand {
      display: flex;
      align-items: center;
      height: 60px;
      padding: 10px 15px;
    }
    
    .navbar-brand img {
      height: 40px;
      margin-right: 10px;
    }
    
    .navbar-brand h1 {
      color: white;
      margin: 0;
      font-size: 22px;
      font-weight: bold;
    }

    .navbar-nav > li > a {
        color: #FFFFFF !important; 
        font-weight: bold;
        text-transform: uppercase;
        padding-top: 25px;
        padding-bottom: 25px;
        transition: all 0.3s ease;
      }
    
    .navbar-inverse .navbar-nav > li > a {
      color: white;
      font-weight: bold;
      text-transform: uppercase;
    }
    
    .navbar-inverse .navbar-nav > li > a {
        color: white;
      }
      
      .navbar-inverse .navbar-nav > li.active > a,
      .navbar-inverse .navbar-nav > li.active > a:hover,
      .navbar-inverse .navbar-nav > li.active > a:focus {
        color: white;
        background-color: #3399FF;
      }
      
      .navbar-inverse .navbar-nav > li > a:hover,
      .navbar-inverse .navbar-nav > li > a:focus {
        color: white;
        background-color: rgba(255, 255, 255, 0.1);
      }
    
    /* thân trang */
    .content-section {
      padding: 30px 0;
      background-color: white;
    }
    
    .section-title {
      color: #0277bd;
      border-bottom: 2px solid #1e88e5;
      padding-bottom: 10px;
      margin-bottom: 20px;
      font-weight: bold;
      text-transform: uppercase;
    }
    
    /* bảng */
    .table-responsive {
      margin-bottom: 30px;
      border: 1px solid #ddd;
    }
    
    .table {
      margin-bottom: 0;
    }
    
    .table > thead > tr > th {
      background-color: #1e88e5;
      color: white;
      border-bottom: 2px solid #0277bd;
    }
    
    .table-hover > tbody > tr:hover {
      background-color: #e3f2fd;
    }
    
    /* tìm kiếm */
    .search-container {
      margin-bottom: 0;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      width: 100%;
    }
    .search-box {
      position: relative;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 2px 8px rgba(30,136,229,0.10);
      border-radius: 30px;
      background: #fff;
      display: flex;
      align-items: center;
      padding: 2px 8px 2px 18px;
      border: 1.5px solid #1e88e5;
      transition: box-shadow 0.2s, border 0.2s;
    }
    .search-box:focus-within {
      box-shadow: 0 4px 16px rgba(30,136,229,0.18);
      border: 2px solid #3399FF;
    }
    .search-box input {
      border: none;
      outline: none;
      background: transparent;
      box-shadow: none;
      border-radius: 30px;
      padding: 10px 16px 10px 0;
      font-size: 16px;
      width: 100%;
      color: #1e88e5;
    }
    .search-box input::placeholder {
      color: #b0bec5;
      font-style: italic;
    }
    .search-box .btn {
      position: static;
      margin-left: 8px;
      border-radius: 50%;
      background: linear-gradient(135deg, #1e88e5 60%, #3399FF 100%);
      color: #fff;
      width: 38px;
      height: 38px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 2px 8px rgba(30,136,229,0.10);
      border: none;
      transition: background 0.2s, box-shadow 0.2s;
    }
    .search-box .btn:hover, .search-box .btn:focus {
      background: linear-gradient(135deg, #3399FF 60%, #1e88e5 100%);
      box-shadow: 0 4px 16px rgba(30,136,229,0.18);
    }
    @media (max-width: 600px) {
      .search-box {
        max-width: 100%;
        padding: 2px 4px 2px 10px;
      }
      .search-box input {
        font-size: 15px;
        padding: 8px 8px 8px 0;
      }
      .search-box .btn {
        width: 32px;
        height: 32px;
      }
    }
    
    /* Units list */
    .units-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    
    .units-list li {
      padding: 10px 15px;
      border-bottom: 1px solid #eee;
      display: flex;
      justify-content: space-between;
    }
    
    .units-list li:hover {
      background-color: #e3f2fd;
      cursor: pointer;
    }
    
    .units-list .badge {
      background-color: #1e88e5;
    }
    
    /* Footer  */
    .footer {
        background-color: #3399FF;
        color: #FFFFFF;
        padding: 40px 0 20px;
      }
      
      .footer h3 {
        color: var(--white);
        border-bottom: 2px solid var(--main-blue);
        padding-bottom: 10px;
        margin-bottom: 20px;
      }
      
      .footer p {
        margin-bottom: 10px;
      }
      
      .footer-contact i {
        margin-right: 10px;
        color: #FFFFFF;
      }
      
      .copyright {
        background-color: rgba(0,0,0,0.2);
        padding: 15px 0;
        margin-top: 20px;
        text-align: center;
      }

    /* tổng số Đoàn viên */
    .units-list .total-members {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 2px solid #1e88e5;
        font-weight: bold;
      }
      
      .units-list .total-members .badge {
        background-color: #1e88e5;
        font-size: 16px;
      }
      
    .modal-footer button {
      display: inline-block !important;
      visibility: visible !important;
      opacity: 1 !important;
      position: static !important;
      z-index: 10 !important;
    }
    .modal-footer {
      display: flex !important;
      justify-content: flex-end !important;
      gap: 10px;
      background: #fff;
      z-index: 10;
    }
    .modal-body {
      max-height: 60vh;
      overflow-y: auto;
    }
    /* Widget sidebar */
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
    @media (max-width: 991px) {
      .col-md-3 { margin-bottom: 30px; }
    }
    /* Hạ thấp widget xuống */
    .widget-sidebar {
      margin-top: 40px;
    }
    /* Bo góc bảng danh sách đoàn viên */
    .table-responsive {
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(30,136,229,0.06);
    }
    .table > thead > tr > th:first-child {
      border-top-left-radius: 10px;
    }
    .table > thead > tr > th:last-child {
      border-top-right-radius: 10px;
    }
    .table > tbody > tr:last-child > td:first-child {
      border-bottom-left-radius: 10px;
    }
    .table > tbody > tr:last-child > td:last-child {
      border-bottom-right-radius: 10px;
    }
  </style>
</head>
<body>
  <!-- Header -->
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></button>
        <a class="navbar-brand">
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
                <li><a href="login.php"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
              <?php endif; ?>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div id="mainContent">
    <div class="container" style="margin-top: 30px;">
      <div class="row">
        <!-- Widget Sidebar -->
        <div class="col-md-3 widget-sidebar">
          <div class="panel panel-info">
            <div class="panel-heading"><strong>Chức năng</strong></div>
            <div class="list-group widget-list">
              <a href="theodoi.php" class="list-group-item">Theo dõi hoạt động</a>
              <a href="capnhat.php" class="list-group-item">Cập nhật hoạt động</a>
              <a href="bangxh.php" class="list-group-item">Bảng xếp hạng</a>
              <?php if($role === 'admin'): ?>
                <a href="themhdong.php" class="list-group-item">Thêm hoạt động</a>
                <a href="themds.php" class="list-group-item">Thêm danh sách tham gia</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <!-- End Widget Sidebar -->
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-12">
              <h2 class="section-title">QUẢN LÝ ĐOÀN VIÊN</h2>

              <?php if($crudError): ?><div class="alert alert-danger"><?php echo $crudError; ?></div><?php endif; ?>
              <?php if($crudSuccess): ?><div class="alert alert-success"><?php echo $crudSuccess; ?></div><?php endif; ?>

              <!-- Thanh chức năng: Thêm đoàn viên + Tìm kiếm -->
              <div class="row" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; gap: 16px; flex-wrap: nowrap;">
                <div style="flex: 0 0 auto;">
                  <?php if($role === 'admin'): ?>
                    <button type="button" class="btn btn-success" onclick="showAddModal()"><i class="fa fa-plus"></i> Thêm đoàn viên mới</button>
                  <?php endif; ?>
                </div>
                <form method="get" class="search-container" style="margin-bottom: 0; flex: 1 1 0; min-width: 200px; max-width: 350px;">
                  <div class="search-box">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm đoàn viên..." value="<?php echo htmlspecialchars($search); ?>">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                  </div>
                </form>
              </div>

              <!-- Bảng danh sách đoàn viên -->
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Mã ĐV</th>
                      <th>Họ và tên</th>
                      <th>Ngày sinh</th>
                      <th>Lớp</th>
                      <th>Khoa</th>
                      <th>Chức vụ</th>
                      <th>Chức năng</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($members as $m): ?>
                    <tr>
                      <td><?php echo htmlspecialchars($m['member_code']); ?></td>
                      <td><?php echo htmlspecialchars($m['name']); ?></td>
                      <td><?php echo htmlspecialchars($m['dob']); ?></td>
                      <td><?php echo htmlspecialchars($m['class']); ?></td>
                      <td><?php echo htmlspecialchars($m['faculty']); ?></td>
                      <td><?php echo htmlspecialchars($m['position']); ?></td>
                      <td>
                        <button type="button" class="btn btn-primary btn-sm" onclick="showViewModal(<?php echo htmlspecialchars(json_encode($m), ENT_QUOTES, 'UTF-8'); ?>)"><i class="fa fa-eye"></i> Xem</button>
                        <?php if($role === 'admin'): ?>
                          <button type="button" class="btn btn-info btn-sm" onclick="showEditModal(<?php echo htmlspecialchars(json_encode($m), ENT_QUOTES, 'UTF-8'); ?>)"><i class="fa fa-edit"></i> Sửa</button>
                          <button type="button" class="btn btn-danger btn-sm" onclick="showDeleteModal(<?php echo $m['id']; ?>)"><i class="fa fa-trash"></i> Xóa</button>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3>ĐOÀN THANH NIÊN</h3>
          <p>Đoàn Thanh niên Cộng sản Hồ Chí Minh là tổ chức chính trị - xã hội của thanh niên Việt Nam do Đảng Cộng sản Việt Nam và Chủ tịch Hồ Chí Minh sáng lập, lãnh đạo và rèn luyện.</p>
          <p>Đoàn Thanh niên là trường học xã hội chủ nghĩa của thanh niên, là lực lượng dự bị tin cậy của Đảng, là đội quân xung kích cách mạng của thanh niên.</p>
        </div>
        
        <div class="col-md-6">
          <h3>THÔNG TIN LIÊN HỆ</h3>
          <div class="footer-contact">
            <p><i class="fa fa-map-marker"></i> Địa chỉ: Km10, Đường Nguyễn Trãi, Quận Hà Đông, Hà Nội</p>
            <p><i class="fa fa-phone"></i> Điện thoại: (024) 3854 5678</p>
            <p><i class="fa fa-envelope"></i> Email: doanthanhnien@ptit.edu.vn</p>
            <p><i class="fa fa-globe"></i> Website: https://ptit.edu.vn/sinh-vien/doan-thanh-nien/</p>
            <a href="https://www.facebook.com/DoanThanhNienHVCNBCVT">
                <p><i class="fa fa-facebook-square"></i> Facebook: Đoàn Thanh niên PTIT</p>
            </a>
          </div>
        </div>
      </div>
      
      <div class="copyright">
        <p>© 2025 Đoàn Thanh niên - Văn phòng Đoàn Học viện. Tất cả quyền được bảo lưu.</p>
      </div>
    </div>
  </footer>

  <!-- jQuery and Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>

    // Khi bấm nút sửa, điền dữ liệu vào form
    function showEditModal(member) {
      document.getElementById('edit_id').value = member.id;
      document.getElementById('edit_member_code').value = member.member_code;
      document.getElementById('edit_name').value = member.name;
      document.getElementById('edit_dob').value = member.dob;
      document.getElementById('edit_class').value = member.class;
      document.getElementById('edit_faculty').value = member.faculty;
      document.getElementById('edit_position').value = member.position;
      $('#editModal').modal('show');
    }
    function showDeleteModal(id) {
      document.getElementById('delete_id').value = id;
      $('#deleteModal').modal('show');
    }
    function showAddModal() {
      document.getElementById('add_member_code').value = '';
      document.getElementById('add_name').value = '';
      document.getElementById('add_dob').value = '';
      document.getElementById('add_class').value = '';
      document.getElementById('add_faculty').value = '';
      document.getElementById('add_position').value = '';
      $('#addModal').modal('show');
    }
    function showViewModal(member) {
      document.getElementById('view_member_code').textContent = member.member_code;
      document.getElementById('view_name').textContent = member.name;
      document.getElementById('view_dob').textContent = member.dob;
      document.getElementById('view_class').textContent = member.class;
      document.getElementById('view_faculty').textContent = member.faculty;
      document.getElementById('view_position').textContent = member.position;
      $('#viewModal').modal('show');
    }
  </script>
  <!-- Modal Sửa đoàn viên -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="post">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Sửa thông tin đoàn viên</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id" id="edit_id">
            <div class="form-group">
              <label for="edit_member_code">Mã ĐV</label>
              <input type="text" class="form-control" name="member_code" id="edit_member_code" required>
            </div>
            <div class="form-group">
              <label for="edit_name">Họ và tên</label>
              <input type="text" class="form-control" name="name" id="edit_name" required>
            </div>
            <div class="form-group">
              <label for="edit_dob">Ngày sinh</label>
              <input type="date" class="form-control" name="dob" id="edit_dob" required>
            </div>
            <div class="form-group">
              <label for="edit_class">Lớp</label>
              <input type="text" class="form-control" name="class" id="edit_class" required>
            </div>
            <div class="form-group">
              <label for="edit_faculty">Khoa</label>
              <input type="text" class="form-control" name="faculty" id="edit_faculty" required>
            </div>
            <div class="form-group">
              <label for="edit_position">Chức vụ</label>
              <input type="text" class="form-control" name="position" id="edit_position" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            <button type="submit" name="edit" id="editMemberBtn" class="btn btn-primary">Lưu</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Xác nhận xóa -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="post">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Xác nhận xóa</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id" id="delete_id">
            <p>Bạn có chắc chắn muốn xóa đoàn viên này?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
            <button type="submit" name="delete" class="btn btn-danger">Xóa</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Thêm đoàn viên mới -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="post">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Thêm đoàn viên mới</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="add_member_code">Mã ĐV</label>
              <input type="text" class="form-control" name="member_code" id="add_member_code" required>
            </div>
            <div class="form-group">
              <label for="add_name">Họ và tên</label>
              <input type="text" class="form-control" name="name" id="add_name" required>
            </div>
            <div class="form-group">
              <label for="add_dob">Ngày sinh</label>
              <input type="date" class="form-control" name="dob" id="add_dob" required>
            </div>
            <div class="form-group">
              <label for="add_class">Lớp</label>
              <input type="text" class="form-control" name="class" id="add_class" required>
            </div>
            <div class="form-group">
              <label for="add_faculty">Khoa</label>
              <input type="text" class="form-control" name="faculty" id="add_faculty" required>
            </div>
            <div class="form-group">
              <label for="add_position">Chức vụ</label>
              <input type="text" class="form-control" name="position" id="add_position" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            <button type="submit" name="add" id="addMemberBtn" class="btn btn-success">Lưu</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Xem thông tin đoàn viên -->
  <div class="modal fade" id="viewModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Thông tin đoàn viên</h4>
        </div>
        <div class="modal-body">
          <p><strong>Mã ĐV:</strong> <span id="view_member_code"></span></p>
          <p><strong>Họ và tên:</strong> <span id="view_name"></span></p>
          <p><strong>Ngày sinh:</strong> <span id="view_dob"></span></p>
          <p><strong>Lớp:</strong> <span id="view_class"></span></p>
          <p><strong>Khoa:</strong> <span id="view_faculty"></span></p>
          <p><strong>Chức vụ:</strong> <span id="view_position"></span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
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