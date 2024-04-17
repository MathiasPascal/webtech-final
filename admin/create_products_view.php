<?php
session_start();

// Check if the user is logged in and if the email is authorized
if (!isset($_SESSION['email']) || $_SESSION['email'] !== 'psk30curry@gmail.com') {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link rel="stylesheet" href="../css/create_products_view_style.css">
    <!-- Include SweetAlert2 library -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <form id="productForm" action="create_products_action.php" method="post" enctype="multipart/form-data">
        <label for="ProductID">Product ID:</label><br>
        <input type="number" id="ProductID" name="ProductID" required><br>

        <label for="Name">Name:</label><br>
        <input type="text" id="Name" name="Name" required><br>

        <label for="Description">Description:</label><br>
        <textarea id="Description" name="Description"></textarea><br>

        <label for="Quantity">Quantity:</label><br>
        <input type="number" id="Quantity" name="Quantity" required><br>

        <label for="Price">Price:</label><br>
        <input type="number" id="Price" name="Price" step="0.01" required><br>

        <label for="Image">Image:</label><br>
        <input type="file" id="Image" name="Image"><br>

        <input type="submit" value="Create Product">
    </form>

    <script>
        document.getElementById('productForm').addEventListener('submit', function(e) {
            e.preventDefault(); // prevent form from submitting normally
            // show sweet alert
            Swal.fire({
                title: 'Success!',
                text: 'Product created successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    </script>
</body>

</html>