<?php
 include("config.php");
 session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $uname = mysqli_real_escape_string($db,$_POST['uname']);
        $pword = mysqli_real_escape_string($db,$_POST['pword']);

        $sql = "SELECT * FROM user WHERE uname = '$uname' and pword = '$pword'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        
        $count = mysqli_num_rows($result);
          
        if($count == 1) {
           $_SESSION['fname'] = $row['f_name'];
           $_SESSION['role'] = $row['role'];
           header("location: index.php");
        }
        else {
           $error = "Your Login Name or Password is invalid";
           echo "<script type='text/javascript'>alert('$error');</script>";

        }
     }
?>