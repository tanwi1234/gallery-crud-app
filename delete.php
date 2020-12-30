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
$id = $_GET['id'];
$sql="DELETE FROM gallery WHERE id='$id'";
$result= mysqli_query($conn,$sql);
if($result)
{
    header('location:view.php');
}
else{
    die("not deleted".mysqli_error($conn));

}




?>
