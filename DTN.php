<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "users";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8");
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

session_start();
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: DTN.php');
    exit();
}

// Kiểm tra nếu user vừa đăng ký và chưa có thông tin cá nhân thì hiển thị popup
$show_profile_popup = false;
if (isset($_SESSION['username'])) {
    $stmt = $conn->prepare("SELECT class, phone, address, join_date, birthday, hometown FROM users WHERE username=?");
    $stmt->execute([$_SESSION['username']]);
    $u = $stmt->fetch(PDO::FETCH_ASSOC);
    if (empty($u['class']) || empty($u['phone']) || empty($u['address']) || empty($u['join_date']) || empty($u['birthday']) || empty($u['hometown'])) {
        $show_profile_popup = true;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang thông tin Đoàn Thanh Niên</title>
  <link rel="stylesheet" href="./bootstrap-3.4.1-dist/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
      font-family: 'Roboto', Arial, sans-serif;
      background-color: #f5f5f5;
    }
    
    /*chữ phần menu */
    .navbar {
      background-color: #3399FF;
      border-bottom: 3px solid #1e88ee;
      box-shadow: 0 2px 5px rgba(55, 0, 255, 0.1);
      margin-bottom: 0;
    }
    
    .navbar-brand {
      display: flex;
      align-items: center;
      height: 70px;
      padding: 10px 15px;
      transition: all 0.3s ease;
    }
    
    .navbar-brand:hover {
      transform: scale(1.05);
    }
    
    .navbar-brand img {
      height: 50px;
      margin-right: 10px;
    }
    
    .navbar h1 {
      color: #FFFFFF;
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
    
    .navbar-nav > li > a:hover {
      color: #1e88ee !important;
      background-color: #f5f5f5 !important;
      transform: translateY(-3px);
    }
    
    /* Login button styles */
    .login-btn {
      padding: 25px 15px !important;
      cursor: pointer;
    }

    .login-btn i {
      font-size: 20px;
    }

    /* Modal styles */
    .modal {
      overflow-y: auto;
      padding-right: 0 !important;
    }

    .modal-content {
      border: none;
      border-radius: 15px;
      box-shadow: 0 5px 25px rgba(0,0,0,0.1);
      max-height: 90vh;
      overflow: hidden;
      position: relative;
    }

    .modal-dialog {
      margin: 20px auto;
      max-width: 500px;
      width: 95%;
      position: relative;
    }

    .modal-header {
      background-color: #3399FF;
      color: white;
      border-radius: 15px 15px 0 0;
      padding: 20px;
      border: none;
      position: relative;
      z-index: 1;
    }

    .modal-header .close {
      color: white;
      opacity: 1;
      text-shadow: none;
      font-size: 24px;
    }

    .modal-header .modal-title {
      font-size: 24px;
      font-weight: 600;
    }

    .modal-body {
      padding: 30px;
      overflow-y: auto;
      max-height: calc(90vh - 80px);
    }

    /* Hide scrollbar for Chrome, Safari and Opera */
    .modal-body::-webkit-scrollbar {
      width: 8px;
    }

    .modal-body::-webkit-scrollbar-track {
      background: #f1f1f1;
      border-radius: 4px;
    }

    .modal-body::-webkit-scrollbar-thumb {
      background: #3399FF;
      border-radius: 4px;
    }

    .modal-body::-webkit-scrollbar-thumb:hover {
      background: #1e88ee;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .modal-body {
      -ms-overflow-style: none;  /* IE and Edge */
      scrollbar-width: thin;  /* Firefox */
      scrollbar-color: #3399FF #f1f1f1;  /* Firefox */
    }

    .form-group {
      margin-bottom: 25px;
    }

    .form-group label {
      font-weight: 500;
      color: #444;
      margin-bottom: 8px;
    }

    .input-group {
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
      border-radius: 8px;
      overflow: hidden;
    }

    .input-group-addon {
      background-color: #f8f9fa;
      border: 1px solid #e9ecef;
      border-right: none;
      padding: 12px 15px;
    }

    .input-group-addon i {
      color: #3399FF;
      font-size: 16px;
    }

    .form-control {
      height: 48px;
      border: 1px solid #e9ecef;
      border-left: none;
      padding: 12px 15px;
      font-size: 15px;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: #3399FF;
      box-shadow: 0 0 0 0.2rem rgba(51, 153, 255, 0.15);
    }

    .btn-login {
      background-color: #3399FF;
      color: #fff;
      width: 100%;
      padding: 14px;
      font-size: 16px;
      font-weight: 600;
      border: none;
      border-radius: 8px;
      transition: all 0.3s ease;
      margin-top: 10px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .btn-login:hover {
      background-color: #1e88ee;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(51, 153, 255, 0.3);
    }

    .register-link {
      text-align: center;
      margin-top: 25px;
      color: #666;
      font-size: 15px;
    }

    .register-link a {
      color: #3399FF;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .register-link a:hover {
      color: #1e88ee;
      text-decoration: none;
    }

    /* Password requirements styles */
    .password-requirements {
      background-color: #f8f9fa;
      border-radius: 8px;
      padding: 15px;
      margin-top: 10px;
    }

    .password-requirements p {
      color: #444;
      font-weight: 500;
      margin-bottom: 10px;
    }

    .password-requirements ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .password-requirements li {
      margin: 8px 0;
      padding-left: 25px;
      position: relative;
      font-size: 14px;
    }

    .password-requirements li:before {
      content: '\f00d';
      font-family: 'FontAwesome';
      position: absolute;
      left: 0;
      color: #dc3545;
    }

    .password-requirements li.valid:before {
      content: '\f00c';
      color: #28a745;
    }

    /* User info dropdown styles */
    .dropdown-menu {
      min-width: 280px;
      padding: 0;
      border: none;
      border-radius: 12px;
      box-shadow: 0 5px 25px rgba(0,0,0,0.1);
      margin-top: 10px;
      overflow: hidden;
    }

    .user-info {
      background-color: #3399FF;
      color: white;
      padding: 20px;
      border-radius: 12px 12px 0 0;
      margin: 0;
    }

    .user-info p {
      margin: 5px 0;
      color: white;
    }

    .user-info p:first-child {
      font-size: 18px;
      font-weight: 600;
    }

    .user-info p:last-child {
      font-size: 14px;
      opacity: 0.9;
    }

    .dropdown-menu > li > a {
      padding: 12px 20px;
      color: #444 !important;
      font-size: 15px;
      transition: all 0.3s ease;
      border: none;
    }

    .dropdown-menu > li > a i {
      width: 20px;
      margin-right: 10px;
      color: #3399FF;
    }

    .dropdown-menu > li > a:hover {
      background-color: #f8f9fa;
      padding-left: 25px;
    }

    .dropdown-menu > li:last-child > a {
      border-radius: 0;
      color: #dc3545 !important;
    }

    .dropdown-menu > li:last-child > a i {
      color: #dc3545;
    }

    /* Login button styles */
    .login-btn {
      padding: 25px 15px !important;
      cursor: pointer;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .login-btn i {
      font-size: 20px;
      margin-right: 8px;
    }

    .login-btn:hover {
      color: #1e88ee !important;
    }

    .dropdown-menu:before {
      content: '';
      position: absolute;
      top: -8px;
      right: 20px;
      width: 0;
      height: 0;
      border-left: 8px solid transparent;
      border-right: 8px solid transparent;
      border-bottom: 8px solid #fff;
    }

    /* Error message styles */
    .error-message {
      background-color: #fff3f3;
      border-left: 4px solid #dc3545;
      color: #dc3545;
      padding: 12px 15px;
      border-radius: 4px;
      margin-bottom: 20px;
      font-size: 14px;
      display: none;
    }
    
    .carousel {
      margin-bottom: 30px;
    }
    
    .carousel-inner > .item > img {
      width: 100%;
      height: 400px;
      object-fit: cover;
    }
    
    /*tin tức*/
    .news-section {
      background-color: var(--white);
      padding: 30px 0;
      margin-bottom: 30px;
    }
    
    .section-title {
      color: #3b5998;
      border-bottom: 2px solid #1e88ee;
      padding-bottom: 10px;
      margin-bottom: 20px;
      font-weight: bold;
    }
    
    .news-item {
      margin-bottom: 20px;
      transition: all 0.3s ease;
      border: 1px solid #eee;
      border-radius: 5px;
      overflow: hidden;
      background-color: #ffffff;
    }
    
    .news-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .news-item img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
    
    .news-content {
      padding: 15px;
    }
    
    .news-title {
      color: #3b5998;
      font-weight: bold;
      margin-top: 0;
    }
    
    .news-date {
      color: #777;
      font-size: 12px;
      margin-bottom: 10px;
    }
    
    .news-summary {
      color: #333;
      margin-bottom: 15px;
    }
    
    .btn-read-more {
      background-color: #1e88ee;
      color: #ffffff;
      border: none;
      padding: 5px 15px;
      border-radius: 3px;
      transition: all 0.3s ease;
    }
    
    .btn-read-more:hover {
      background-color: #3b5998;
      color: #ffffff;
      transform: scale(1.05);
    }
    
    /* Footer  */
    .footer {
      background-color: #3399FF;
      color: #ffffff;
      padding: 40px 0 20px;
    }
    
    .footer h3 {
      color: #ffffff;
      border-bottom: 2px solid #3399FF;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }
    
    .footer p {
      margin-bottom: 10px;
    }
    
    .footer-contact i {
      margin-right: 10px;
      color: #ffffff;
    }
    
    .copyright {
      background-color: rgba(0,0,0,0.2);
      padding: 15px 0;
      margin-top: 20px;
      text-align: center;
    }

    /* Registration styles */
    .register-link {
      text-align: center;
      margin-top: 15px;
      color: #666;
    }

    .register-link a {
      color: #3399FF;
      text-decoration: none;
      font-weight: bold;
    }

    .register-link a:hover {
      text-decoration: underline;
    }

    .form-group .input-group-addon {
      background-color: #f8f9fa;
      border: 1px solid #ddd;
      border-right: none;
    }

    .form-group .form-control {
      border-left: none;
    }

    .password-requirements {
      font-size: 12px;
      color: #666;
      margin-top: 5px;
    }

    .password-requirements ul {
      padding-left: 20px;
      margin: 5px 0;
    }

    .password-requirements li {
      margin: 3px 0;
    }

    .password-requirements li.valid {
      color: #28a745;
    }

    .password-requirements li.invalid {
      color: #dc3545;
    }

    @media (max-height: 700px) {
      .modal-dialog {
        margin: 10px auto;
      }
      
      .modal-body {
        padding: 20px;
        max-height: calc(90vh - 60px);
      }
      
      .form-group {
        margin-bottom: 15px;
      }
      
      .password-requirements {
        margin-top: 5px;
        padding: 10px;
      }
      
      .password-requirements li {
        margin: 5px 0;
      }
    }

    @media (max-width: 480px) {
      .modal-dialog {
        margin: 5px auto;
      }
      
      .modal-body {
        padding: 15px;
        max-height: calc(90vh - 50px);
      }
      
      .form-group label {
        font-size: 14px;
      }
      
      .form-control {
        height: 40px;
        font-size: 14px;
      }
      
      .btn-login {
        padding: 12px;
        font-size: 14px;
      }
    }
  </style>
</head>

<body>
<script src="./bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>  
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
                <li class="user-info">
                  <p><strong>Xin chào!</strong></p>
                  <p>Vui lòng đăng nhập để tiếp tục</p>
                </li>
                <li><a href="login.php"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
              <?php endif; ?>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      <li data-target="#carousel-example-generic" data-slide-to="3"></li>
      <li data-target="#carousel-example-generic" data-slide-to="4"></li>
    </ol>

    <!--ảnh slide-->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="Picture_used/4.png" alt="Hoạt động Đoàn 1">
      </div>

      <div class="item">
        <img src="Picture_used/5.png" alt="Hoạt động Đoàn 2">
      </div>

      <div class="item">
        <img src="Picture_used/1.png" alt="Hoạt động Đoàn 3">
      </div>

      <div class="item">
        <img src="Picture_used/2.png" alt="Hoạt động Đoàn 4">
      </div>

      <div class="item">
        <img src="Picture_used/3.png" alt="Hoạt động Đoàn 5">
      </div>
    </div>

    <!-- điều khiển  -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- thân trang -->
  <section class="news-section">
    <div class="container">
      <h2 class="section-title">TIN TỨC - HOẠT ĐỘNG</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="news-item">
            <img src="Picture_used/hcv.png" alt="Tin tức 1">
            <div class="news-content">
              <h3 class="news-title">Nam sinh duy nhất đạt điểm Giải tích tuyệt đối Olympic Toán toàn quốc</h3>
              <p class="news-date"><i class="fa fa-calendar"></i> 09/04/2025</p>
              <p class="news-summary">Trần Văn Khánh là thí sinh duy nhất đạt 30/30 điểm ở môn Giải tích, trong 650 sinh viên từ 90 trường đại học trong cả nước. Khánh hiện là...</p>
              <a href="tintuc_2.php" class="btn btn-read-more">Xem thêm</a>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="news-item">
            <img src="Picture_used/doan-1.png" alt="Tin tức 2">
            <div class="news-content">
              <h3 class="news-title">Tưng bừng lễ kỷ niệm 94 năm Ngày thành lập Đoàn TNCS Hồ Chí Minh (26/03/1931-26/03/2025)</h3>
              <p class="news-date"><i class="fa fa-calendar"></i> 26/03/2025</p>
              <p class="news-summary">Nhân dịp kỉ niệm 94 năm Ngày thành lập Đoàn, Đoàn thanh niên Học viện đã tổ chức lễ Mít tinh....</p>
              <a href="tintuc_1.php" class="btn btn-read-more">Xem thêm</a>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="news-item">
            <img src="Picture_used/gioto.png" alt="Tin tức 3">
            <div class="news-content">
              <h3 class="news-title">GIỖ TỔ HÙNG VƯƠNG: LINH THIÊNG CỘI NGUỒN, TỰ HÀO DÂN TỘC</h3>
              <p class="news-date"><i class="fa fa-calendar"></i> 07/04/2025</p>
              <p class="news-summary">"Dù ai đi ngược về xuôi - Nhớ ngày giỗ Tổ mùng Mười tháng Ba." Giỗ Tổ Hùng Vương - ngày tìm về nguồn cội thiêng liêng của mỗi người con đất Việt. Chỉ nghe đến tên mà lòng ta dậy lên tự hào, ngời ngời khí chất hùng vĩ của non sông đất nước.</p>
              <a href="tintuc_3.php" class="btn btn-read-more">Xem thêm</a>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-4">
          <div class="news-item">
            <img src="Picture_used/cinematic.jpg" alt="Tin tức 4">
            <div class="news-content">
              <h3 class="news-title">TỌA ĐÀM "CINEMATIC CONNECT: KHI CÔNG NGHỆ HÒA QUYỆN CÙNG NGHỆ THUẬT QUAY PHIM" </h3>
              <p class="news-date"><i class="fa fa-calendar"></i> 05/042025</p>
              <p class="news-summary">Vừa qua, buổi tọa đàm chuyên đề tại Hòa Lạc đã diễn ra trong không khí sôi nổi, thu hút sự quan tâm đông đảo của các bạn sinh viên yêu thích điện ảnh và công nghệ.Chương trình được tổ chức với mục tiêu tạo nên một diễn đàn mở để các bạn....</p>
              <a href="tintuc_4.php" class="btn btn-read-more">Xem thêm</a>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="news-item">
            <img src="Picture_used/game.jpg" alt="Tin tức 5">
            <div class="news-content">
              <h3 class="news-title">WORKSHOP QUY TRÌNH PHÁT TRIỂN & CƠ HỘI VIỆC LÀM TRONG LĨNH VỰC GAME</h3>
              <p class="news-date"><i class="fa fa-calendar"></i> 08/04/2025/0</p>
              <p class="news-summary">Sáng ngày 8/4/2025, tại cơ sở Hòa Lạc – Học viện Công nghệ Bưu chính Viễn thông, buổi workshop với chủ đề "Quy trình phát triển và cơ hội việc làm trong lĩnh vực Game" đã diễn ra trong không khí sôi nổi, </p>
              <a href="tintuc_5.php" class="btn btn-read-more">Xem thêm</a>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="news-item">
            <img src="Picture_used/ckmc.jpg" alt="Tin tức 6">
            <div class="news-content">
              <h3 class="news-title">CHUNG KẾT CUỘC THI MC – MÀN TRANH TÀI ĐẦY CẢM XÚC</h3>
              <p class="news-date"><i class="fa fa-calendar"></i> 29/03/2025</p>
              <p class="news-summary">Tối 27/3, sân khấu chung kết cuộc thi MC Luminary đã bùng nổ với những phần thi ấn tượng đến từ các thí sinh xuất sắc nhất! Không chỉ là cuộc thi tìm kiếm tài năng, đây còn là nơi tỏa sáng của sự tự tin, bản lĩnh và đam mê với nghề dẫn chương trình.</p>
              <a href="tintuc_6.php" class="btn btn-read-more">Xem thêm</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

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
    // Carousel và smooth scroll giữ nguyên
    $('.carousel').carousel({ interval: 3000 });
    $('a[href^="#"]').on('click', function(event) {
      var target = $(this.getAttribute('href'));
      if( target.length ) {
        event.preventDefault();
        $('html, body').stop().animate({ scrollTop: target.offset().top }, 1000);
      }
    });
  </script>

<?php if($show_profile_popup): ?>
<!-- Popup bổ sung thông tin cá nhân -->
<div id="profileModal" class="modal" style="display:block;position:fixed;z-index:9999;left:0;top:0;width:100vw;height:100vh;background:rgba(0,0,0,0.4);">
  <div style="background:#fff;max-width:480px;margin:60px auto;padding:32px;border-radius:16px;box-shadow:0 4px 24px rgba(30,136,229,0.10);position:relative;">
    <h2 style="color:#1e88e5;text-align:center;margin-bottom:28px;">Bổ sung thông tin cá nhân</h2>
    <form id="profileInfoForm">
      <div id="profileInfoFields"></div>
      <button type="submit" class="btn btn-success" style="width:100%;border-radius:8px;">Lưu thông tin</button>
    </form>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', async function() {
  // Lấy thông tin hiện tại
  const res = await fetch('profile.php?ajax=1');
  if (res.ok) {
    const data = await res.json();
    let html = '';
    html += `<label><b>Lớp:</b> <input type='text' name='class' value='${data.class||''}' class='form-control' style='margin-bottom:10px;border-radius:8px;'></label>`;
    html += `<label><b>Số điện thoại:</b> <input type='text' name='phone' value='${data.phone||''}' class='form-control' style='margin-bottom:10px;border-radius:8px;'></label>`;
    html += `<label><b>Địa chỉ:</b> <input type='text' name='address' value='${data.address||''}' class='form-control' style='margin-bottom:10px;border-radius:8px;'></label>`;
    html += `<label><b>Ngày sinh:</b> <input type='date' name='birthday' value='${data.birthday||''}' class='form-control' style='margin-bottom:10px;border-radius:8px;'></label>`;
    html += `<label><b>Quê quán:</b> <input type='text' name='hometown' value='${data.hometown||''}' class='form-control' style='margin-bottom:10px;border-radius:8px;'></label>`;
    html += `<label><b>Ngày vào đoàn:</b> <input type='date' name='join_date' value='${data.join_date||''}' class='form-control' style='margin-bottom:10px;border-radius:8px;'></label>`;
    document.getElementById('profileInfoFields').innerHTML = html;
  }
  // Xử lý submit form
  document.getElementById('profileInfoForm').onsubmit = async function(e) {
    e.preventDefault();
    const form = e.target;
    const data = new FormData(form);
    const res = await fetch('profile.php', {method:'POST', body:data});
    if (res.ok) {
      document.getElementById('profileModal').style.display = 'none';
      location.reload();
    }
  };
});
</script>
<?php endif; ?>
<!-- Popup xem thông tin cá nhân -->
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
