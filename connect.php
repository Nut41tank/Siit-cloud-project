<?php
$mysqli = new mysqli('localhost','root','','inventory');
   if($mysqli->connect_error){
      $massage = "Cannot Connect to Server!!";
      header("Location: login.html");
      echo "<script type='text/javascript'>alert('$massage');</script>";
   }
 ?>
