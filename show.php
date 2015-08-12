<?php
define("KQ_WORK",true);
require_once("inc/base.inc.php");

$id='';
if(isset($_GET['id'])){
  $id=setdefensesql($_GET['id']);
}

$navname='index';

$show_r=get_first_date('news',"where id='".$id."' limit 1");
//获取栏目信息
$lmmsg=get_first_date('lanmu',"where id='".$show_r['kq_lmid']."'");
if($show_r['kq_endtime']<$ontime)
{
  $navname='over'; 
}

$user=get_first_date('user',"where kq_checked='1' order by id desc limit 100",'more');
if(isset($_COOKIE['user'])){
  $isuser=is_login($_COOKIE['uid']);
  if($show_r['kq_userid']==$isuser['id'])
  {

  }else
  {
    if(!$show_r['kq_checked']){
      echo '<h1>信息审核中!!!</h1>';
      exit();
    }
  }
}else
{
  if(!$show_r['kq_checked']){
  echo '<h1>信息审核中!!!</h1>';
  exit();
  }
}
$dizi=$show_r['kq_address']==''?'':"<span>地址: ".$show_r['kq_address']."</span>";
$tel=$show_r['kq_tel']==''?'':"<span>电话: ".$show_r['kq_tel']."</span>";
$qq=$show_r['kq_qq']==''?'':"<span>QQ: ".$show_r['kq_qq']."</span>";
$wx=$show_r['kq_weixin']==''?'':"<span>微信: ".$show_r['kq_weixin']."</span>";
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <title><?php echo $show_r['kq_title']?></title>
  <meta name="keywords" content="<?php echo $show_r['kq_keyword']?>" />
  <meta name="description" content="<?php echo $show_r['kq_description']?>" />
  <meta property="qc:admins" content="575014655346376751163757" />
 <?php require_once(KQ_PATH.'inc/style.inc.php');?>
  <script src="laypage/laypage.js"></script>
</head>
<body>
<?php require_once(KQ_PATH.'inc/state.inc.php');?>
  <div class="warp">
    <!-- 头部 -->
    <?php require_once(KQ_PATH.'inc/header.inc.php');?>

    <!-- 中间内容 -->
    <div id="container">
      <div class="wm1000">

        <div class="clear_float"></div>
        <div class="left">
            <div class="show_warp">
              
                <div class="cont_msg">
                    <?php
                      if(!$show_r['kq_checked']){
                        echo '<h3 style="color:#f00;font-size:24px;text-align:center">信息审核中!!!</h3>';
                        
                      }
                    ?>
                    <div class="title">
                      <h1><?php echo $show_r['kq_title']?>
                      <?php 
                        if($lmmsg['kq_type']=='adv')
                        {
                          if($show_r['kq_isok']==3)
                          {
                           echo '<span class="b_btn b_btn_i">解决中</span>';
                          }elseif($show_r['kq_isok']==1)
                          {
                           echo '<span class="b_btn b_btn_s">已解决</span>';
                          }elseif($show_r['kq_isok']==2)
                          {
                           echo '<span class="b_btn b_btn_w">未解决</span>';
                          }
                          elseif($show_r['kq_isok']==4)
                          {
                           echo '<span class="b_btn b_btn_w">本地招商</span>';
                          }
                          elseif($show_r['kq_isok']==5)
                          {
                           echo '<span class="b_btn b_btn_w">本地代理</span>';
                          }
                        }
                      ?>
                      </h1>

                      <p class="msg_user">
                        <?php echo $dizi.$tel.$qq.$wx?>
                      </p>
                     
                    
                    </div>
                    <?php
                    $picarray=json_decode($show_r['kq_thumbs']);
                    if(count($picarray)>0){
                      foreach ($picarray as $key => $value) {
                        if($value){
                          echo '<div class="imgshow">
                            <img class="fmpic" src="'.pic_url($value).'"  alt="">
                            </div>
                          ';
                          
                        }
                      }
                    }
                    ?>
                    <div class="msg_p">
                      <?php echo $show_r['kq_content']?>
                    </div>
                    <div class="share">
                      <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
                      <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"24"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                      
                       </div>
                    

                    
                   <!--  <div class="liuyan">
                     <h3>留言信息</h3>
                     <?php
                       if(count($lmmsg)>0){
                         if($lmmsg['kq_type']=='adv'){
                           if(($show_r['kq_endtime']>time())>0)
                           {
                       ?>
                     <div class="add_liuyan">
                       <textarea name="kq_content" cols="70" rows="5" class="textArea" id="kq_content"></textarea>
                       <p>
                         <?php
                         if(!is_login(@$_COOKIE['uid'],0,0)){
                           echo ' <b>还没登录不能留言</b><a href="login.php" target="_blank"> 立即登录</a>';
                         }else
                         {
                           echo ' <input name="submit" class="btn go_liuyan" value="留言" type="submit">';
                         }
                         ?>
                       </p>
                     </div>
                     <?php
                           }
                         }
                      }
                     ?> -->
                      <!--  <div class="line"></div>
                                            <div class="ad_ly_list">
                       
                                            </div>ad_ly_list
                                            <div id="ly_list_page">
                       
                                            </div>
                                          </div> -->
                    
                </div>
              
              
            </div>
        </div><!-- middle -->
        <div class="right">
          <div class="right_warp">
            <div class="part part1">
              <p class="mun_font">
                <?php
                $telstr=get_index($kq_openconfig['tel']);
                echo $telstr['kq_code'];
                ?>
                
              </p>
            </div>
            <div class="part part2">
              <div class="qr">
              
                <?php
                 
                  echo "<img src='".pic_url($wxpic[0])."' alt='关注微信' />";
                ?>
              
              </div>
               <p align="center">微信号：nnswws</p>
              <div class="login_name" style="text-align:center;">
              <?php
                /*if(isset($_COOKIE['user'])){
                  $username=is_login($_COOKIE['uid']);
                  if($username){
                    echo '欢迎<span><a href="user.html">'.$username['kq_name'].'</a></span>';
                  }else{
                     echo '<a href="login.php" target="_blank"  ><img src="images/Connect_logo_4.png" alt=""></a>';
                  }
                }else{
                  echo '<a href="login.php" target="_blank"  ><img src="images/Connect_logo_4.png" alt=""></a>';
                }*/
              ?>
              
              </div>

            </div>
            <div class="part part3">
            <h3>网站服务简介</h3>
              <div class="user_sroll">
              <!-- <ul class="user_list">
                <?php
                  /*if(count($user)>0){
                    foreach ($user as $key => $value) {
                      echo ' <li>'.$value['kq_name'].'<span>刚刚注册了</span></li>';
                    }
                  }*/
              
                ?>
                
              </ul> -->
              <div class="guirze">
                <div id="scrollobj" class="gz_cont">
                <?php
                  $zj=get_index($kq_openconfig['zj']);
                  echo $zj['kq_content'];
                ?>
                </div>
              </div>
              </div>
            </div>
         <!--    <div class="part part4">
           <img src="images/step.jpg" alt="">
         </div> -->
            
          </div>
        </div>
        <div class="clear_float"></div>
      </div>
      <div class="clear_float"></div>
    <!-- 底部 -->
   
    <?php require_once(KQ_PATH.'inc/footer.inc.php');?>
  </div>


