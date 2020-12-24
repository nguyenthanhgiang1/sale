<?php 
$conn=new mysqli('localhost','root','','sale');
session_start();
if(!$_SESSION['level']==1){
    header('location:/sale/login.php');
}

if(isset($_GET['del_id'])){//xoa theo id
  //adminOnly();  // loi chi admin
  $id=$_GET['del_id'];
  $sql= "DELETE FROM product WHERE id = $id";
$result=mysqli_query($conn,$sql);
  // $count =delete($table,$id);
 // $_SESSION['message']='Topic deleted successfully'; 
 // $_SESSION['type']='success';
  //header('index.php');
  //exit();
}


$sql='select * 
from product a, type b
where a.id_type=b.id_type';
$result=mysqli_query($conn,$sql);
$pro=$result;
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../assets/boot/css/bootstrap.css">
<link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
<!-- phan menu -->
<?php include("../includes/adminHeader.php") ?>
<!-- het menu -->
<div class="row">
  <?php include("../includes/adminSidebar.php") ?>
  <div class="col-md-9" style="min-height:500px">
     <h1>Chào mừng bạn đến với trang quản trị</h1>
</div>
<!-- toan bophan main -->
<!-- phan chan trang -->
<div class="row bg-success">
  <div class="col h5-center">
       <h2>Footer</h2>
</div>
</div>
<script type="text/javascript" src="../../assets/boot/js/bootstrap.js"></script>
</body>
</html>
