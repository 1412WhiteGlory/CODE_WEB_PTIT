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
          <h1 class="article-title">CHIẾN DỊCH TÌNH NGUYỆN HÈ 2025: "TUỔI TRẺ PTIT VÌ CỘNG ĐỒNG"</h1>
          <div class="article-meta">
            <span class="article-date"><i class="fa fa-calendar"></i> 01/06/2025</span>
            <span class="article-category"><i class="fa fa-folder"></i> Hoạt động - Tình nguyện</span>
          </div>
          <div class="article-image">
            <img src="Picture_used/tinh_nguyen.jpg" alt="Chiến dịch tình nguyện hè 2025" class="img-responsive">
          </div>
          <div class="article-text">
            <p>Sáng ngày 01/6/2025, tại Hội trường lớn của Học viện Công nghệ Bưu chính Viễn thông, Đoàn Thanh niên Học viện đã tổ chức Lễ ra quân Chiến dịch tình nguyện hè 2025 với chủ đề "Tuổi trẻ PTIT vì cộng đồng". Đây là hoạt động thường niên của Đoàn Thanh niên Học viện, nhằm phát huy tinh thần xung kích, tình nguyện của đoàn viên, thanh niên trong việc tham gia các hoạt động vì cộng đồng.</p>
            
            <p>Tham dự buổi lễ có sự hiện diện của:</p>
            <ul>
              <li>TS. Trần Thị A - Phó Giám đốc Học viện</li>
              <li>Đ/c Nguyễn Văn B - Bí thư Đoàn Thanh niên Học viện</li>
              <li>Đại diện các đơn vị đối tác</li>
              <li>Hơn 200 tình nguyện viên là sinh viên của Học viện</li>
            </ul>

            <p>Chiến dịch tình nguyện hè 2025 sẽ diễn ra từ ngày 01/6 đến 31/8/2025 với nhiều hoạt động ý nghĩa:</p>
            <ul>
              <li>Chương trình "Tiếp sức mùa thi": Hỗ trợ thí sinh và người nhà trong kỳ thi THPT Quốc gia 2025</li>
              <li>Chiến dịch "Mùa hè xanh": Tình nguyện tại các địa phương khó khăn</li>
              <li>Chương trình "Hành quân xanh": Bảo vệ môi trường, ứng phó với biến đổi khí hậu</li>
              <li>Chiến dịch "Kỳ nghỉ hồng": Chăm sóc sức khỏe cộng đồng</li>
            </ul>

            <p>Phát biểu tại buổi lễ, TS. Trần Thị A nhấn mạnh: "Chiến dịch tình nguyện hè là cơ hội để các bạn sinh viên rèn luyện kỹ năng, phát huy tinh thần xung kích, tình nguyện vì cộng đồng. Đây cũng là dịp để các bạn trẻ trải nghiệm thực tế, góp phần xây dựng quê hương, đất nước."</p>

            <p>Đ/c Nguyễn Văn B - Bí thư Đoàn Thanh niên Học viện cho biết: "Năm nay, chiến dịch được tổ chức với quy mô lớn hơn, đa dạng các hoạt động hơn. Chúng tôi đã chuẩn bị kỹ lưỡng về nhân lực, vật lực và đặc biệt là các biện pháp đảm bảo an toàn cho tình nguyện viên trong bối cảnh dịch bệnh vẫn còn diễn biến phức tạp."</p>

            <p>Các hoạt động chính của chiến dịch bao gồm:</p>
            <ul>
              <li><strong>Chương trình "Tiếp sức mùa thi":</strong>
                <ul>
                  <li>Hỗ trợ thí sinh và người nhà tại các điểm thi</li>
                  <li>Phát nước, quạt, đồ dùng học tập</li>
                  <li>Hướng dẫn thí sinh và người nhà</li>
                </ul>
              </li>
              <li><strong>Chiến dịch "Mùa hè xanh":</strong>
                <ul>
                  <li>Dạy học cho trẻ em vùng khó khăn</li>
                  <li>Sửa chữa, nâng cấp cơ sở vật chất</li>
                  <li>Tổ chức các hoạt động văn hóa, văn nghệ</li>
                </ul>
              </li>
              <li><strong>Chương trình "Hành quân xanh":</strong>
                <ul>
                  <li>Trồng cây xanh</li>
                  <li>Thu gom rác thải</li>
                  <li>Tuyên truyền bảo vệ môi trường</li>
                </ul>
              </li>
              <li><strong>Chiến dịch "Kỳ nghỉ hồng":</strong>
                <ul>
                  <li>Khám sức khỏe miễn phí</li>
                  <li>Tư vấn dinh dưỡng</li>
                  <li>Phát thuốc cho người dân</li>
                </ul>
              </li>
            </ul>

            <p>Để đảm bảo an toàn cho tình nguyện viên, Ban Tổ chức đã chuẩn bị:</p>
            <ul>
              <li>Trang thiết bị y tế cần thiết</li>
              <li>Khóa tập huấn kỹ năng mềm và an toàn</li>
              <li>Bảo hiểm cho tình nguyện viên</li>
              <li>Kế hoạch dự phòng cho các tình huống khẩn cấp</li>
            </ul>

            <p>Chiến dịch tình nguyện hè 2025 không chỉ là cơ hội để sinh viên PTIT đóng góp sức trẻ cho cộng đồng mà còn là dịp để các bạn trẻ rèn luyện kỹ năng, phát triển bản thân và gắn kết tình bạn, tình đồng chí. Đây là một trong những hoạt động ý nghĩa nhất trong năm của Đoàn Thanh niên Học viện, thể hiện tinh thần "Đâu cần thanh niên có, đâu khó có thanh niên".</p>
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