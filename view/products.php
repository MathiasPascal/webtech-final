<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - Electronic Scrap Products</title>
    <link rel="stylesheet" href="../css/product_style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

    <section class="product-details" id="products">
        <!-- Products will be inserted here by jQuery -->
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '../action/fetch_products_action.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $.each(data, function(key, product) {
                        var productDiv = `
                    <div class="product">
                        <div class="product-image">
                        <img src="${product.image}" alt="Product ${product.ProductID} Image">                                <div class="product-info">
                            <h2>${product.Name}</h2>
                            <p>Description: ${product.Description}</p>
                            <p>Condition: ${product.Condition}</p>
                            <p>Price: $${product.Price}</p>
                            <form class="add-to-cart-form" action="../action/add_to_cart_action.php" method="post">
                                <input type="hidden" name="product_id" value="${product.ProductID}"> 
                                <input type="hidden" name="price" value="${product.Price}">
                                <input type="number" name="quantity" min="1" max="100" value="1"> <!-- Quantity field --> 
                                <button type="submit">Add to Cart</button>
                            </form>
                        </div>
                    </div>`;
                        $('#products').append(productDiv);
                    });

                    // Check if a product was added to the cart
                    var urlParams = new URLSearchParams(window.location.search);
                    if (urlParams.has('product_added')) {
                        // Display a SweetAlert
                        swal("Success!", "Product added to cart!", "success");
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });

            // Handle form submission
            $(document).on('submit', '.add-to-cart-form', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(data) {
                        if (data.status === 'success') {
                            // Redirect back to the products page with a query parameter
                            window.location.href = 'products.php?product_added=true';
                        } else {
                            swal("Error!", data.message, "error");
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
</body>

</html>