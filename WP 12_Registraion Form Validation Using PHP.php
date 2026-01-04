<?php
// Initialize variables
$fullname = $email = $mobile = $username = "";
$success = "";
$mainError = "";

$fullnameErr = $emailErr = $mobileErr = $usernameErr = $passwordErr = $confirmErr = "";

// Check form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Safely read POST values
    $fullname = trim($_POST["fullname"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $mobile = trim($_POST["mobile"] ?? "");
    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $confirmPassword = trim($_POST["confirmPassword"] ?? "");

    $valid = true;

    // Check if all fields are empty
    if ($fullname == "" && $email == "" && $mobile == "" && $username == "" && $password == "" && $confirmPassword == "") {
        $mainError = "All fields are required";
        $valid = false;
    }

    // Validate Full Name
    if ($fullname == "") {
        $fullnameErr = "Full name is required";
        $valid = false;
    } else if (!preg_match("/^[a-zA-Z ]+$/", $fullname)) {
        $fullnameErr = "Enter a valid name";
        $valid = false;
    }

    // Validate Email
    if ($email == "") {
        $emailErr = "Email is required";
        $valid = false;
    } else if (!preg_match("/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/",$email)) {
        $emailErr = "Enter a valid email";
        $valid = false;
    }

    // Validate Mobile
    if ($mobile == "") {
        $mobileErr = "Mobile number is required";
        $valid = false;
    }
    elseif (!is_numeric($mobile)) {
        $mobileErr = "Enter a valid mobile number";
        $valid = false;
    } elseif (!preg_match("/^[0-9]{10}$/", $mobile)) {
        $mobileErr = "Enter 10 digit mobile number";
        $valid = false;
    }

    // Validate Username
    if ($username == "") {
        $usernameErr = "Username is required";
        $valid = false;
    }

    // Validate Password
    if ($password == "") {
        $passwordErr = "Password is required";
        $valid = false;
    } elseif (strlen($password) < 6) {
        $passwordErr = "Password must be at least 6 characters";
        $valid = false;
    }

    // Validate Confirm Password
    if ($confirmPassword == "") {
        $confirmErr = "Confirm password is required";
        $valid = false;
    } elseif ($password !== $confirmPassword) {
        $confirmErr = "Passwords do not match";
        $valid = false;
    }

    // If all validation passes
    if ($valid) {
        $success = "Registration successful!";
        // Clear form values if you want
        // $fullname = $email = $mobile = $username = "";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        .container {
            max-width: 450px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-top: 0;
        }

        label {
            display: block;
            margin-bottom: 4px;
            font-weight: bold;
        }

        input[type=text],
        input[type=email],
        input[type=tel],
        input[type=password] {
            width: 100%;
            padding: 8px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type=submit],
        input[type=reset] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            margin-top: 10px;
        }

        input[type=submit] { background: #4caf50; }
        input[type=submit]:hover { background: #45a049; }

        input[type=reset] { background: #f44336; }
        input[type=reset]:hover { background: #d7372f; }

        .error { color: red; font-size: 13px; }
        .success { color: green; font-weight: bold; text-align: center; margin-bottom: 10px; }
    </style>
</head>

<body>
    <div class="container">
        <h2>Registration Form</h2>

        <?php if($mainError) echo "<p class='error'>$mainError</p>"; ?>
        <?php if($success) echo "<p class='success'>$success</p>"; ?>

        <form method="post" action="">
            <label>Full Name</label>
            <input type="text" name="fullname" value="<?php echo htmlspecialchars($fullname); ?>">
            <span class="error"><?php echo $fullnameErr; ?></span>

            <label>Email</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <span class="error"><?php echo $emailErr; ?></span>

            <label>Mobile Number</label>
            <input type="tel" name="mobile" value="<?php echo htmlspecialchars($mobile); ?>">
            <span class="error"><?php echo $mobileErr; ?></span>

            <label>Username</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>">
            <span class="error"><?php echo $usernameErr; ?></span>

            <label>Password</label>
            <input type="password" name="password">
            <span class="error"><?php echo $passwordErr; ?></span>

            <label>Confirm Password</label>
            <input type="password" name="confirmPassword">
            <span class="error"><?php echo $confirmErr; ?></span>

            <center>
                <input type="submit" value="Register">
                <input type="reset" value="Reset">
            </center>
        </form>
    </div>
</body>
</html>
