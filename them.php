<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve data from the form
    $idDonThuoc = isset($_GET["idDonThuoc"]) ? intval($_GET["idDonThuoc"]) : 0;
    $tenThuoc = isset($_GET["tenThuoc"]) ? htmlspecialchars($_GET["tenThuoc"]) : "";
    $soLuongUongTrenMotLan = isset($_GET["soLuongUongTrenMotLan"]) ? intval($_GET["soLuongUongTrenMotLan"]) : 0;
    $soLanUongTrenMotNgay = isset($_GET["soLanUongTrenMotNgay"]) ? intval($_GET["soLanUongTrenMotNgay"]) : 0;
    $soLuong = isset($_GET["soLuong"]) ? intval($_GET["soLuong"]) : 0;
    $donVi = isset($_GET["donVi"]) ? htmlspecialchars($_GET["donVi"]) : "";
    $doiTuongSuDung = isset($_GET["doiTuongSuDung"]) ? htmlspecialchars($_GET["doiTuongSuDung"]) : "";

    // Validate idDonThuoc
    if ($idDonThuoc <= 0) {
        die("Lỗi: idDonThuoc không hợp lệ. Value: " . $_GET["idDonThuoc"]);
    }

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "cnpm", "3306");

    // Check connection
    if ($conn->connect_errno) {
        die("Kết nối MYSQLi lỗi: " . $conn->connect_error);
    }

    // Check if idDonThuoc exists in the donthuoc table
    $checkDonThuocQuery = $conn->prepare("SELECT idDonThuoc FROM donthuoc WHERE idDonThuoc = ?");
    $checkDonThuocQuery->bind_param("i", $idDonThuoc);
    $checkDonThuocQuery->execute();
    $checkDonThuocQuery->store_result();

    if ($checkDonThuocQuery->num_rows > 0) {
        // Use prepared statement to prevent SQL injection
        $insertMedicationQuery = $conn->prepare("INSERT INTO thuoc (tenThuoc, soLuongUongTrenMotLan, soLanUongTrenMotNgay, soLuong, donVi, doiTuongSuDung) VALUES (?, ?, ?, ?, ?, ?)");
        $insertMedicationQuery->bind_param("siiiss", $tenThuoc, $soLuongUongTrenMotLan, $soLanUongTrenMotNgay, $soLuong, $donVi, $doiTuongSuDung);

        // Execute the medication insertion query
        if ($insertMedicationQuery->execute()) {
            // Retrieve the ID of the last inserted record
            $idThuoc = $conn->insert_id;

            // Use prepared statement for the linking query
            $linkMedicationQuery = $conn->prepare("INSERT INTO chitietdonthuoc (idDonThuoc, idThuoc) VALUES (?, ?)");
            $linkMedicationQuery->bind_param("ii", $idDonThuoc, $idThuoc);

            // Execute the linking query
            if ($linkMedicationQuery->execute()) {
                echo "Thuốc đã được thêm thành công.";
                header("Location: donke.php?idDonThuoc=" . $idDonThuoc);
                exit();
            } else {
                echo "Lỗi khi liên kết thuốc với đơn thuốc: " . $linkMedicationQuery->error;
            }

            // Close the linking query
            $linkMedicationQuery->close();
        } else {
            echo "Lỗi khi thêm thuốc: " . $insertMedicationQuery->error;
        }

        // Close prepared statements and the database connection
        $insertMedicationQuery->close();
    } else {
        die("Lỗi: idDonThuoc không tồn tại trong bảng donthuoc. Value: " . $_GET["idDonThuoc"]);
    }

    // Close the check query
    $checkDonThuocQuery->close();
    $conn->close();
}
?>