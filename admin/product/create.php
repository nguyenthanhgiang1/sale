<?php 
$conn=new mysqli('localhost','root','','sale');
//lay ra bang the loai
$sql='select * 
from type';
$result=mysqli_query($conn,$sql);
$type=$result;
//up load product
if(isset($_POST['add-product'])){
    $title=$_POST['title'];
    $body=$_POST['body'];
     //upload anh
      $img=time()."-".$_FILES["img"]["name"];
      $tname=$_FILES['img']['tmp_name'];
      $uploads_dir='../../assets/image/';
      move_uploaded_file($tname,$uploads_dir.'/'.$img);

    $pulish=1;
    if(empty($_POST['pulish']))
    $pulish=0;
    $price=$_POST['price'];
    $id_type=$_POST['id_type'];
$sql ="INSERT INTO product (title,body,img,pulish,price,id_type)
 VALUES ('$title','$body','$img','$pulish','$price','$id_type')";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
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
    <h5><a href="create.php" class="btn btn-success">Thêm sản phẩm</a> <a href="index.php"  class="btn btn-success">Xem sản phẩm</a></h5>
    <h2 class="h5-center pb-2">Thêm sản phẩm</h2>
    <div class="color-ad" style="min-height:350px" >
    <!-- --------------------------------------------------------------------------------------------------------- -->
 <form  action="create.php" method="post" enctype="multipart/form-data">
  <div class="form-group mt-2">
    <label for="exampleInputEmail1">Tên sản phẩm</label>
    <input type="text" class="form-control" name="title" aria-describedby="emailHelp">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group mt-2">
  <label for="floatingTextarea2">Thân bài viết</label>
  <textarea class="form-control" placeholder="Viết mô tả sản phẩm" name="body" id="floatingTextarea2" style="height: 100px; "></textarea>
</div> 
<div class="form-group mt-2">
    <label for="exampleInputEmail1">Giá sản phẩm</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="price" aria-describedby="emailHelp">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>       
  <div class="form-group mt-2">
  <label>Thể loại</label>
  <select class="form-select" name="id_type" aria-label="Default select example">
  <option selected>Lựa chọn thể loại</option>
  <?php foreach($type as $key =>$t): ?>
  <option value="<?php echo $t['id_type'] ?>"><?php echo $t['name'] ?></option>
  <?php endforeach; ?>
</select>
  </div>   
  <div class="form-group mt-2">
  <label>Chọn một bức ảnh</label>
  <input class="form-control" name="img" type="file" id="formFile">
</div>
<div class="form-group form-check mt-2">
    <input type="checkbox" class="form-check-input" name="pulish" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Là sản phẩm hot ?</label>
  </div>
  <input type="submit" class="btn btn-primary mt-2" name="add-product" value="Submit"></input>
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
