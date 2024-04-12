<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Electronic Scrap Products</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Electronic Scrap Products</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="../login/login_view.php">Login</a></li> <!-- You can update this link with actual login page link -->
            </ul>
        </nav>
    </header>
    
    <section class="contact">
        <div class="contact-content">
            <h2>Contact Us</h2>
            <p>Have a question or feedback? We'd love to hear from you!</p>
            <form action="#" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>
        
    </section>

    <footer>
        <p>&copy; 2024 Electronic Scrap Products. All rights reserved.</p>
    </footer>
</body>
</html>
