<?php

	$mysqli = new mysqli("localhost","root","","cnpm","3306");
    
	// Check connection
	if ($mysqli->connect_errno) {
	  echo "Kết nối MYSQLi lỗi" . $mysqli->connect_error;
	  exit();
	}

// Xử lý đăng nhập
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Thực hiện xử lý đăng nhập ở đây
    // ...

    // Chuyển hướng hoặc hiển thị thông báo thành công/ thất bại
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/style.css">
    <title>Trang đăng nhập</title>
    <link rel="" href="">
</head>
<body>
    <div class="container">
        <div id="header">
            <div class="logo">
                <img src="images/logo.png" alt="">
            </div>
        </div>
        <div class="dn">
            <h2 style="color: aliceblue;">Đăng nhập</h2>
            <form action="xulydangnhap.php" method="POST">
                <div class="form-group">
                    <label style="color: aliceblue;" for="username">Tên đăng nhập:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label style="color: aliceblue;" for="password">Mật khẩu:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <button style="color: aliceblue;" type="submit"> <a href="danhsachbn.php">Đăng nhập</a></button>
                </div>
            </form>
        </div>
        <footer>
            <div class="footer-container">
                <div class="footer-column">
                    <h4>Theo dõi chúng tôi</h4>
                    <ul class="social-icons">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 Trang web kê đơn. Tất cả các quyền được bảo lưu.</p>
            </div>
        </footer>
    </div>
   
</body>
</html>