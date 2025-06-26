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
    
    /* Main content */
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

    /* News card */
    .news-card {
      border: 1px solid #ddd;
      border-radius: 4px;
      margin-bottom: 20px;
      background: white;
      transition: transform 0.3s ease;
    }

    .news-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .news-image {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 4px 4px 0 0;
    }

    .news-content {
      padding: 15px;
    }

    .news-title {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
      color: #333;
    }

    .news-date {
      color: #666;
      font-size: 14px;
      margin-bottom: 10px;
    }

    .news-excerpt {
      color: #666;
      margin-bottom: 15px;
    }

    .read-more {
      color: #1e88e5;
      text-decoration: none;
      font-weight: bold;
    }

    .read-more:hover {
      text-decoration: underline;
    }

    /* Footer */
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

    /* Search box */
    .search-container {
      margin-bottom: 20px;
    }
    
    .search-box {
      position: relative;
    }
    
    .search-box input {
      padding-right: 40px;
      border-radius: 20px;
      border: 1px solid #ddd;
      box-shadow: none;
    }
    
    .search-box .btn {
      position: absolute;
      right: 0;
      top: 0;
      border-radius: 0 20px 20px 0;
      background-color: #1e88e5;
      color: white;
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
          <h1 class="article-title">Tưng bừng lễ kỷ niệm 94 năm Ngày thành lập Đoàn TNCS Hồ Chí Minh (26/03/1931-26/03/2025)</h1>
          <div class="article-meta">
            <span class="article-date"><i class="fa fa-calendar"></i> 26/03/2025</span>
            <span class="article-category"><i class="fa fa-folder"></i> Hoạt động Đoàn</span>
          </div>
          <div class="article-image">
            <img src="Picture_used/doan-1.png" alt="Lễ kỷ niệm 94 năm Ngày thành lập Đoàn" class="img-responsive">
          </div>
          <div class="article-text">
            <p>Nhân dịp kỷ niệm 94 năm Ngày thành lập Đoàn TNCS Hồ Chí Minh (26/3/1931 - 26/3/2025), Đoàn Thanh niên Học viện Công nghệ Bưu chính Viễn thông đã tổ chức Lễ Mít tinh kỷ niệm với nhiều hoạt động ý nghĩa.</p>
            
            <p>Buổi lễ diễn ra trong không khí trang trọng, với sự tham gia của đông đảo đoàn viên, thanh niên Học viện. Đây là dịp để mỗi đoàn viên, thanh niên ôn lại truyền thống vẻ vang của Đoàn TNCS Hồ Chí Minh, tự hào về những đóng góp của tuổi trẻ Việt Nam trong sự nghiệp xây dựng và bảo vệ Tổ quốc.</p>

            <p>Phát biểu tại buổi lễ, đồng chí Bí thư Đoàn Thanh niên Học viện nhấn mạnh: "94 năm qua, dưới sự lãnh đạo của Đảng, Đoàn TNCS Hồ Chí Minh đã không ngừng lớn mạnh, trở thành lực lượng xung kích cách mạng, là trường học xã hội chủ nghĩa của thanh niên. Tuổi trẻ PTIT luôn tự hào là một phần của tổ chức Đoàn vững mạnh, luôn nỗ lực phấn đấu, rèn luyện để xứng đáng với truyền thống vẻ vang của Đoàn."</p>

            <p>Trong khuôn khổ buổi lễ, Đoàn Thanh niên Học viện đã tổ chức nhiều hoạt động ý nghĩa như:</p>
            <ul>
              <li>Lễ kết nạp đoàn viên mới</li>
              <li>Trao giải thưởng cho các tập thể, cá nhân có thành tích xuất sắc trong công tác Đoàn</li>
              <li>Triển lãm ảnh về các hoạt động Đoàn nổi bật</li>
              <li>Giao lưu văn nghệ với chủ đề "Tuổi trẻ PTIT - Khát vọng và Sáng tạo"</li>
            </ul>

            <p>Buổi lễ kỷ niệm đã khép lại trong không khí vui tươi, phấn khởi, thể hiện tinh thần đoàn kết, sáng tạo của tuổi trẻ PTIT. Đây là dịp để mỗi đoàn viên, thanh niên tự hào về truyền thống vẻ vang của Đoàn, đồng thời xác định rõ trách nhiệm của mình trong việc tiếp tục phát huy truyền thống, góp phần xây dựng Đoàn Thanh niên Học viện ngày càng vững mạnh.</p>
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

  <!-- Login Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="loginModalLabel">Đăng nhập</h4>
        </div>
        <div class="modal-body">
          <form class="login-form" id="loginForm">
            <div class="form-group">
              <label for="username">Tên đăng nhập</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" id="username" name="username" required>
              </div>
            </div>
            <div class="form-group">
              <label for="password">Mật khẩu</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
            <div class="text-center" style="margin-top: 15px;">
              <p>Chưa có tài khoản? <a href="#" data-toggle="modal" data-target="#registerModal" data-dismiss="modal">Đăng ký ngay</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Register Modal -->
  <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="registerModalLabel">Đăng ký tài khoản</h4>
        </div>
        <div class="modal-body">
          <form class="register-form" id="registerForm">
            <div class="form-group">
              <label for="regFullname">Họ và tên</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" id="regFullname" name="fullname" required>
              </div>
            </div>
            <div class="form-group">
              <label for="regUsername">Tên đăng nhập</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-at"></i></span>
                <input type="text" class="form-control" id="regUsername" name="username" required>
              </div>
            </div>
            <div class="form-group">
              <label for="regEmail">Email</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" class="form-control" id="regEmail" name="email" required>
              </div>
            </div>
            <div class="form-group">
              <label for="regPassword">Mật khẩu</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" id="regPassword" name="password" required>
              </div>
            </div>
            <div class="form-group">
              <label for="regConfirmPassword">Xác nhận mật khẩu</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" id="regConfirmPassword" name="confirmPassword" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
            <div class="text-center" style="margin-top: 15px;">
              <p>Đã có tài khoản? <a href="#" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Đăng nhập</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery and Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="auth.js"></script>
  <script>
    $(document).ready(function() {
      // Handle search
      $('.search-box input').on('keyup', function() {
        const searchTerm = $(this).val().toLowerCase();
        $('.news-card').each(function() {
          const title = $(this).find('.news-title').text().toLowerCase();
          const content = $(this).find('.news-excerpt').text().toLowerCase();
          if (title.includes(searchTerm) || content.includes(searchTerm)) {
            $(this).show();
          } else {
            $(this).hide();
          }
        });
      });

      // Handle category tabs
      $('.news-categories a').on('click', function(e) {
        e.preventDefault();
        const category = $(this).attr('href').substring(1);
        $('.news-categories li').removeClass('active');
        $(this).parent().addClass('active');
        
        if (category === 'all') {
          $('.news-card').show();
        } else {
          $('.news-card').hide();
          $('.news-card[data-category="' + category + '"]').show();
        }
      });

      // Add hover effect to news cards
      $('.news-card').hover(
        function() {
          $(this).css('transform', 'translateY(-5px)');
        },
        function() {
          $(this).css('transform', 'translateY(0)');
        }
      );
    });
  </script>
</body>
</html>



