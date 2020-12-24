<?php 
$conn=new mysqli('localhost','root','','sale');

$name="";
$des="";
if(isset($_GET['id'])){
$sql="select * from type where id_type=".$_GET['id'];
$result=mysqli_query($conn,$sql);
$type = mysqli_fetch_assoc($result);
$name=$type['name'];
$des=$type['des'];
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
                <h5><a href="create.php" class="btn btn-success">Thêm sản phẩm</a> <a href="index.php" class="btn btn-success">Xem sản phẩm</a></h5>
                <h2 class="h5-center pb-2">Sửa sản phẩm</h2>
                <div class="color-ad" style="min-height:350px">
                    <!-- --------------------------------------------------------------------------------------------------------- -->
                    <form action="/sale/app/controllers/type.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                        <div class="form-group mt-2">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="title" aria-describedby="emailHelp" value="<?php echo $name; ?>">

                        </div>
                        <div class="form-group mt-2">
                            <label for="floatingTextarea2">Thân bài viết</label>
                            <textarea class="form-control" placeholder="Viết mô tả sản phẩm" name="body" id="floatingTextarea2" style="height: 100px; "><?php echo $des; ?></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary mt-2" name="edit-type" value="Submit"></input>
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