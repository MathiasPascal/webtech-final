<?php
// Start a session
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if a user is logged in
    if (!isset($_SESSION['bid'])) {
        // Redirect to the login page if not
        header("Location: login_view.php");
        exit;
    }

    $product_id = $_POST['product_id'];
    $price = $_POST['price'];
    $buyer_id = $_SESSION['bid'];

    // Connect to the database
    include '../settings/connection.php';

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO orders (product_id, buyer_id, price) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iid", $product_id, $buyer_id, $price);
    $stmt->execute();

    // Redirect back to the products page
    header("Location: products.php");
}
?>