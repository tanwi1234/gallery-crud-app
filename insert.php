<?php
$servername="localhost";
$username="root";
$password="";
$database="gallerycrud";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
    die("connection failed:".mysqli_connect_error());
}
if(isset($_POST['done']))
{
    $msg="";
    $img  =  $_POST['imagename'];
    $image_temp_name = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $image_type = $_FILES['image']['type'];
    $image_size = $_FILES['image']['size'];
    $target = "images/";
    
    if(strtolower($image_type)=="image/jpg"||strtolower($image_type)=="image/jpeg"||strtolower($image_type)=="image/png")
    {
        if($image_size<=1000000)
        {
            $target=$target.$image_name;
            $sql="INSERT INTO gallery (Imagename,uploadfile) VALUE('$img', '$target')";
            $result= mysqli_query($conn,$sql);
if(!$result)
{
    die("not inserted".mysqli_error($conn));
}
else{
    move_uploaded_file($image_temp_name,$target);
    header('location:view.php');
}

        }
        else{
            "<script> alert('image size should be less than 1 mb')
            window.location.href='insert.php';
        </script>";

        }

    }
    else{
        "<script> alert('image format not supported');
        window.location.href='insert.php';
        </script>";

    }




}

?>
<!DOCTYPE html>
<html>
<head>
 <title>insert</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<style>
#main{
    
    
   
    
    position:absolute;
    left:50%;
    top:50%;
    transform:translate(-50%,-50%);
    border:solid orange 10px;
   
    
}
body
    {
        background:black;
    }
button
{
    margin-top:10px;
}
.card{
    margin:20px;
    padding:20px;
}
label,input
{
    font-weight:400;
    padding-top:5px;
}




</style>
<body>

 <div class="col-lg-6 " id="main">
 
 <form method="POST"enctype='multipart/form-data' action='insert.php'>
 
 <div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Insert Operation </h1>
 </div><br>

 <label> Imagename </label>
 <input type="text" name="imagename" class="form-control"> <br>

<label>Upload file</label>
<input type="file" class="form-control-file" name="image">
 <button class="btn btn-info" type="submit" name="done"> Submit </button>
 
 </div>
 </form>
 </div>
</body>
</html>