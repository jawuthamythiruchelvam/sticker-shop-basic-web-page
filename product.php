<?php
include("proconn.php");

$select = mysqli_query($conn, "SELECT * FROM product");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Display Page</title>
    <link rel="stylesheet" href="product.css">
</head>
<body>

<div class="product-container">

    <?php while($row = mysqli_fetch_assoc($select)){ ?>
        <div class="product-item">
            <img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt="<?php echo $row['name']; ?>">
            <div class="product-name"><?php echo $row['name']; ?></div>
            <div class="product-description"><?php echo $row['discription']; ?></div>
            <div class="product-price"><?php echo $row['price']; ?>/-</div>
        </div>
    <?php } ?>

</div>

</body>
</html>
