<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "flowerdb";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $name = $_POST['name'];
    $description = $_POST['description'];

    
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imagePath = 'uploads/' . $imageName;

        
        move_uploaded_file($imageTmpPath, $imagePath);
    }

    
    $stmt = $conn->prepare("INSERT INTO flowers (name, description, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $description, $imagePath);

    if ($stmt->execute()) {
        
        echo json_encode(['success' => true]);
    } else {
        
        echo json_encode(['success' => false]);
    }

    $stmt->close();
    $conn->close();
}
?>
