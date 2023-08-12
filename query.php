<?php
  include("connectDatabase.php");

  if(isset($_GET["idp"])){
     $pd_id = $_GET["idp"];
    $query1 = "SELECT * from product where id='$pd_id'";
    $result1 = mysqli_query($con,$query1);
    $row = mysqli_fetch_assoc($result1);

    $name = $row["pName"];
    $price = $row["price"];
    $discount = $row["discount"];


    $query = "INSERT INTO shoppingcart(pName,price,discount) VALUES('$name','$price','$discount')";
    $result = mysqli_query($con,$query);

    header("location:index.php");
    exit();
  }
  if(isset($_GET["idc"])){
    $c_id = $_GET["idc"];
    $query2 = "DELETE from shoppingcart WHERE shoppingcart.id='$c_id'";
    $result2 = mysqli_query($con,$query2);

    header("location:index.php");
  }
?>