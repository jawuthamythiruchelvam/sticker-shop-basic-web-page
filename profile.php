<?php
include("proconn.php");

    $user_id = $_SESSION['valid'];
    $select = mysqli_query($conn, "SELECT * FROM user WHERE id = $user_id");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    
</head>
<body>

<div class="profile">

    <?php $row = mysqli_fetch_assoc($select) ?>
        <div class="user">
		<div class="as"><?php echo $row['typeof']; ?></div>
            <div class="user name"><?php echo $row['name']; ?></div>
            <div class="Email"><?php echo $row['email']; ?></div>
            <div class="tpnumber"><?php echo $row['tpnumber']; ?></div>
        </div>
    

</div>

</body>
</html>

