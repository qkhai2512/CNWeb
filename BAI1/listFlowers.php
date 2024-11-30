<?php
include('db.php'); // Kết nối cơ sở dữ liệu

// Truy vấn lấy tất cả các hoa
$sql = "SELECT * FROM flowers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table'>";
    echo "<thead><tr><th scope='col'>Tên Hoa</th><th scope='col'>Mô Tả</th><th scope='col'>Hình Ảnh</th><th scope='col'>Hành động</th></tr></thead><tbody>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['name']) . "</td>
                <td>" . htmlspecialchars($row['description']) . "</td>
                <td><img src='" . htmlspecialchars($row['image']) . "' alt='' style='width: 100px; height: auto;'></td>
                <td>
                    <button class='btn btn-warning editBtn' data-id='" . $row['id'] . "'>Sửa</button>
                    <button class='btn btn-danger deleteBtn' data-id='" . $row['id'] . "'>Xóa</button>
                </td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "Không có hoa nào trong cơ sở dữ liệu.";
}

$conn->close();
?>
