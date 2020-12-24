<?php 
$conn=new mysqli('localhost','root','','sale');
//lay ra bang the loai
$sql='select * 
from type';
$result=mysqli_query($conn,$sql);
$type=$result;


$img='';
$body='';
$title='';
$pulish='';
$price='';
$id_type='';
if(!empty($_GET['id'])){
  $id=$_GET['id'];
$result = mysqli_query($conn,"select * from product a, type b where a.id_type=b.id_type and id=".$id." LIMIT 1");
$row = mysqli_fetch_assoc($result);}
//up load product



$conn->close();
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
    <h5><a href="create.php" class="btn btn-success">Thêm sản phẩm</a> <a href="index.php"  class="btn btn-success">Xem lý sản phẩm</a></h5>
    <h2 class="h5-center pb-2">Sửa sản phẩm</h2>
    <div class="color-ad" style="min-height:350px" >
    <!-- --------------------------------------------------------------------------------------------------------- -->
 <form  action="/sale/app/controllers/product.php" method="post" enctype="multipart/form-data">
 <input type="hidden" name="id" value="<?php echo $id ?>">
  <div class="form-group mt-2">
    <label for="exampleInputEmail1">Tên sản phẩm</label>
    <input type="text" class="form-control" name="title" aria-describedby="emailHelp" value="<?php echo $row['title']; ?>">

  </div>
  <div class="form-group mt-2">
  <label for="floatingTextarea2">Thân bài viết</label>
  <textarea class="form-control" placeholder="Viết mô tả sản phẩm" name="body" id="floatingTextarea2"  style="height: 100px; "><?php echo $row['body']; ?></textarea>
</div> 
<div class="form-group mt-2">
    <label for="exampleInputEmail1">Giá sản phẩm</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="price" aria-describedby="emailHelp" value="<?php echo $row['price']; ?>">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>       
  <div class="form-group mt-2">
  <label>Thể loại</label>
  <select class="form-select" name="id_type" aria-label="Default select example">
  <option selected>Lựa chọn thể loại</option>
  <?php foreach($type as $key =>$t): ?>
    <?php if($t['id_type']===$row['id_type']): ?>
  <option selected value="<?php echo $t['id_type'] ?>"><?php echo $t['name'] ?></option>
    <?php else: ?>
      <option value="<?php echo $t['id_type'] ?>"><?php echo $t['name'] ?></option>
     <?php endif; ?>
  <?php endforeach; ?>
</select>
  </div>   
  <div class="form-group mt-2">
  <label>Chọn một bức ảnh</label>
  <input class="form-control" name="img" type="file" id="formFile">
</div>
<div class="form-group form-check mt-2">  
    <?php if($row['pulish']==0): ?>
    <input type="checkbox" class="form-check-input" name="pulish" id="exampleCheck1">
    <?php else: ?>
    <input type="checkbox" checked class="form-check-input" name="pulish" id="exampleCheck1">
    <?php endif; ?>
    <label class="form-check-label" for="exampleCheck1">Là sản phẩm hot ?</label>
  </div>
  <input type="submit" class="btn btn-primary mt-2" name="edit-product" value="Submit"></input>
</form>
<!-- ----------------------------------------------------------------------------------------------------------------------------- -->
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
