<?php
include '../settings/connection.php';

$response = array();

$sql = "SELECT ProductID, Name, Description, Quantity, Price, Image FROM products";
if($result = $conn->query($sql)){
    while($row = $result->fetch_assoc()){
        // Convert the binary data to base64
        $row['Image'] = 'data:image/jpeg;base64,' . base64_encode($row['Image']);
        $response[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>