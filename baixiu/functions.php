<?php 
//连接
function connect(){
    $conn = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
    return $conn;
}
//查询
function query($conn,$sql){
    $res = mysqli_query($conn,$sql);
    return fetch($res);
}
//转成二维数组
function fetch($res){
    while($row = mysqli_fetch_assoc($res)){
        $list[] = $row;
    }
    return $list;
}
?>