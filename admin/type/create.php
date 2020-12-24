<?php 
$conn=new mysqli('localhost','root','','sale');
//up load product
if(isset($_POST['add-type'])){
    $title=$_POST['id_type'];
    $body=$_POST['type_body'];
$sql ="INSERT INTO type (name,des)
 VALUES ('$title','$body')";
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
                <h5><a href="create.php" class="btn btn-success">Thêm thể loại</a> <a href="index.php" class="btn btn-success">Xem thể loại</a></h5>
                <h2 class="h5-center pb-2">Quản lý thể loại sản phẩm</h2>
                <div class="color-ad" style="min-height:350px">
                    <!-- --------------------------------------------------------------------------------------------------------- -->
                    <form action="create.php" method="post" enctype="multipart/form-data">
                        <div class="form-group mt-2">
                            <label for="exampleInputEmail1">Tên thể loại</label>
                            <input type="text" class="form-control" name="id_type" aria-describedby="emailHelp">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group mt-2">
                            <label for="floatingTextarea2">Mô tả thể loại</label>
                            <textarea class="form-control" placeholder="Viết mô tả sản phẩm" name="type_body" id="floatingTextarea2" style="height: 100px; "></textarea>
                        </div>
                      
                        <input type="submit" class="btn btn-primary mt-2" name="add-type" value="Submit"></input>
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