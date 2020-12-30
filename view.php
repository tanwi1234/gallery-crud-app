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
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  
 
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

 
</head>
   
  
   <style>
   h2
   {
     position:relative;
    
   }
   #btn
   {
     position:absolute;
    padding:5px 15px;
    right:0;
     
   }
   
   
   
   
   

   </style>

<body>
<div class="container my-4">
<div class="table-responsive">
<table class="table table-bordered table-secondary border-dark  table-hover table-striped my-3" id="myTable">
  <thead class="table-light">
  <tr>
  <th colspan="6" class="text-center "> <h2>GALLERY CRUD APP <a class="btn btn-Info" href="insert.php" role="button" id="btn">Add</a></h2></th>
  </tr>
    <tr>
      <th scope="col" class="text-center " >ID</th>
      <th scope="col" class="text-center ">NAME</th>
      <th scope="col" class="text-center ">IMAGE</th>
      <th scope="col" class="text-center ">EDIT</th>
      <th scope ="col" class="text-center ">DELETE</th>
      
    </tr>
  </thead>
  <tbody>
<?php
$sql="SELECT * FROM gallery";
$result= mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_array($result)) {
      ?>
       
       <tr> 
       <td class="text-center "> <?php echo $row[0];?></td>
       <td class="text-center "><?php echo $row[1];?></td>
       <td class="text-center "><img src= <?php echo $row[2];?> height= "70" width= "90"></td>
      
       <td class="text-center "> <a href='update.php?id=<?php echo $row[0];?>'> <i class="fa fa-pencil" aria-hidden="true" ></i></a></td>
       <td class="text-center "> <a href='delete.php?id=<?php echo $row[0];?>'> <i class="fa fa-trash" aria-hidden="true" ></i> </a></td>
       </tr>
      <?php    
      }
      
    }
    ?>
  </tbody>   
</table>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
 
<script>
$(document).ready( function () {
   
    $('#myTable').dataTable( {
  "lengthMenu": [ 7, 10, 25,35,50, 75, 100 ],
        
        "ordering": false,
        "info":     false
} );
} );
</script>


</body>
</html>
