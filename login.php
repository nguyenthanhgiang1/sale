<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Dang nhap</h3>
    <form action="login.submit.php" method="POST">
          <table>
             <tr>
                <td>Username: </td>
                <td><input type="text" name="username"></td>
             </tr>
             <tr>
                <td>Password:</td>
                <td><input type="password" name="password"></td>
             </tr>
             <tr>
                <td colspan="2">
                    <button type="submit" name="submit">Login</button>
                    <button type="reset">Reset</button>
                </td>
             </tr>
          </table>
    </form>
</body>
</html> -->


<?php
  session_start();
  $conn= mysqli_connect('localhost','root','','sale');
  if(!$conn){
      echo "ket noi that bai roi";
  }
   if(isset($_POST['submit']) && $_POST['username'] != '' && $_POST['password']!=''){
         $username=$_POST['username'];
         $password=$_POST['password'];
         $password=md5($password);
         $sql="select * from user where username='$username' and password='$password'";
         $user=mysqli_query($conn,$sql);
         if(mysqli_num_rows($user)>0){
             echo "ban da dang nhap thanh cong";
             header('location:admin/product');
             $_SESSION['user']=$username;
         }else{
             echo "ban da nhap sai tai khoan hoac mat khau";
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
    <div class="container mt-4 mb-4">
    <div class="row">
        <h3 class="text-center mb-3">Đăng nhập tại đây</h3>
        <div class="col-lg-4 col-md-6 col-sm-8 col-9 bg-success rounded" style="margin:0 auto;">
            <form class="mt-5 mb-5" action="login.php" method="POST">
                <div class="m-3">
                    <label for="exampleInputEmail1" class="form-label">Tài khoản</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" >
                </div>
                <div class="m-3">
                    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                </div>
                <button  type="login" name="submit" class="ms-3 btn btn-primary">Dăng nhập</button>
            </form>
        </div>
    </div>
</div>
    
        <!-- -------------------------------------------------------------------------------- -->
        <div class="row  bg-success">
            <!-- <div class="col-12 bg-primary mt-4">ddaay la chan trang</div> -->
            <div class="col-md-4">
                   <div class="container mt-2 mb-2">
             <h5>Nguyễn Thành Giang</h5>
                   <p class="mb-0 mt-0">0354785858</p>
                   <p class="mb-0 mt-0">Địa chỉ thôn Sở Đông,xã Long Hưng, huyện Văn Giang, tỉnh Hưng Yên<a  href="/sale/admin/product/index.php" style="color:black; text-decoration: none;">*</a> </p>
                   <p class="mb-0 mt-0">giangnt623@wru.vn</p>
                  </div>
             </div>
            <div class="col-md-4 mt-2 mb-2">
            <h5>Liên hệ với tôi</h5>
            <form  action="#" method="post" enctype="multipart/form-data">
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