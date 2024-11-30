<style>
        .flower {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 10px;
        }
        .flower img {
            max-width: 100%;
            height: auto;
        }
    </style>
    
    
 </div>
 ?>
<?php

include('db.php');

// Truy vấn lấy danh sách hoa
$sql = "SELECT * FROM flowers";
$result = $conn->query($sql);

// Hiển thị kết quả
if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row['name'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "Không có hoa nào trong cơ sở dữ liệu.";
}

// Đóng kết nối sau khi sử dụng
$conn->close();
?>