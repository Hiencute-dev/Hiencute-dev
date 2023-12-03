<?php
// Lấy giá trị idDonThuoc từ URL
$idDonThuoc = isset($_GET['idDonThuoc']) ? $_GET['idDonThuoc'] : null;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/style.css">
    <title>Trang đăng nhập</title>
    <!-- Thay đổi đường dẫn của tệp CSS và hình ảnh -->
</head>
<body>
    <div id="header">
        <div class="logo">
            <img src="images/logo.png" alt="">
        </div>
        <div class="menu"><h2>Thuốc</h2> </div>
    </div>
    <div class="container">
        <div class="t">
                <form class="thuoc"  action="them.php" method="GET">
                <input type="hidden" name="idDonThuoc" value="<?php echo $idDonThuoc; ?>">
                    <label for="tenThuoc">Tên Thuốc:</label>
                    <input type="text" name="tenThuoc" required><br>

                    <label for="soLuongUongTrenMotLan">Số Lượng Uống Trên Một Lần:</label>
                    <input type="number" name="soLuongUongTrenMotLan" required><br>

                    <label for="soLanUongTrenMotNgay">Số Lần Uống Trên Một Ngày:</label>
                    <input type="number" name="soLanUongTrenMotNgay" required><br>

                    <label for="soLuong">Số Lượng:</label>
                    <input type="number" name="soLuong" required><br>

                    <label for="donVi">Đơn Vị:</label>
                    <input type="text" name="donVi" required><br>

                    <label for="doiTuongSuDung">Đối Tượng Sử Dụng:</label>
                    <input type="text" name="doiTuongSuDung" required><br>
                    <div class="nut">
                     <input style=" font-size: 20px;" type="submit" value="Thêm Thuốc">
                    </div>
                </form>
        </div>
            
     </div>
           
       
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
            <p>&copy; 2023 Trang web bán hàng. Tất cả các quyền được bảo lưu.</p>
        </div>
    </footer>

</body>
</html>
