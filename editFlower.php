<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flowerdb";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $flowerId = $_POST['flowerId'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Xử lý ảnh
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imagePath = 'uploads/' . $imageName;

        // Di chuyển ảnh vào thư mục 'uploads'
        move_uploaded_file($imageTmpPath, $imagePath);
    } else {
        // Nếu không thay đổi ảnh, giữ lại ảnh cũ
        $imagePath = $_POST['existingImage'];
    }

    // Chuẩn bị câu lệnh SQL để cập nhật thông tin hoa
    $stmt = $conn->prepare("UPDATE flowers SET name = ?, description = ?, image = ? WHERE id = ?");
    $stmt->bind_param("sssi", $name, $description, $imagePath, $flowerId);

    if ($stmt->execute()) {
        // Thành công, trả về thông báo JSON
        echo json_encode(['success' => true]);
    } else {
        // Lỗi, trả về thông báo JSON
        echo json_encode(['success' => false]);
    }

    $stmt->close();
    $conn->close();
}
?>
