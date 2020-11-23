<?php
include("config.php");
$id= $_GET['id'];

$sql = "DELETE FROM reorder where RID=$id";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
header("Location: reorder.php");

?>