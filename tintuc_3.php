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
          <h1 class="article-title">GIỖ TỔ HÙNG VƯƠNG: LINH THIÊNG CỘI NGUỒN, TỰ HÀO DÂN TỘC</h1>
          <div class="article-meta">
            <span class="article-date"><i class="fa fa-calendar"></i> 07/04/2025</span>
            <span class="article-category"><i class="fa fa-folder"></i> Văn hóa - Truyền thống</span>
          </div>
          <div class="article-image">
            <img src="Picture_used/gioto.png" alt="Lễ Giỗ Tổ Hùng Vương" class="img-responsive">
          </div>
          <div class="article-text">
            <p>"Dù ai đi ngược về xuôi - Nhớ ngày giỗ Tổ mùng Mười tháng Ba." Câu ca dao quen thuộc ấy đã đi vào tâm thức của mỗi người con đất Việt, trở thành lời nhắc nhở thiêng liêng về cội nguồn dân tộc. Giỗ Tổ Hùng Vương - ngày lễ trọng đại của dân tộc, là dịp để mỗi người Việt Nam hướng về cội nguồn, tri ân công đức các Vua Hùng đã có công dựng nước.</p>
            
            <p>Nhân dịp Giỗ Tổ Hùng Vương năm 2025, Đoàn Thanh niên Học viện Công nghệ Bưu chính Viễn thông đã tổ chức nhiều hoạt động ý nghĩa nhằm giáo dục truyền thống, bồi đắp lòng yêu nước và niềm tự hào dân tộc cho đoàn viên, thanh niên.</p>

            <p>Chương trình được tổ chức với các hoạt động chính:</p>
            <ul>
              <li>Lễ dâng hương tưởng niệm các Vua Hùng tại Đền Hùng (Phú Thọ)</li>
              <li>Triển lãm "Hùng Vương và sự nghiệp dựng nước"</li>
              <li>Hội thi tìm hiểu về lịch sử thời đại Hùng Vương</li>
              <li>Chương trình văn nghệ "Hát về cội nguồn"</li>
            </ul>

            <p>Phát biểu tại buổi lễ, đồng chí Bí thư Đoàn Thanh niên Học viện nhấn mạnh: "Giỗ Tổ Hùng Vương không chỉ là ngày lễ trọng đại của dân tộc mà còn là dịp để mỗi đoàn viên, thanh niên chúng ta ôn lại truyền thống vẻ vang của dân tộc, tự hào về cội nguồn và quyết tâm phấn đấu, rèn luyện để xứng đáng với công lao của các bậc tiền nhân."</p>

            <p>Đặc biệt, trong khuôn khổ chương trình, Đoàn Thanh niên Học viện đã tổ chức chuyến hành hương về Đền Hùng với sự tham gia của hơn 100 đoàn viên, thanh niên tiêu biểu. Tại đây, các bạn đã được tham gia lễ dâng hương trang trọng, tìm hiểu về lịch sử và văn hóa thời đại Hùng Vương thông qua các hiện vật, tư liệu được trưng bày tại Bảo tàng Hùng Vương.</p>

            <p>Chương trình Giỗ Tổ Hùng Vương năm nay đã thu hút sự tham gia đông đảo của đoàn viên, thanh niên Học viện, thể hiện tinh thần đoàn kết, lòng yêu nước và niềm tự hào dân tộc. Đây là dịp để mỗi người con đất Việt, đặc biệt là thế hệ trẻ, thêm tự hào về cội nguồn, quyết tâm phấn đấu xây dựng đất nước ngày càng giàu mạnh.</p>
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