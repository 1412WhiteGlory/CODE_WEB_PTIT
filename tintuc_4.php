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
          <h1 class="article-title">TỌA ĐÀM "CINEMATIC CONNECT: KHI CÔNG NGHỆ HÒA QUYỆN CÙNG NGHỆ THUẬT QUAY PHIM"</h1>
          <div class="article-meta">
            <span class="article-date"><i class="fa fa-calendar"></i> 05/04/2025</span>
            <span class="article-category"><i class="fa fa-folder"></i> Sự kiện - Workshop</span>
          </div>
          <div class="article-image">
            <img src="Picture_used/cinematic.jpg" alt="Tọa đàm Cinematic Connect" class="img-responsive">
          </div>
          <div class="article-text">
            <p>Vừa qua, tại cơ sở Hòa Lạc của Học viện Công nghệ Bưu chính Viễn thông, buổi tọa đàm chuyên đề "Cinematic Connect: Khi Công nghệ Hòa quyện cùng Nghệ thuật Quay phim" đã diễn ra trong không khí sôi nổi, thu hút sự quan tâm đông đảo của các bạn sinh viên yêu thích điện ảnh và công nghệ.</p>
            
            <p>Chương trình được tổ chức với mục tiêu tạo nên một diễn đàn mở để các bạn sinh viên có cơ hội tìm hiểu về sự kết hợp giữa công nghệ hiện đại và nghệ thuật điện ảnh, đồng thời khám phá những cơ hội nghề nghiệp mới trong lĩnh vực này.</p>

            <p>Buổi tọa đàm có sự tham gia của các diễn giả nổi tiếng trong lĩnh vực điện ảnh và công nghệ:</p>
            <ul>
              <li>NSƯT Nguyễn Văn A - Đạo diễn phim truyền hình</li>
              <li>TS. Trần Thị B - Chuyên gia về công nghệ thực tế ảo (VR/AR)</li>
              <li>Anh Nguyễn Văn C - Quay phim chính của một số phim bom tấn Việt Nam</li>
              <li>Chị Lê Thị D - Founder của một startup về công nghệ điện ảnh</li>
            </ul>

            <p>Tại buổi tọa đàm, các diễn giả đã chia sẻ những kinh nghiệm quý báu về:</p>
            <ul>
              <li>Xu hướng phát triển của công nghệ trong ngành điện ảnh</li>
              <li>Cách ứng dụng công nghệ mới trong quay phim và hậu kỳ</li>
              <li>Những kỹ năng cần thiết cho sinh viên muốn theo đuổi lĩnh vực này</li>
              <li>Cơ hội việc làm và thách thức trong ngành</li>
            </ul>

            <p>Đặc biệt, phần thực hành trực tiếp với các thiết bị quay phim hiện đại và phần mềm hậu kỳ đã thu hút sự tham gia nhiệt tình của các bạn sinh viên. Các bạn đã có cơ hội trải nghiệm:</p>
            <ul>
              <li>Quay phim với máy quay chuyên nghiệp</li>
              <li>Sử dụng drone trong quay phim</li>
              <li>Thực hành với phần mềm chỉnh sửa video chuyên nghiệp</li>
              <li>Trải nghiệm công nghệ thực tế ảo trong điện ảnh</li>
            </ul>

            <p>Phát biểu tại buổi tọa đàm, TS. Trần Thị B nhấn mạnh: "Sự kết hợp giữa công nghệ và nghệ thuật điện ảnh đang mở ra những cơ hội mới cho các bạn trẻ. Đây là lĩnh vực đầy tiềm năng, đòi hỏi sự sáng tạo và khả năng thích ứng với công nghệ mới."</p>

            <p>Buổi tọa đàm đã kết thúc thành công với nhiều phản hồi tích cực từ phía sinh viên. Nhiều bạn đã bày tỏ mong muốn được tham gia thêm các chương trình tương tự trong tương lai để có thêm cơ hội học hỏi và phát triển kỹ năng trong lĩnh vực điện ảnh và công nghệ.</p>
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