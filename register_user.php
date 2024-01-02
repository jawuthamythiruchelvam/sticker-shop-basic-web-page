<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register_user.css">
    <script src="uscript.js" defer></script>
    <title>Register</title>
</head>
<body>
    <div class="container">
        <form action="" id="form" method="post">
            <h1>Register</h1>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
                <div class="error"></div>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" >
                <div class="error"></div>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <div class="error"></div>
            </div>
            <div class="input-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" id="cpassword" name="cpassword">
                <div class="error"></div>
            </div>
            <div class="input-group">
                <label for="tp_number">TP-number</label>
                <input type="tp_number" id="tp_number" name="tp_number">
                <div class="error"></div>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>

<?php
session_start();

include("proconn.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $tp_number = mysqli_real_escape_string($conn, $_POST['tp_number']);
    $user="user";
    
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (name, email, password, tpnumber, typeof) VALUES ('$username', '$email', '$password', '$tp_number','$user')";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='success-message'>Record added successfully</div>";
        header("Location: login.php"); 
        exit();
    } else {
        echo "<div class='error-message'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</div>";
    }
    

    mysqli_close($conn);
}
?>
</body>
</html>