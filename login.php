<?php
  session_start();
  $conn= mysqli_connect('localhost','root','','sale');
  if(!$conn){
      echo "ket noi that bai roi";
  }
   $username="";
   $password="";
   $error=array();
   if(isset($_POST['submit'])){
        if(empty($_POST['username'])){
            array_push($error,'Tên tài khoản không được trống');
        }
        if(empty($_POST['password'])){
            array_push($error,'Mật khẩu không được trống');
        }

        if(count($error)===0){
            $p=$_POST['username'];
             $sql="select * from user where username=\"$p\"";
            //  echo $sql;
            $result=mysqli_query($conn,$sql);
             $row = mysqli_fetch_assoc($result);
             $username=$_POST['username'];
             $password=$_POST['password'];
             $password=md5($password);
             $use=$row['username'];
             $pas=$row['password'];
             if($use==$username && $password==$pas){
                 //vao admin
                $_SESSION['level']=$row['level'];
                $_SESSION['username']=$username;
                if( $_SESSION['level']==1){
                    header('location:admin/product');
                }else{
                    header('location:/sale');
                }
              
                //  $_SESSION['user']=$username;
             }else{
                array_push($error,"Thông tin đăng nhập sai");
            }
        }
        $username=$_POST['username'];
        $password=$_POST['password'];
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
                <h2>Dăng nhập</h2><br>
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
                <form action="login.php" method="POST">
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1 ">Tài khoản</label>
                        <input type="text" class="form-control " name="username" id="exampleInputEmail1 ">
                    </div>
                    <div class="form-group ">
                        <label for="exampleInputPassword1 ">Mật khẩu</label>
                        <input type="password " class="form-control " name="password" id="exampleInputPassword1 ">
                    </div>
                    <br>
                    <button type="login" name="submit" class="btn btn-primary mb-2" style="width:100%;">Đăng nhập</button>
                </form>
            </div>


        </div>

        <!-- -------------------------------------------------------------------------------- -->
        <?php include("includes/footer.php") ?>
        <script src="assets/boot/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script type="text/javascript" src="assets/boot/js/bootstrap.js"></script>

        <!-- duoi la carousel -->
    </body>

    </html>