<?php
$conn=new mysqli('localhost','root','','sale');
if(isset($_POST['edit-product'])){
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
    $id=$_POST['id'];

    $sql=" UPDATE product SET title='$title', body = '$body',img='$img' ,pulish = '$pulish',price='$price',id_type='$id_type' WHERE  id = $id";
    $result=mysqli_query($conn,$sql);
if ($result) {
  header('location:/sale/admin/product/index.php');
  exit();
} else {
  echo "record edit Error: " . $sql . "<br>" . $conn->error;
}
}