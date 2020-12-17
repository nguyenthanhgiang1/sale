<?php
$conn=new mysqli('localhost','root','','sale');
if(isset($_POST['edit-type'])){
    $id=$_POST['id'];
    $a=$_POST['title'];
    $b=$_POST['body'];
    $sql="UPDATE type 
    SET name = \"$a\", des = \"$b\"
    WHERE id_type=$id";
     echo $sql;
    $result=mysqli_query($conn,$sql);
    header("location:/sale/admin/type/index.php");
}