<script>
id="<?php echo $show_r['id']?>";
/* $.getJSON('inc/action_get.php', {id:'13',page:1,action:"ly_list" }, function(res){ //从第6页开始请求。返回的json格式可以任意定义
     laypage({
         cont: 'ly_list_page', //容器。值支持id名、原生dom对象，jquery对象。【如该容器为】：<div id="page1"></div>
         pages: res.pages, //通过后台拿到的总页数
         curr: 1, //初始化当前页
         jump: function(e){ //触发分页后的回调
             $.getJSON('inc/action_get.php', {page: e.curr,id:id,action:"ly_list"}, function(res){
                 e.pages = e.last = res.pages; //重新获取总页数，一般不用写
                 //渲染
                 var view = $(".ad_ly_list"); //你也可以直接使用jquery
                  view.html(res.contents); 
             });
         }
     });
 });*/
 <?php
   if(count($lmmsg)>0){
     if($lmmsg['kq_type']=='adv'){
       if(($show_r['kq_endtime']>time())>0)
       {
   ?>
/*$(document).on('click', '.go_liuyan', function(event) {
  var content=$("#kq_content").val();
  var title="<?php echo $show_r['kq_title']?>";
  $.ajax({
      'url': 'inc/action.php',
      type:'POST',
      data:{action:"liuyan_add",kq_title:title,kq_newsid:id,kq_content:content},
      cache: false,
      dataType: 'json',
      success:function(data) {
          if(data.status==1){
            alert(data.msg);
            location.reload();
          }else{
            alert(data.msg);
          }

      }
  });

});*/

<?php
      }
    }
 }
?>
/*var i=0;
function zj_roll()
{
  $zlfetsize=$("#scrollobj").height();
  i--;
  if(i==-$zlfetsize)
  {
    i=250;
  }
  $("#scrollobj").css('top', i);

}
;
zjroo=setInterval('zj_roll()',50);
$("#scrollobj").hover(function() {
  window.clearInterval(zjroo);
}, function() {
 zjroo=setInterval('zj_roll()',50);
});*/
  
</script>
</body>
</html>

