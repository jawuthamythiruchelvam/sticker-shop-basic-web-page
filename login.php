
<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
    <script>
        function togglePassword() {
    const passwordField = document.getElementById("password");
    const toggleButton = document.querySelector(".toggle-password");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        
    } else {
        passwordField.type = "password";
       
    }
}

    </script>
</head>
<body>
    <div class="container">
        <div class="form">
            <?php 
                include("proconn.php");
                if(isset($_POST['submit'])){
                    $email = mysqli_real_escape_string($conn,$_POST['email']);
                    $password = mysqli_real_escape_string($conn,$_POST['password']);

                    $result = mysqli_query($conn,"SELECT * FROM user WHERE email='$email' AND password='$password' ") or die("Select Error");
                    $row = mysqli_fetch_assoc($result);

                    if(is_array($row) && !empty($row)){
                        $_SESSION['valid'] = $row['email'];
                        $_SESSION['user'] = $row['typeof'];
                        
                        switch($_SESSION['user']) {
                            case "user":
                                header("Location: user.php");
                                break;
                            case "admin":
                                header("Location: admin.php");
                                break;
                            case "seper_admin":
                                header("Location: super_admin.php");
                                break;
                            default:
                                echo "Invalid user type.";
                        }
                    } else {
                        echo "<div class='message'>
                            <p>Wrong Username or Password</p>
                            </div> <br>";
                        echo "<a href='login.php'><button class='btn'>Go Back</button>";
                    }
                } else {
            ?>
            <h1>Login</h1>
            <form action="" method="post">
                <div class="input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="input">
                    <label for="password">Password</label>
                    <div class="password-field">
                    <input type="password" name="password" id="password" autocomplete="off" required>
                    <span class="toggle-password" onclick="togglePassword()">
                    <i class="fa-regular fa-eye"></i>
                </span>
                    </div>
                </div>

                <div class="input">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have an account? <a href="register_user.php">Sign Up Now</a><br>
                    Want to register as an admin? <a href="Thirujawuthamy007@gmail.com">Send Email</a>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>

