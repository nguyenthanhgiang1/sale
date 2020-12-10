<?php
$conn=new mysqli('localhost','root','','sale');
if($conn->connect_error){
    die('ket noi sql that bai: '.$conn->connect_error);
}