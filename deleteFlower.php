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
 
    $flowerId = $_POST['flowerId'];

   
    $stmt = $conn->prepare("DELETE FROM flowers WHERE id = ?");
    $stmt->bind_param("i", $flowerId);

    if ($stmt->execute()) {
        
        echo json_encode(['success' => true]);
    } else {
       
        echo json_encode(['success' => false]);
    }

    $stmt->close();
    $conn->close();
}
?>
