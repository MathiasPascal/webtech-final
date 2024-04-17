<?php
include '../settings/connection.php';

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productID = $_POST['ProductID'];
    $name = $_POST['Name'];
    $description = $_POST['Description'];
    $quantity = $_POST['Quantity'];
    $price = $_POST['Price'];

    $image = file_get_contents($_FILES["Image"]["tmp_name"]);
    $image_base64 = base64_encode($image);

    $sql = "INSERT INTO products (ProductID, Name, Description, Quantity, Price, Image) VALUES (?, ?, ?, ?, ?, ?)";

    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("issids", $productID, $name, $description, $quantity, $price, $image_base64);

        if($stmt->execute()){
            $response['status'] = 'success';
            $response['message'] = 'Product was created successfully.';
        } else{
            $response['status'] = 'error';
            $response['message'] = 'Failed to execute query.';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Failed to prepare query.';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method.';
}

header('Content-Type: application/json');
echo json_encode($response);
?>