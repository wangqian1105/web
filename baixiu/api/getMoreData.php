<?php 
require_once '../config.php';
require_once '../functions.php';
/* ******处理前台发来的'加载更多'请求，********/

//1.获取前台传来的参数
$categoryid = $_POST['categoryid'];
$pageNum = $_POST['pageNum'];
$pageSize = $_POST['pageSize'];
$offset = ($pageNum-1)*$pageSize;
//2.链接数据库
$conn = connect();
//3.写SQL语句
$sql = "SELECT p.* ,c.name ,u.nickname,(SELECT COUNT(id) FROM comments c WHERE c.`post_id` = p.`id`) as commentCount FROM posts p 
LEFT JOIN categories c ON c.`id`= p.`category_id` 
LEFT JOIN users u ON u.id = p.`user_id`
WHERE p.`category_id`= {$categoryid}
LIMIT {$offset},{$pageSize}";

$sqlcount = "select count(id) as total from posts where posts.category_id={$categoryid}";
//4.从数据库里拿到数据
$moredata = query($conn,$sql);
//5.把数据返回到前台
$count = query($conn,$sqlcount);//得到是二维数组

$response = ["code"=>0,"msg"=>"fail"];

if(!empty($moredata)){
    $response = ["code"=>1,"msg"=>"success","moredata"=>$moredata,"total"=>$count[0]['total']];
}

echo json_encode($response) ;
?>

<!-- function (a){
    console.log(a);
}
a(2); -->