<?php
  $host = "localhost";
  $user = "root";
  $password = "";
  $database = "2020csc079";

  $con = mysqli_connect($host, $user, $password, $database);

  
  if(!$con){
    die("Failed to connect");
    
  }

?>