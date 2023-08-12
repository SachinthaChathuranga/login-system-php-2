<?php 
session_start();
if(!isset($_SESSION['userName'])){
    header("location:login.php");
    exit();
}
include("connectDatabase.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Item Page</title>
</head>
<body>
    <div class="product cont">
    <h1>Add New Product</h1>
        <form action="" method="post">
            

            <label for="productName">Product Name</label><br>
            <input type="text" name="productName" id="productName"><br><br>

            <label for="price">Price</label><br>
            <input type="text" name="price" id="price"><br><br>

            <label for="discount">Discount</label><br>
            <input type="text" name="discount" id="discount"><br><br>

            <input class="btn" type="submit" name="add" value="Add">

        </form>
    </div>

    <?php if(isset($_POST["add"])){
        $name = $_POST["productName"];
        $price = $_POST["price"];
        $discount = $_POST["discount"];
        $query3 = "INSERT INTO product(pName,price,discount) VALUES('$name', '$price', '$discount' )";
        $result = mysqli_query($con,$query3);
        header("location:index.php");
    }
    
    ?>
    
</body>
</html>