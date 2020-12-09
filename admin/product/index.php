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
    <h5><a href="#" class="btn btn-success">them vao</a> <a href="#"  class="btn btn-success">xoa di</a></h5>
    <h2 class="h5-center pb-2">Quản lý sản phẩm</h2>
    <div class="color-ad" style="min-height:350px" >
            <div class="row">
              <div class="col-1"><h5>Stt</h5></div>
              <div class="col-3"><h5>Tên sản phẩm</h5></div>
              <div class="col-2"><h5>Giá bán</h5></div>
              <div class="col-2"><h5>Thể loại</h5></div>
              <div class="col-4"><h5>Thao tác</h5></div>
            </div>
            <hr>
            <div class="row">
              <div class="col-1">20</div>
              <div class="col-3">Kem đánh răng</div>
              <div class="col-2">30000</div>
              <div class="col-2">Dồ gia dung can</div>
              <div class="col-1">Xóa</div>
              <div class="col-1">Sửa</div>
              <div class="col-1">Hiện</div>
            </div>
            <hr>
            
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
