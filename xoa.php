<?php
$idDonThuoc = isset($_POST['idDonThuoc']) ? $_POST['idDonThuoc'] : null;
$idThuoc = isset($_POST['idThuoc']) ? $_POST['idThuoc'] : null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $idDonThuoc = $_POST['idDonThuoc'];
    $idThuoc = $_POST['idThuoc'];

    // Thực hiện câu truy vấn xóa thuốc từ cơ sở dữ liệu
    $conn = new mysqli("localhost", "root", "", "cnpm", "3306");
    if ($conn->connect_errno) {
        echo "Kết nối MYSQLi lỗi" . $conn->connect_error;
        exit();
    }

    // Sử dụng câu truy vấn với tham số để tránh SQL injection
    $query = "DELETE FROM chitietdonthuoc WHERE idDonThuoc = ? AND idThuoc = ?";
    
    // Chuẩn bị câu truy vấn
    $stmt = $conn->prepare($query);
    
    // Kiểm tra lỗi khi chuẩn bị câu truy vấn
    if ($stmt === false) {
        echo "Lỗi chuẩn bị câu truy vấn: " . $conn->error;
        exit();
    }

    // Bind các tham số
    $stmt->bind_param("ii", $idDonThuoc, $idThuoc);

    // Thực thi câu truy vấn
    $result = $stmt->execute();

    // Kiểm tra và thông báo kết quả xóa
    if ($result) {
        echo "Thuốc đã được xóa thành công.";
        header("Location: donke.php?idDonThuoc=" . $idDonThuoc);
        exit();
    } else {
        echo "Lỗi khi xóa thuốc: " . $stmt->error;
    }

    // Đóng kết nối cơ sở dữ liệu
    $stmt->close();
    $conn->close();
}
echo "idDonThuoc: " . $idDonThuoc . "<br>";
echo "idThuoc: " . $idThuoc . "<br>";

?>
