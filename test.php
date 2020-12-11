<?php
$conn=mysqli_connect('localhost','root','','sale');
if($conn){
    echo 'connect success';
}else{
    echo 'Error';
}

if(isset($_POST['submit'])){
    $title=$_POST['title'];
    $pname=time()."-".$_FILES["file"]["name"];
    $tname=$_FILES['file']['tmp_name'];
    $uploads_dir='assets/image/';
    move_uploaded_file($tname,$uploads_dir.'/'.$pname);
    $sql="insert into test(title,image) values('$title','$pname')";
    if(mysqli_query($conn,$sql)){
        echo "upload success";
    }else{
        echo "error upload";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="test.php" method="POST" enctype="multipart/form-data">
    <label for="">title</label>
    <input type="text" name="title"><br><br>
    <label for="">File upload</label>
    <input type="file" name="file"><br><br>
    <input type="submit" name="submit">
    </form>
</body>
</html>