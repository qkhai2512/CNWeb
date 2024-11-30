<?php include 'header.php'; ?>
<?php

include('db.php');

$sql = "SELECT * FROM flowers"; 
$result = $conn->query($sql);

// Kiểm tra nếu có kết quả
if ($result->num_rows > 0) {
    // Hiển thị kết quả
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
    }
}
// Đóng kết nối sau khi sử dụng
$conn->close();
?>

<body>
    <?php include 'flowers.php'; ?>

    <div class="container pt-5 pb-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tên hoa </th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Hình ảnh</th>
                </tr>
            </thead>
            <tbody id="flower-table">
                <?php foreach ($flowers as $key => $flower): ?>
                    <tr id="row-<?= $key ?>">
                        <td class="name"><?= htmlspecialchars($flower['name']) ?></td>
                        <td class="description"><?= htmlspecialchars($flower['description']) ?> VND</td>
                        <td><img src="<?= htmlspecialchars($flower['image']) ?>" alt="" style="width: 100px; height: auto;"></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

<?php include 'footer.php'; ?>