<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronic Scrap Products</title>
    <link rel="stylesheet" href="../css/index_style.css">
</head>
<body>
    <header>
        <h1>Electronic Scrap Products</h1>
        <?php
        session_start(); // Start the session at the beginning
        if (isset($_SESSION['firstname'])) { // Check if the session variable exists
            echo "<p>Welcome, " . $_SESSION['firstname'] . "</p>"; // Display the welcome message
        }
        ?>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="../login/logout_view.php">Logout</a></li> <!-- Logout button -->
            </ul>
        </nav>
        
    </header>
    
    <section class="landing">
        <div class="landing-content">
            <h2>Welcome to our Electronic Scrap Products Platform</h2>
            <p>Find a wide range of sustainable electronic scrap products for your needs.</p>
            <a href="products.php" class="btn">Start Shopping</a>
        </div>
    </section>

    <section class="sidebar">
    <?php
    // Fetch the number of orders from the database
    include '../settings/connection.php';
    $sql = "SELECT COUNT(*) as orderCount FROM orders WHERE buyer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_SESSION['bid']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    echo "<p>You have made " . $row['orderCount'] . " orders.</p>";

    
    ?>
    </section>

    
</body>
</html>
