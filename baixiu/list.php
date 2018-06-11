<?php 
require_once './config.php';
require_once './functions.php';
$category_id = $_GET['id'];
// echo $category_id;
// $conn = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);

    $sql =  "SELECT p.`id`,p.`title`,p.`content`,p.`created`,p.`feature`,p.`likes`,p.`views` ,p.`category_id`,c.`name`,u.`nickname`,
    (SELECT COUNT(*) FROM comments WHERE post_id = p.`id`)AS commentCount 
    FROM posts p 
    LEFT JOIN categories c ON c.`id` = p.`category_id`
    LEFT JOIN users u ON u.`id` = p.`user_id`
    WHERE p.`category_id` = $category_id
    LIMIT 100";

//      $reslist = mysqli_query($conn,$sql1);

//     while($row = mysqli_fetch_assoc($reslist)){
//         $list[] = $row;
//     }
   $list = query(connect(DB_HOST,DB_USER,DB_PWD,DB_NAME),$sql);
// print_r($arr);


?>


<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>阿里百秀-发现生活，发现美!</title>
  <link rel="stylesheet" href="static/assets/css/style.css">
  <link rel="stylesheet" href="static/assets/vendors/font-awesome/css/font-awesome.css">
</head>
<body>
  <div class="wrapper">
    <div class="topnav">
      <ul>
        <li><a href="javascript:;"><i class="fa fa-glass"></i>奇趣事</a></li>
        <li><a href="javascript:;"><i class="fa fa-phone"></i>潮科技</a></li>
        <li><a href="javascript:;"><i class="fa fa-fire"></i>会生活</a></li>
        <li><a href="javascript:;"><i class="fa fa-gift"></i>美奇迹</a></li>
      </ul>
    </div>
    <?php include_once '/public/_header.php'?>
    <?php include_once '/public/_aside.php'?>
    
    <div class="content">
      <div class="panel new">
        <h3><?php echo $list[0]['name']?></h3>
        <?php foreach($list as $key=>$value):?>
        <div class="entry">
          <div class="head">
            <span class="sort"><?php echo $value['name']?></span>
            <a href="detail.php?id=<?php echo $value['id']?>"><?php echo $value['title']?></a>
          </div>
          <div class="main">
            <p class="info"><?php echo $value['nickname']?> 发表于 <?php echo $value['created']?></p>
            <p class="brief"><?php echo $value['content']?></p>
            <p class="extra">
              <span class="reading">阅读(<?php echo $value['views']?>)</span>
              <span class="comment">评论(<?php echo $value['commentCount']?>)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(<?php echo $value['likes']?>)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span><?php echo $value['name']?></span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <!-- <img src="static/uploads/hots_2.jpg" alt=""> -->
              <img src="<?php echo $value['feature']?>" alt="">
            </a>
          </div>
        </div>
        <?php endforeach ?>
        <!-- 和entry放到一个盒子下面 -->
        
         <!--点击加载更多按钮-->
         <div class="loadmore">
              <span class="btn">加载更多</span>
          </div>
        <!-- <div class="entry">
          <div class="head">
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="static/uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div>
        <div class="entry">
          <div class="head">
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="static/uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div>
        <div class="entry">
          <div class="head">
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="static/uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div> -->
      </div>
    </div>

    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>
  <script src="./static/assets/vendors/jquery/jquery.min.js"></script>
  <script>
  $(function(){
    //为按钮注册事件
    var pageNum = 1;
    var pageSize = 20;
    $('.loadmore .btn').on('click',function(){
      //页面加载的时候已经渲染一次了，点击按钮相当于取下一页的数据，这里用Ajax从后台拿到数据
      var categoryid = location.search.charAt(location.search.length-1);
      // var categoryid = location.search.split("=")[1];
       pageNum++;
      $.ajax({
        type: "post",
        url: "./api/getMoreData.php",
        data: {
          categoryid:categoryid,
          pageNum:pageNum,
          pageSize:pageSize
        },
        dataType: "json",
        success: function (res) {
          
          // console.log(res);//res是一个json格式的对象
          if(res.code == 1){
            var data = res.moredata;
            console.log(data);//是个数组，每一项又是一个对象
            var str = '';
            $.each(data,function(index,value){
              // str += '<div class="entry">\
              //             <div class="head">\
              //             <span class="sort">'+value['name']+'</span>\
              //             <a href="javascript:;">'+value['title']+'</a>\
              //           </div>\
              //           <div class="main">\
              //             <p class="info">'+value['nickname']+'发表于 '+value['created']+'</p>\
              //             <p class="brief">'+value['content']+'</p>\
              //             <p class="extra">\
              //               <span class="reading">阅读('+value['views']+'</span>\
              //               <span class="comment">评论('+value['commentCount']+')</span>\
              //               <a href="javascript:;" class="like">\
              //                 <i class="fa fa-thumbs-up"></i>\
              //                 <span>赞('+value['likes']+')</span>\
              //               </a>\
              //               <a href="javascript:;" class="tags">\
              //                 分类：<span>'+value['name']+'</span>\
              //               </a>\
              //             </p>\
              //             <a href="javascript:;" class="thumb">\
              //               <!-- <img src="static/uploads/hots_2.jpg" alt=""> -->\
              //               <img src='+value['feature']+'alt="">\
              //             </a>\
              //           </div>\
              //         </div>'

              str += `<div class="entry">
              <div class="head">
                <span class="sort">${value['name']}</span>
                <a href="dedail.php?id = ${value['id']}">${value['title']}</a>
              </div>
              <div class="main">
                <p class="info">${value['nickname']} 发表于 ${value['created']}</p>
                <p class="brief">${value['content']}</p>
                <p class="extra">
                  <span class="reading">阅读(${value['views']})</span>
                  <span class="comment">评论(${value['commentCount']})</span>
                  <a href="javascript:;" class="like">
                    <i class="fa fa-thumbs-up"></i>
                    <span>赞(${value['likes']})</span>
                  </a>
                  <a href="javascript:;" class="tags">
                    分类：<span>${value['name']}</span>
                  </a>
                </p>
                <a href="javascript:;" class="thumb">
                  <!-- <img src="static/uploads/hots_2.jpg" alt=""> -->
                  <img src="${value['feature']}" alt="">
                </a>
              </div>
            </div>`;
            })
            $(str).insertBefore($('.loadmore'));
            var totalpage = Math.ceil(res.total/pageSize);
            if(totalpage==pageNum){
              $('.loadmore .btn').hide();
            }
          }

        }
      });
    })
  })
  
  
  
  </script>
</body>
</html>