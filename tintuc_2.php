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
          <h1 class="article-title">Nam sinh duy nhất đạt điểm Giải tích tuyệt đối Olympic Toán toàn quốc</h1>
          <div class="article-meta">
            <span class="article-date"><i class="fa fa-calendar"></i> 09/04/2025</span>
            <span class="article-category"><i class="fa fa-folder"></i> Thành tích</span>
          </div>
          <div class="article-image">
            <img src="Picture_used/hcv.png" alt="Trần Văn Khánh - Thí sinh đạt điểm tuyệt đối" class="img-responsive">
          </div>
          <div class="article-text">
            <p>Trong kỳ thi Olympic Toán học sinh viên toàn quốc năm 2025, Trần Văn Khánh - sinh viên lớp CNTT-K65 của Học viện Công nghệ Bưu chính Viễn thông đã xuất sắc trở thành thí sinh duy nhất đạt điểm tuyệt đối 30/30 ở môn Giải tích, trong tổng số 650 sinh viên đến từ 90 trường đại học trên cả nước.</p>
            
            <p>Khánh chia sẻ: "Để đạt được kết quả này, ngoài việc nắm vững kiến thức cơ bản, tôi đã dành nhiều thời gian nghiên cứu các dạng bài tập nâng cao và tham khảo tài liệu từ nhiều nguồn khác nhau. Đặc biệt, tôi rất biết ơn các thầy cô trong khoa đã tận tình hướng dẫn và tạo điều kiện cho tôi được tham gia các buổi bồi dưỡng chuyên sâu."</p>

            <p>Thành tích này không chỉ là niềm tự hào của bản thân Khánh mà còn là vinh dự lớn cho Học viện Công nghệ Bưu chính Viễn thông. Đây là minh chứng cho chất lượng đào tạo và sự nỗ lực không ngừng của cả thầy và trò trong việc nâng cao chất lượng giáo dục.</p>

            <p>PGS.TS Nguyễn Văn A - Trưởng khoa CNTT cho biết: "Khánh là một sinh viên xuất sắc, có tư duy logic tốt và đam mê với môn Toán. Thành tích này là kết quả xứng đáng cho sự nỗ lực không ngừng của em. Chúng tôi rất tự hào về thành tích này và sẽ tiếp tục tạo điều kiện để phát triển tài năng của các sinh viên khác."</p>

            <p>Ngoài thành tích Olympic Toán, Khánh còn là một sinh viên toàn diện với nhiều hoạt động nổi bật:</p>
            <ul>
              <li>Thành viên tích cực của Câu lạc bộ Toán học PTIT</li>
              <li>Đạt giải Nhì cuộc thi Lập trình sinh viên cấp trường</li>
              <li>Tham gia nhiều hoạt động tình nguyện của Đoàn Thanh niên</li>
              <li>GPA 3.8/4.0 trong học kỳ vừa qua</li>
            </ul>

            <p>Với thành tích này, Khánh đã được vinh danh trong buổi lễ tuyên dương sinh viên xuất sắc của Học viện và nhận được nhiều học bổng có giá trị từ các doanh nghiệp đối tác. Đây là động lực để Khánh tiếp tục phấn đấu trong học tập và nghiên cứu khoa học.</p>
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