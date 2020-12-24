<?php 
$conn=new mysqli('localhost','root','','sale');

if(isset($_GET['del_id'])){//xoa theo id
  //adminOnly();  // loi chi admin
  $id=$_GET['del_id'];
  $sql= "DELETE FROM user WHERE id = $id";
$result=mysqli_query($conn,$sql);
  // $count =delete($table,$id);
 // $_SESSION['message']='Topic deleted successfully'; 
 // $_SESSION['type']='success';
  //header('index.php');
  //exit();
}


$sql='select * 
from user';
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
                <h5><a href="create.php" class="btn btn-success">Thêm tài khoản</a> <a href="index.php" class="btn btn-success">Xem tài khoản</a></h5>
                <h2 class="h5-center pb-2">Quản lý tài khoản</h2>
                <div class="color-ad" style="min-height:350px">
                    <div class="row">
                        <div class="col-1">
                            <h5>Stt</h5>
                        </div>
                        <div class="col-3">
                            <h5>Tên tài khoản</h5>
                        </div>
                        <div class="col-3">
                            <h5>Tên email</h5>
                        </div>
                        <div class="col-2">
                            <h5>Cấp quyền</h5>
                        </div>
                        <div class="col-3">
                            <h5>Thao tác</h5>
                        </div>
                    </div>
                    <hr>
                    <?php foreach($pro as $key =>$p): ?>
                    <div class="row">

                        <div class="col-1">
                            <?php echo $key+1 ?>
                        </div>
                        <div class="col-3">
                            <?php echo $p['username'] ?>
                        </div>

                        <div class="col-3">
                            <?php echo $p['email'] ?>
                        </div>
                        <div class="col-2">
                            <?php if($p['level']==0)echo "Người dùng"; else echo "<p style='color:blue;margin:0;'>Quản trị viên</p>" ?>
                        </div>
                        <div class="col-1"> <a href="edit.php?id=<?php echo $p['id'];?>" class="btn-outline-warning a-text">Sửa</a></div>
                        <div class="col-2"> <a href="index.php?del_id=<?php echo $p['id'];?>" class="btn-outline-danger a-text">Xoa</a></div>
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
    <script type="text/javascript" src="../../assets/boot/js/bootstrap.js"></script>
</body>

</html>