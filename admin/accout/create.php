<?php
$conn= mysqli_connect('localhost','root','','sale');
if(!$conn){
    echo "ket noi that bai roi";
}
$email="";
$username="";
$password="";
$repassword="";
$error=array();
if(isset($_POST['submit'])){
     if(empty($_POST['username'])){
         array_push($error,'Tên tài khoản không được trống');
     }
     if(empty($_POST['password'])){
         array_push($error,'Mật khẩu không được trống');
     }
     if(empty($_POST['repassword'])){
        array_push($error,'Bạn cần nhập lại mật khẩu');
     }
     if(empty($_POST['email'])){
        array_push($error,'Bạn cần nhập email');
     }
     $username=$_POST['username'];
     $password=$_POST['password'];
     $repassword=$_POST['repassword'];
     $email=$_POST['email'];
     if(count($error)===0){
         if($repassword!==$password){
            array_push($error,'Nhập lại mật khẩu bị sai');
         }
         $p=$_POST['username'];
          $sql="select * from user where username=\"$p\"";
         //  echo $sql;
         $result=mysqli_query($conn,$sql);
          $row = mysqli_fetch_assoc($result);
          $username=$_POST['username'];
        //   $password=$_POST['password'];
          $email=$_POST['email'];
        //   $password=md5($password);
          $use=$row['username'];
           $pas=$row['password'];
          if($use==$username){
            array_push($error,'Tên tài khoản đã tồn tại');
          }

          $p=$_POST['email'];
          $sql="select * from user where email=\"$p\"";
          //  echo $sql;
          $result=mysqli_query($conn,$sql);
           $row = mysqli_fetch_assoc($result);
        //    $username=$_POST['username'];
           $ema=$row['email'];


          if($email==$ema){
              array_push($error,'Tên email đã tồn tại');
          }
          if(count($error)==0){
            $password=md5($password);
            $sql="INSERT INTO user (username, password, level, email) VALUES ('$username', '$password', '0', '$email')";
            echo $sql;
            $result=mysqli_query($conn,$sql);
            if($result)
            echo "ban da dang ky thanh cong";
          }
     }
}
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
    <h5><a href="create.php" class="btn btn-success">Thêm tài khoản</a> <a href="index.php"  class="btn btn-success">Xem tài khoản</a></h5>
    <!-- <h2 class="h5-center pb-2">Quản lý tài khoản</h2> -->
  


    <h2 class="h5-center pb-2">Thêm tài khoản</h2>
    <?php if(count($error)>0):?>
                <div style="color:red">
                    <?php foreach($error as $erro): ?>
                    <li>
                        <?php echo $erro; ?>
                    </li>
                    <?php endforeach; ?>
                </div>
                <br>
                <?php endif; ?>
                <div class="color-ad" style="min-height:350px">
                    <!-- --------------------------------------------------------------------------------------------------------- -->
                <form action="create.php" method="POST">
                    <div class="form-group mb-3 mt-3">
                        <label for="exampleInputEmail1 ">Tài khoản</label>
                        <input type="text" class="form-control " name="username" id="exampleInputEmail1" value="<?php echo $username; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1 ">Mật khẩu</label>
                        <input type="password " class="form-control " name="password" id="exampleInputPassword1" value="<?php echo $password; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1 ">Nhập lại mật khẩu</label>
                        <input type="password " class="form-control " name="repassword" id="exampleInputPassword1" value="<?php echo $repassword; ?>">
                    </div>
                    <div class="form-group ">
                        <label for="exampleInputPassword1 ">Nhập email</label>
                        <input type="email" class="form-control " name="email" id="exampleInputPassword1" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group form-check mt-4">
                            <input type="checkbox" class="form-check-input" name="pulish" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Đánh dấu tích nếu là tài khoản quản trị.</label>
                        </div>
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary mb-2">Submit</button>

                </form>
            <!-- </div>


        </div> -->
















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
