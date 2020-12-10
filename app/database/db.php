<?php
require('connect.php');

// function selectAll($table,$conditions=[])//truy van toan bo hoac co dieu kien
// {
//     global $conn;
//     $sql="select * from $table";
//     if(empty($conditions)){
//         $stmt=$conn->prepare($sql);
//         $stmt->execute();
//         $records=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);
//         return $records; //tra ve toan bang cac ban ghi voi truy van khong co dieu kien
//     }else{
//         $i=0;
//        foreach($conditions as $key => $value){
//            if($i===0){
//             $sql=$sql." where $key=?";
//            }else{
//             $sql=$sql." and $key=?";
//            }
//            $i++;
//        }

//        $stmt=executeQuery($sql,$conditions);
//        $records=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);
//        return $records;  //tra ve voi 1 hoac nhieu dieu kien where
//     }
// }
function selectAll($table){
   $sql='select * from $table';
   $result = $conn->query($sql);
   return $result;
}
