<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Registration Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/register_style.css">
</head>
<body>

    <div class="container">
        <div class="title"> Registration</div>
        <form action="#" method="post" name="registrationForm" id="registrationForm" onsubmit="return validateForm()">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">First Name</span>
                    <input type="text" placeholder="Enter your first name" name="firstName" id="firstName" required>
                </div>
                <div class="input-box">
                    <span class="details">Last Name</span>
                    <input type="text" placeholder="Enter your last name" name="lastName" id="lastName" required>
                </div>
                <div class="input-box">
                    <span class="details">Date of Birth</span>
                    <input type="date" placeholder="Enter your birth date" name="dob" id="dob" required>
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="tel" placeholder="Enter your contact number" name="phoneNumber" id="phoneNumber" required>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" placeholder="Enter your email" name="email" id="email" required>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" placeholder="Enter your password" name="password" id="password" required>
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" placeholder="Confirm your password" name="confirmPassword" id="confirmPassword" required>
                </div>
                <div class="input-box">
                    <span class="details">Gender</span>
                    <select name="gender" id="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
            </div>

            <div class="button">
                <input type="submit" value="Sign Up">
            </div>
            <a href="login_view.php">Already have an account? Login</a>

        </form>
    </div>

    <script>
        function validateForm() {
            // Email validation using a regular expression
            var email = document.getElementById("email").value;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(email)) {
                alert("Invalid email address");
                return false;
            }

            // Phone number validation using a regular expression
            var phoneNumber = document.getElementById("phoneNumber").value;
            var phoneRegex = /^\d{10}$/;

            if (!phoneRegex.test(phoneNumber)) {
                alert("Invalid phone number. Please enter 10 digits.");
                return false;
            }

            // Password and confirm password validation
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;

            if (password !== confirmPassword) {
                alert("Passwords do not match");
                return false;
            }

            return true;
        }document.getElementById('registrationForm').addEventListener('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            fetch('../action/register_user_action.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = 'login_view.php';
                    } else {
                        alert(data.message);
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        });
    </script>
</body>
</html>
