<?php
include '../settings/connection.php';
$response = array("success" => false, "message" => "");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO buyers (passwd, email, dob, fname, lname, tel) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssss", $hashedPassword, $email, $dob,   $firstName, $lastName, $phoneNumber);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $response["success"] = true;
            $response["message"] = "User registered successfully.";
        } else {
            $response["success"] = false;
            $response["message"] = "Error: Unable to register user. Please try again.";
        }

        $stmt->close();
    } else {
        $response["success"] = false;
        $response["message"] = "Error: Unable to prepare statement. Please try again.";
    }
} else {
    $response["success"] = false;
    $response["message"] = "Invalid request method.";

}
$conn->close();

echo json_encode($response);
?>