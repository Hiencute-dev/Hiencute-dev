<?php

// Function to get the list of prescriptions from the database
function getDonThuocList()
{
    $conn = new mysqli("localhost", "root", "", "cnpm", "3306");

    // Check connection
    if ($conn->connect_errno) {
        echo "Kết nối MYSQLi lỗi" . $conn->connect_error;
        exit();
    }

    // Fetch the list of prescriptions from the database table
      $sql = "SELECT donthuoc.idDonThuoc, donthuoc.TenDonThuoc, hosobenhnhan.tenBenhNhan, donthuoc.chuandoan, donthuoc.keluan, donthuoc.ngayKeDon 
    FROM donthuoc
    INNER JOIN hosobenhnhan ON donthuoc.idHoSoBenhNhan = hosobenhnhan.idHoSoBenhNhan";
    $result = $conn->query($sql);

    $donThuocList = [];

    // Process the query result
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Build the prescription data
            $donThuoc = [
              'idDonThuoc' => $row['idDonThuoc'], // Add the idDonThuoc key
                'tenBenhNhan' => $row['tenBenhNhan'],
                'TenDonThuoc' => $row['TenDonThuoc'],
                'chuandoan' => $row['chuandoan'],
                'keluan' => $row['keluan'],
                'ngayKeDon' => $row['ngayKeDon']
            ];

            // Add the prescription to the list
            $donThuocList[] = $donThuoc;
        }
    }

    // Close the database connection
    $conn->close();

    return $donThuocList;
}

// Retrieve the list of prescriptions
$prescriptions = getDonThuocList();

?>

<!DOCTYPE html>
<html>
<head>
    <!-- Head content here -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/style.css">
    <title>Trang đăng nhập</title>
    <!-- Thay đổi đường dẫn của tệp CSS và hình ảnh -->
</head>
<body>
  
<!-- HTML code with PHP code -->
      <div id="header">
        <!-- Header content here -->
        <div class="logo">
            <img src="images/logo.png" alt="">
         </div>
        <div class="menu"><h2>Danh sách đơn thuốc </h2></div>
    </div>
<div class="container">
    <!-- danh sách đơn -->
        <div class="content">
            <table>
                <tr>
                    <!-- Table header content here -->
                   

                    </th>
                    <th>STT</th>
                    <th>Tên bệnh nhân</th>
                    <th>Tên đơn thuốc</th>
                    <th>chuẩn đoán</th>
                    <th>kế luận</th>
                    <th>Ngày kê</th>
                    <th></th>
                </tr>

                <?php
                // Check if $prescriptions is not empty
                if (!empty($prescriptions)) {
                    // Loop through the prescriptions and display the data
                    foreach ($prescriptions as $prescription) {
                        echo "<tr>";
                        // Display table row content here
                        echo "<td>" . $prescription['idDonThuoc'] . "</td>"; // Display the idDonThuoc
                        echo "<td>" . $prescription['tenBenhNhan'] . "</td>"; // Display the patient name
                        echo "<td>" . $prescription['TenDonThuoc'] . "</td>"; // Display the prescription name
                        echo "<td>" . $prescription['chuandoan'] . "</td>"; // Display the diagnosis
                        echo "<td>" . $prescription['keluan'] . "</td>"; // Display the recommendation
                        echo "<td>" . $prescription['ngayKeDon'] . "</td>"; // Display the prescription date
                        // Add more columns as needed
                        echo "<td> <a style='color: black;' href='donke.php?idDonThuoc=" . $prescription["idDonThuoc"] . "'>Xem đơn</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No prescriptions found.</td></tr>";
                }
                ?>

            </table>
            <!-- View button content here -->
            
        </div>
    
    <!-- Footer content here -->
  
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
    
</body>
</html>