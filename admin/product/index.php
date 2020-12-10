<?php 
$conn=new mysqli('localhost','root','','sale');
$sql='select * 
from product a, type b
where a.id_type=b.id_type';
$result=mysqli_query($conn,$sql);
$pro=$result;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../assets/boot/css/bootstrap.css">
<link rel="stylesheet" href="../../assets/css/admin.css">
</head>
<body>
<!-- phan menu -->
<?php include("../../includes/adminHeader.php") ?>
<!-- het menu -->
<div class="row">
  <?php include("../../includes/adminSidebar.php") ?>
  <div class="col-md-9">
     <div class="main-view">
    <h5><a href="create.php" class="btn btn-success">Thêm sản phẩm</a> <a href="index.php"  class="btn btn-success">Quản lý sản phẩm</a></h5>
    <h2 class="h5-center pb-2">Quản lý sản phẩm</h2>
    <div class="color-ad" style="min-height:350px" >
            <div class="row">
              <div class="col-1"><h5>Stt</h5></div>
              <div class="col-3"><h5>Tên sản phẩm</h5></div>
              <div class="col-2"><h5>Thể loại</h5></div>
              <div class="col-2"><h5>Giá bán</h5></div>
              <div class="col-4"><h5>Thao tác</h5></div>
            </div>
            <hr>
            <?php foreach($pro as $key =>$p): ?>
            <div class="row">
              <div class="col-1"><?php echo $key+1 ?></div>
              <div class="col-3"><?php echo $p['title'] ?></div>
              <div class="col-2"><?php echo $p['name'] ?></div>
              <div class="col-2"><?php echo $p['price'] ?></div>
              <div class="col-1"> <a href="#" class="btn-outline-warning a-text">Sửa</a></div>
              <div class="col-1"> <a href="#" class="btn-outline-success a-text">view</a></div>
              <div class="col-1"> <a href="#" class="btn-outline-danger a-text">Xoa</a></div>
            </div>
            <hr>
            <?php endforeach; ?>
       </div> 
       <!-- het vung bang -->
     </div>
  
  </div>
  <!-- phan ben phai -->
</div>
<!-- toan bophan main -->
<!-- phan chan trang -->
<div class="row bg-success">
  <div class="col h5-center">
       <h2>Footer</h2>
</div>
</div>
<script type="text/javascript" src="assets/boot/js/bootstrap.js"></script>
</body>
</html>
