<?php 
    session_start();

    if(!(isset($_SESSION["userName"]))){
        header("location:login.php");
        exit();
    }
    if(isset($_GET["logout"])){
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(), "", time()-3600,"/");
        }

        $_SESSION[] = array();

        session_destroy();
        
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
    <title>Index Page</title>
</head>
<body>
    <!-- <input type="submit" value="Logout" name="logout"> -->
    

    <div class="index cont"><br>
    <div class="btn-logout">
    <a href="index.php?logout=true" class="logout">Logout</a>
    </div>
    
        <h1>Billing System</h1>
        <h1>Shopping Cart</h1>

        <table  id="cart-table"> 
        <!-- frame=hsides rules=rows -->
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                    $totalPrice = 0;
                    $query1 = "SELECT * FROM shoppingcart";
                    $result1 = mysqli_query($con, $query1);
                    while($row = mysqli_fetch_assoc($result1)){
                        $price = $row["price"]*((100 - $row["discount"])/100);
                        $totalPrice += $price;
                ?>

                <tr>
                    <td><?php echo $row["pName"]; ?></td>
                    <td><?php echo $price; ?></td>
                    <td><?php echo $row["discount"]."%"; ?></td>
                    <td>
                        <div class="btnitem rmvitem">
                            <a href="query.php?idc=<?php echo $row['id'] ?>">Remove Item</a>
                        </div>
                    </td>
                </tr>
                
                <?php } ?>
                <tr>
                    <td>Total</td>
                    <td colspan="3"><?php echo "$totalPrice"; ?> </td>
                </tr>
            </tbody>
        </table>
        <h3>Product Details</h3>
        <div class="addProcut">
            <a href="addProduct.php" class="">Add New Product</a>
        </div>
        
        <table  id="product-table" >
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query2 = "SELECT * FROM product";
                $result = mysqli_query($con,$query2);
                while ($row = mysqli_fetch_assoc($result)){


                ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["pName"]; ?></td>
                    <td><?php echo $row["price"]; ?></td>
                    <td><?php echo $row["discount"]."%"; ?></td>
                    <td>
                        <div class="btnitem additem">
                            <a href="query.php?idp=<?php echo $row['id'] ?>">Add Item</a>
                        </div>
                    </td>
                </tr>

                <?php 
                }
                ?>
                
            </tbody>
        </table>

    </div>
    
</body>
</html>