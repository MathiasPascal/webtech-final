<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['buyer_id'])) {
    header("Location: login.php");
    exit;
}

// Include database connection or any necessary functions
// Replace these with your actual database connection code

// Sample user data (replace with actual data retrieval)
$buyer_id = $_SESSION['buyer_id'];

// Assuming you have a database connection
$conn = new mysqli("localhost", "username", "password", "database_name");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data from the database
$sql = "SELECT Username, Email FROM Buyers WHERE BuyerID = $buyer_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $user_name = $row["Username"];
        $user_email = $row["Email"];
    }
} else {
    echo "User data not found.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <h1>Welcome to Your Dashboard, <?php echo $user_name; ?>!</h1>
    
    <section>
        <h2>Your Profile Information</h2>
        <p><strong>User ID:</strong> <?php echo $buyer_id; ?></p>
        <p><strong>Name:</strong> <?php echo $user_name; ?></p>
        <p><strong>Email:</strong> <?php echo $user_email; ?></p>
    </section>
    
    <!-- Add more sections or content as needed -->

    <!-- Add your JavaScript code here if necessary -->

</body>
</html>
