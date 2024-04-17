<?php
// Start a session
session_start();

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if a user is logged in
    if (!isset($_SESSION['bid'])) {
        // Return a JSON response indicating that the user is not logged in
        $response['status'] = 'error';
        $response['message'] = 'User is not logged in';
    } else {
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity']; // Assuming you have a 'quantity' field in your form
        $buyer_id = $_SESSION['bid'];

        // Connect to the database
        include '../settings/connection.php';

        // Prepare and execute the SQL statement
        $sql = "INSERT INTO shoppingcart (ProductID, BuyerID, Quantity) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $product_id, $buyer_id, $quantity);
        $stmt->execute();

        // Set a session variable to indicate that a product was added to the cart
        $_SESSION['product_added'] = true;

        // Return a JSON response indicating that the product was added to the cart
        $response['status'] = 'success';
        $response['message'] = 'Product added to cart';
    }
} else {
    // Return a JSON response indicating that the request method was not POST
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method';
}

// Output the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>