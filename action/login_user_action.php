<?php
session_start();
include '../settings/connection.php';

$response = array('error' => false, 'message' => '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT bid, passwd, fname FROM buyers WHERE email = ?"; // Add fname to the SELECT statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $email);

        $stmt->execute();

        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($bid, $hashedPassword, $fname); // Add $fname to the bind_result method

            $stmt->fetch();

            if (password_verify($password, $hashedPassword)) {
                $_SESSION['bid'] = $bid;
                $_SESSION['email'] = $email;
                $_SESSION['firstname'] = $fname; // Store the user's first name in a session variable
                // header("Location: ./../view/welcome-page-users.php");
                // exit();
            } else {
                $response['error'] = true;
                $response['message'] = "Incorrect username or password.";
            }
        } else {
            $response['error'] = true;
            $response['message'] = "User not registered or incorrect username.";
        }

        $stmt->close();
    } else {
        $response['error'] = true;
        $response['message'] = "Error: Unable to prepare statement. Please try again.";
    }
} else {
    $response['error'] = true;
    $response['message'] = "Wrong request method. Please try again.";
}

$conn->close();

echo json_encode($response);