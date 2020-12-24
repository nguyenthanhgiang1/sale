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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/boot/css/bootstrap.css">
        <link href="assets/boot/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/user.css">
        <title>Document</title>
    </head>

    <body>
        <nav class="navbar navbar-expand  bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/sale">Trang chủ</a>
                <ul class="navbar-nav me-auto ">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Liên hệ</a>
                    </li>
                </ul>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="registry.php">Đăng ký</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Đăng nhập</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- ---------------------------------------------------------------------------------------------------------- -->

        <div class="container mt-5 mb-5">
            <div class="col-lg-4 col-md-6 col-sm-8 col-9 border border-primary rounded p-4" style="margin:0 auto;">
                <h2>Dăng ký tài khoản</h2><br>
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
                <form action="registry.php" method="POST">
                    <div class="form-group mb-3">
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
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary mb-2" style="width:100%;">Đăng ký</button>


                </form>
            </div>


        </div>
        <!-- -------------------------------------------------------------------------------- -->
        <div class="row  bg-success">
            <!-- <div class="col-12 bg-primary mt-4">ddaay la chan trang</div> -->
            <div class="col-md-4">
                <div class="container mt-2 mb-2">
                    <h5>Nguyễn Thành Giang</h5>
                    <p class="mb-0 mt-0">0354785858</p>
                    <p class="mb-0 mt-0">Địa chỉ thôn Sở Đông,xã Long Hưng, huyện Văn Giang, tỉnh Hưng Yên<a href="/sale/admin/product/index.php" style="color:black; text-decoration: none;">*</a> </p>
                    <p class="mb-0 mt-0">giangnt623@wru.vn</p>
                </div>
            </div>
            <div class="col-md-4 mt-2 mb-2">
                <h5>Liên hệ với tôi</h5>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email của bạn" name="title" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group mt-2">
                        <textarea class="form-control" placeholder="Tin nhắn của bạn" name="body" id="floatingTextarea2" style="height: 80px; "></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary mt-2" name="add-product" value="Gửi"></input>
                </form>
            </div>
        </div>
        <script src="assets/boot/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script type="text/javascript" src="assets/boot/js/bootstrap.js"></script>

        <!-- duoi la carousel -->
    </body>

    </html>