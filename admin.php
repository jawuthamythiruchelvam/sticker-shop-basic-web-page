<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user page</title>
    <link rel="stylesheet" href="user.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
<header>
,<h2 id="name">STICKERS HEAVEN</h2>
             
             <nav>
                <ul>
             <li><a href="main.php" > <i class="fa-solid fa-house"></i>Home</a></li>
             <li>  <a href="profile.php"><i class="fa-regular fa-user"></i>Profile</a></li>
                <!-- <a href=""><i class="fa-solid fa-bars"></i>Menu</a> -->
                <div class="dropdown">
                <li><button>menu</button></li>
  <div class="dropdown-content">
  <a href="register_user.php">Sign up</a>
  <a href="addpro.php.php">add product</a>
  <a href="logout.php">Log out</a>

  </ul>
  </div>
</div>
                
                
             </nav>
        </header>
        <?php
include("proconn.php");

$select = mysqli_query($conn, "SELECT * FROM product");
?>



<div class="product-container">

    <?php while($row = mysqli_fetch_assoc($select)){ ?>
        <div class="product-item">
            <img src="uploaded_img/<?php echo $row['image']; ?>" height="200" width="200" alt="<?php echo $row['name']; ?>">
            <div class="product-name"><?php echo $row['name']; ?></div>
            <div class="product-description"><?php echo $row['discription']; ?></div>
            <div class="product-price"><?php echo $row['price']; ?>/-</div>
        </div>
    <?php } ?>

</div>



    
</body>
</html>