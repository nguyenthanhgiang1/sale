<?php
$conn=new mysqli('localhost','root','','sale');
// if($conn){
//     echo 'ket noi thanh cong';
// }
$sql='select * 
from product a, type b
where a.id_type=b.id_type';
$result=mysqli_query($conn,$sql);
print_r($result);
echo 's';
foreach($result as $key =>$value){
    echo $key;
}