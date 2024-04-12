<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - Electronic Scrap Products</title>
    <link rel="stylesheet" href="../css/product_style.css">
</head>

<body>
    <header>
        <h1>Electronic Scrap Products</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="environment_tracking.php">Environment Meter</a></li>
            </ul>
        </nav>
    </header>

    <section class="product-details">
        <!-- Product 1 -->
        <div class="product">
            <div class="product-image">
                <img src="image.png" alt="Product 1 Image">
            </div>
            <div class="product-info">
                <h2>Computer Board</h2>
                <p>Description: Great boards only. No Inferior products.</p>
                <p>Condition: Used</p>
                <p>Quantity Available: 10</p>
                <p>Price: $50.00</p>
                <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="product_id" value="1"> 
                    <input type="hidden" name="price" value="50.00"> 
                    <button type="submit">Add to Cart</button>

                </form>

            </div>
        </div>

        <!-- Product 2 -->
        <div class="product">
            <div class="product-image">
                <img src="image.png" alt="Product 2 Image">
            </div>
            <div class="product-info">
                <h2>Radio Board</h2>
                <p>Description: Great boards only. No Inferior products.</p>
                <p>Condition: New</p>
                <p>Quantity Available: 5</p>
                <p>Price: $100.00</p>
                <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="product_id" value="2"> 
                    <input type="hidden" name="price" value="100.00"> 
                    <button type="submit">Add to Cart</button>

                </form>
            </div>
        </div>

       

        <div class="product">
            <div class="product-image">
                <img src="image.png" alt="Product 3 Image">
            </div>
            <div class="product-info">
                <h2>DVD Board</h2>
                <p>Description: Great boards only. No Inferior products.</p>
                <p>Condition: New</p>
                <p>Quantity Available: 5</p>
                <p>Price: $100.00</p>
                <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="product_id" value="3"> 
                    <input type="hidden" name="price" value="100.00"> 
                    <button type="submit">Add to Cart</button>

                </form>
            </div>
        </div>

        <div class="product">
            <div class="product-image">
                <img src="image.png" alt="Product 4 Image">
            </div>
            <div class="product-info">
                <h2>Phone Board</h2>
                <p>Description: Great boards only. No Inferior products.</p>
                <p>Condition: New</p>
                <p>Quantity Available: 5</p>
                <p>Price: $100.00</p>
                <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="product_id" value="4"> 
                    <input type="hidden" name="price" value="100.00"> 
                    <button type="submit">Add to Cart</button>

                </form>
            </div>
        </div>

        <div class="product">
            <div class="product-image">
                <img src="image2.jpg" alt="Product 5 Image">
            </div>
            <div class="product-info">
                <h2>Coverter Catalyst</h2>
                <p>Description: BMW Converter catalyst. New Generation.</p>
                <p>Condition: New</p>
                <p>Quantity Available: 5</p>
                <p>Price: $100.00</p>
                <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="product_id" value="5"> 
                    <input type="hidden" name="price" value="100.00"> 
                    <button type="submit">Add to Cart</button>

                </form>
            </div>
        </div>

    </section>


</body>

</html>