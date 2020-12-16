<?php
$conn= mysqli_connect('localhost','root','','sale');
if(!$conn){
    echo "ket noi that bai roi";
}
         $sql="select * from product a, type b where a.id_type=b.id_type";

         $t="";
         if(isset($_GET['search'])){
             $t=$_GET['sea'];
              $sql='select * from product a, type b where a.id_type=b.id_type
              and (a.title like "%'.$t.'%" or a.body like "%'.$t.'%")';
          }
          //chon san pham theo type
         if(isset($_GET['t_id'])){
            $v=$_GET['t_id'];
            $sql="select * from product a, type b where a.id_type=b.id_type
            and a.id_type= $v";
        }
         $result=mysqli_query($conn,$sql);

         $sql='select * from type';
         $type=mysqli_query($conn,$sql);
         $conn->close(); 
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

    <div class="container">
        <div class="row bg-dark">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner ">
                <div class="carousel-item active" style="height:450px">
                    <img src="assets\image\1607771107-tipo.jpg" class="d-block h-100" style="width: 100%;height: 100%;object-fit: contain;z-index:0;" alt="...">
                </div>
                <?php foreach($result as $key => $value): ?>
                    <?php if($value['pulish']==1): ?>
                <div class="carousel-item" style="height:450px  ;">
                    <img src="assets\image\<?php echo $value['img']; ?>" class="d-block h-100" style="width: 100%;height: 100%;object-fit: contain;z-index:0;" alt="...">
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev"; href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden" >Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-3">
                <div class="row">
                    <h5>Loại sản phẩm</h5>
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-4">
                        <div class="card" style="width:100%;">
                             <?php foreach($type as $key =>$value): ?>
                             <a href="<?php echo 'index.php?t_id='.$value['id_type'].'&name='.$value['name'] ?>" class="btn btn-success mb-1"><?php echo $value['name'] ?></a>
                             <?php endforeach; ?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-6"><h5>
                        <?php
                             if(isset($_GET['search'])){
                                echo "Kết quả tìm kiếm : ".$result -> num_rows." sản phẩm";
                             }
                             else echo "Danh sách sản phẩm";
                        ?>
                       </h5></div>
                    <div class="col-lg-5 col-md-6 col-6">
                           <form class="d-flex" action="index.php" method="GET">
                              <input class="form-control me-2" type="search" name="sea" placeholder="Nhập từ khóa" value="<?php if($t!=""){echo $t;} ?>" aria-label="Search">
                              <button class="btn btn-outline-success" name="search" type="submit">Tìm kiếm</button>
                           </form>
                    </div>
                   
                </div>
                <div class="row">
                <?php foreach($result as $key => $value): ?>
                    <?php $tt=$value['body'];
                          if(strlen($tt)>45){
                          $tt=mb_substr($tt,0,50);
                          $tt=$tt."...";
                     }?>
                    <div class="col-lg-4 col-md-4 col-sm-6 mt-4">
                        <div class="card" style="width:100%;">
                            <img src="<?php echo "assets/image/".$value['img'] ?>" class="card-img-top" height="145px" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $value['title'] ?></h5>
                                <p class="card-text"><?php echo $tt; ?></p>
                                <a href="#" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>

                    </div>
                    <?php endforeach; ?>
                </div>
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