<?php
$servername="remotemysql.com";
$username="PN02GWpVS2";
$password="pbj5JWRygd";
$database="PN02GWpVS2";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
    die("connection failed:".mysqli_connect_error());
}
else{
    echo"connection successfully";

}

$sql="CREATE TABLE gallery(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, Imagename VARCHAR(255) NOT NULL , uploadfile VARCHAR(255) NOT NULL)";
$result= mysqli_query($conn,$sql);
if(!$result)
{
    die('connection failed:'.mysqli_error($conn));
}
?>
