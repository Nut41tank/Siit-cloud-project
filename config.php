<?php

$host = getenv('CLOUDSQL_HOST');
$user = getenv('CLOUDSQL_USER');
$DB = getenv('CLOUDSQL_DB');
$password = getenv('CLOUDSQL_PASSWORD');
$DNS = getenv('CLOUDSQL_DNS');
$db = mysqli_connect(null,$user,$password,$DB,null,$DNS);
?>
