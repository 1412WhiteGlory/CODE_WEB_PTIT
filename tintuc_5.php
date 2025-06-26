<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tin tức - Đoàn Thanh Niên</title>
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

    .article-content {
      background: white;
      padding: 30px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .article-title {
      color: #3399FF;
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .article-meta {
      color: #666;
      margin-bottom: 20px;
      font-size: 14px;
    }

    .article-meta span {
      margin-right: 20px;
    }

    .article-image {
      margin-bottom: 30px;
    }

    .article-image img {
      width: 100%;
      max-height: 500px;
      object-fit: cover;
      border-radius: 5px;
    }

    .article-text {
      font-size: 16px;
      line-height: 1.8;
      color: #333;
    }

    .article-text p {
      margin-bottom: 20px;
    }

    .article-text ul {
      margin-bottom: 20px;
      padding-left: 20px;
    }

    .article-text li {
      margin-bottom: 10px;
    }

    /* Footer */
    .footer {
      background-color: #3399FF;
      color: #FFFFFF;
      padding: 40px 0 20px;
      margin-top: 40px;
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
          <li><a href="DTN.html">Trang chủ</a></li>
          <li><a href="TC.html">Cơ cấu tổ chức Đoàn</a></li>
          <li><a href="QLDV.html">Quản lý Đoàn viên</a></li>
          <li class="dropdown">
            <a href="#" class="login-btn dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user-circle"></i> Đăng nhập
            </a>
            <ul class="dropdown-menu">
              <li class="user-info">
                <p><strong>Xin chào!</strong></p>
                <p>Vui lòng đăng nhập để tiếp tục</p>
              </li>
              <li><a href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
              <li><a href="#" data-toggle="modal" data-target="#registerModal"><i class="fa fa-user-plus"></i> Đăng ký</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container" style="margin-top: 30px;">
    <div class="row">
      <div class="col-md-12">
        <div class="article-content">
          <h1 class="article-title">LỄ KỶ NIỆM 94 NĂM NGÀY THÀNH LẬP ĐOÀN THANH NIÊN CỘNG SẢN HỒ CHÍ MINH (26/3/1931 - 26/3/2025)</h1>
          <div class="article-meta">
            <span class="article-date"><i class="fa fa-calendar"></i> 26/03/2025</span>
            <span class="article-category"><i class="fa fa-folder"></i> Sự kiện - Lễ kỷ niệm</span>
          </div>
          <div class="article-image">
            <img src="Picture_used/ky_niem.jpg" alt="Lễ kỷ niệm 94 năm thành lập Đoàn" class="img-responsive">
          </div>
          <div class="article-text">
            <p>Sáng ngày 26/3/2025, tại Hội trường lớn của Học viện Công nghệ Bưu chính Viễn thông, Đoàn Thanh niên Học viện đã long trọng tổ chức Lễ kỷ niệm 94 năm Ngày thành lập Đoàn Thanh niên Cộng sản Hồ Chí Minh (26/3/1931 - 26/3/2025).</p>
            
            <p>Tham dự buổi lễ có sự hiện diện của:</p>
            <ul>
              <li>PGS.TS. Nguyễn Văn A - Bí thư Đảng ủy, Giám đốc Học viện</li>
              <li>TS. Trần Thị B - Phó Bí thư Đảng ủy, Phó Giám đốc Học viện</li>
              <li>Đ/c Nguyễn Văn C - Bí thư Đoàn Thanh niên Học viện</li>
              <li>Cùng đông đảo cán bộ, giảng viên và sinh viên của Học viện</li>
            </ul>

            <p>Buổi lễ được mở đầu bằng chương trình văn nghệ đặc sắc với các tiết mục ca múa nhạc ca ngợi truyền thống vẻ vang của Đoàn Thanh niên Cộng sản Hồ Chí Minh. Tiếp theo, các đại biểu đã cùng nhau ôn lại lịch sử 94 năm xây dựng và phát triển của Đoàn Thanh niên, từ những ngày đầu thành lập đến những thành tựu to lớn trong công cuộc xây dựng và bảo vệ Tổ quốc.</p>

            <p>Phát biểu tại buổi lễ, PGS.TS. Nguyễn Văn A nhấn mạnh: "94 năm qua, Đoàn Thanh niên Cộng sản Hồ Chí Minh đã không ngừng lớn mạnh, trở thành lực lượng nòng cốt trong phong trào thanh niên, góp phần quan trọng vào sự nghiệp cách mạng của Đảng và dân tộc. Thế hệ trẻ hôm nay cần tiếp tục phát huy truyền thống vẻ vang đó, ra sức học tập, rèn luyện để xây dựng đất nước ngày càng giàu mạnh."</p>

            <p>Trong khuôn khổ buổi lễ, Đoàn Thanh niên Học viện đã tổ chức nhiều hoạt động ý nghĩa:</p>
            <ul>
              <li>Trao giải thưởng "Sinh viên 5 tốt" cấp Học viện năm 2025</li>
              <li>Khen thưởng các tập thể, cá nhân có thành tích xuất sắc trong công tác Đoàn và phong trào thanh niên</li>
              <li>Kết nạp đoàn viên mới</li>
              <li>Tổ chức các hoạt động giao lưu, văn nghệ</li>
            </ul>

            <p>Đặc biệt, buổi lễ đã vinh dự được đón nhận Bằng khen của Trung ương Đoàn cho Đoàn Thanh niên Học viện vì những thành tích xuất sắc trong công tác Đoàn và phong trào thanh niên năm học 2024-2025.</p>

            <p>Phát biểu tại buổi lễ, đ/c Nguyễn Văn C - Bí thư Đoàn Thanh niên Học viện khẳng định: "Đây là dịp để chúng ta ôn lại truyền thống vẻ vang của Đoàn, đồng thời là cơ hội để mỗi đoàn viên, thanh niên tự nhìn nhận, đánh giá và phấn đấu hoàn thiện bản thân, góp phần xây dựng tổ chức Đoàn ngày càng vững mạnh."</p>

            <p>Buổi lễ kết thúc trong không khí trang trọng, đầy ý nghĩa, để lại nhiều ấn tượng sâu sắc trong lòng mỗi đoàn viên, thanh niên. Đây là dịp để thế hệ trẻ hôm nay tự hào về truyền thống vẻ vang của Đoàn, đồng thời thêm quyết tâm phấn đấu, rèn luyện để xứng đáng với niềm tin của Đảng, Nhà nước và nhân dân.</p>
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
</body>
</html> 