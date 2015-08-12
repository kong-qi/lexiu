<?php
define("KQ_WORK",true);
require_once("inc/base.inc.php");

//配置首页链接信息
$http=KQ_URL;
$httpqz="";
$httpqzt="";
$httphz="";
if($kq_wjt){
    $httpqz="-";
    $httpqzt="-";
    $httphz=".html";
}else{
  $httpqz="/index.php?lmid="; 
  $httpqzt="&amp;id=";  
}
$over='';
if(isset($_GET['time'])){
    
    $over=$_GET['time']==''?'':1;

}
$id='1';
$key='';
$wherestr='';
if(isset($_GET['id'])){
  $id=setdefensesql($_GET['id']);
}
//echo $_SERVER['REQUEST_URI'];
if(isset($_GET['key']))
{
  $key=setdefensesql($_GET['key']);

  $wherestr="and (kq_title like '%".$key."%' or id ='".$key."' or kq_guanjc like '%".$key."%')";
}
$navname='index';
if($over){
 $navname='over'; 
}
//获取栏目信息
$lmmsg=get_first_date('lanmu',"where id='".$id."'");




if($over)
{
  if(count($lmmsg)>0)
  {
    if($lmmsg['kq_type']=='adv')
    {
      $huodong=get_first_date('news',"where kq_checked='1'  and kq_lmid in(".get_huodong_id().")  ".$wherestr."  and kq_endtime<='".($ontime)."' order by id desc, kq_sort desc",'more');

    }else
    {
      $huodong=array();
    }
  }


}else{
  if(count($lmmsg)>0)
  {
    if($lmmsg['kq_type']=='adv')
    {
      $huodong=get_first_date('news',"where kq_checked='1'  and kq_lmid='".$id."'  ".$wherestr." and kq_sttime<='".$ontime."' and kq_endtime>='".($ontime)."' order by id desc, kq_sort desc",'more');
    }else
    {
      $huodong=array();
    }
  }
}
$tadv=get_first_date('news',"where kq_checked='1' and kq_index='2' and kq_lmid='5' and kq_sttime<='".$ontime."' and kq_endtime>='".$ontime."' order by kq_sort desc",'more');
$topadv=get_first_date('news',"where kq_checked='1' and kq_index='1'  and kq_lmid='5' and kq_sttime<='".$ontime."' and kq_endtime>='".$ontime."' order by kq_sort desc",'more');


$user=get_first_date('user',"where kq_checked='1' order by id desc limit 100",'more');

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <title><?php echo $kq_title?></title>
  <meta name="keywords" content="<?php echo $kq_keyword?>" />
  <meta name="description" content="<?php echo $kq_description?>" />
  <meta property="qc:admins" content="5750146677643434636" />
 <?php require_once(KQ_PATH.'inc/style.inc.php');?>
</head>
<body>
<?php require_once(KQ_PATH.'inc/state.inc.php');?>
  <div class="warp">
    <!-- 头部 -->
    <?php require_once(KQ_PATH.'inc/header.inc.php');?>

    <!-- 中间内容 -->
    <div id="container">
      <div class="wm1000">


        <div class="adv_top">
          <?php
          $advtop=get_first_date('adv',"where kq_position='index' and kq_checked=1 order by kq_sort desc  limit 1");
          if(count($advtop)>0){
            $blank=$advtop['kq_url']==''?'':'target="_blank"';
            echo '<a href="'.empty_url($advtop['kq_url'],"javascript:void(0)").'"  '.$blank.'><img class="lazy" src="'.pic_url($advtop['kq_picurl']).'" alt=""></a>';
          }
          
          ?>
          
          
        </div><!-- adv_top -->
        <div class="clear_float"></div>
        <div class="left">
        <?php
        
        if(count($topadv)>0){
        ?>
          <div class="list_top_adv">
            <ul>
              <?php
              
              foreach ($topadv as $tadvkey => $tadv_v) {
                $wburl=$tadv_v['kq_wburl']==''?'show-'.$tadv_v['id'].'.html':$tadv_v['kq_wburl'];
                $wbblank=$tadv_v['kq_wburl']==''?'':"target='_blank'";
                echo '<li><a href="'.$wburl.'" '.$wbblank.' target="_blank"><img class="lazy"  data-original="'.pic_url($tadv_v['kq_picurl'],"260x170/").'" alt=""></a></li>'; 
              }
              
              ?>
             
              <div class="clear_float"></div>
            </ul>
            <div class="clear_float"></div>
          </div>
          <?php
          }
          ?>
           <div class="clear_float"></div>
          <div class="search">
            <form action="/" method="GET">
              <input type="text" name="key" class="key_search" value="输入标题关键字或信息编号">
              <input type="hidden" name="id" value="<?php echo $id;?>" >
              <input type="hidden" name="time" value="<?php echo $over ?>">
              <input type="submit" value="搜索" class="search_btn">
            </form>
          </div>
          <div class="text_pin">
            <ul>
              <?php
                if(count($huodong)>0){
                foreach ($huodong as $hdkey => $hd_v) {
                   $lefttime=($hd_v['kq_endtime']-$ontime);
                   echo '<li><dl> <dt>';
                   echo '<span class="id_num">信息编号: '.$hd_v['id'].'</span>';
                   echo '<span>有效时间: </span><b id="tm-'.$hd_v['id'].'" class="items_time" data-time="'.date("Y-m-d H:i:s",$hd_v['kq_endtime']).'" data-id="'.$hd_v['id'].'" ></b>';
                   if($hd_v['kq_isok']==3)
                   {
                    echo '<span class="b_btn b_btn_i">解决中</span>';
                   }elseif($hd_v['kq_isok']==1)
                   {
                    echo '<span class="b_btn b_btn_s">已解决</span>';
                   }elseif($hd_v['kq_isok']==2)
                   {
                    echo '<span class="b_btn b_btn_w">未解决</span>';
                   }elseif($hd_v['kq_isok']==4)
                   {
                     echo '<span class="b_btn b_btn_s">本地招商</span>';
                   }elseif($hd_v['kq_isok']==5)
                   {
                     echo '<span class="b_btn b_btn_s">本地代理</span>';
                   }
                   echo '</dt><dd>';
                   echo '<h3><a href="'.empty_url($hd_v['kq_wburl'],"show-".$hd_v['id'].".html").'" >'.$hd_v['kq_title'].'</a></h3></dd></dl>';
                   echo '</li>';

                 /* echo '<div class="items lftime"> <div class="items_img">';
                  echo '<a href="'.empty_url($hd_v['kq_wburl'],"show-".$hd_v['id'].".html").'" ><img class="lazy" data-original="'.pic_url($hd_v['kq_picurl']).'" alt=""></a> ';
                  echo ' <div class="item_num">编号:<span>'.$hd_v['id'].'</span></div>'; 
                   echo '<div class=" hongtime"><div id="tm-'.$hd_v['id'].'" class="items_time" data-time="'.date("Y-m-d H:i:s",$hd_v['kq_endtime']).'" data-id="'.$hd_v['id'].'"></div></div>';
                  $dizi=$hd_v['kq_address']==''?'':"<span>地址: ".$hd_v['kq_address']."</span>";
                  $tel=$hd_v['kq_tel']==''?'':"<span>电话: ".$hd_v['kq_tel']."</span>";
                  $qq=$hd_v['kq_qq']==''?'':"<span>QQ: ".$hd_v['kq_qq']."</span>";
                  $wx=$hd_v['kq_weixin']==''?'':"<span>微信: ".$hd_v['kq_weixin']."</span>";
                  echo '<div class="text_title">'.$dizi.$tel.$qq.$wx.'</div>';
                  echo '<div class="text_bg"></div>';
                  echo '</div></div>'; */
                  }
                }else
                {
                  echo '<div class="items lftime"> <div class="items_img">';
                  echo '<p>没有记录</p>';
                  echo '</div></div>';
                }
              ?>
            </ul>
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
              <p align="center" style="margin-top:10px;"> <font size="" color="#ffff00">关注微信:</font> nnswws <font size="" color="#ffff00">看信息更方便</font></p>
              <!-- <div class="go_join" ><a href="login.php" target="_blank"  class="btn">我要参加</a></div> -->
              <div class="login_name" style="text-align:center;">
              <?php
               /* if(isset($_COOKIE['user'])){
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
            <div class="part parttime">
              

              
              
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
            
            <div class="adv_list">
              <ul class="adv_ul index_list_adv">
                <?php
                if(count($tadv)>0){
                foreach ($tadv as $tadvkey => $tadv_v) {
                  $wburl=$tadv_v['kq_wburl']==''?'show-'.$tadv_v['id'].'.html':$tadv_v['kq_wburl'];
                  $wbblank=$tadv_v['kq_wburl']==''?'':"target='_blank'";
                  echo '<li><a href="'.$wburl.'" '.$wbblank.' target="_blank"><img class="lazy"  data-original="'.pic_url($tadv_v['kq_picurl'],"260x170/").'" alt=""></a></li>'; 
                }
                }
                ?>
                
                <div class="clear_float"></div>
              </ul>
            </div>
            
          </div>
        </div>
        <div class="clear_float"></div>
      </div>
      <div class="clear_float"></div>
    <!-- 底部 -->
    <?php require_once(KQ_PATH.'inc/footer.inc.php');?>

  </div>
<script>
 
  //时间倒计时
    $(".items_time").each(function(index, el) {
      var id=$(this).attr('data-id');
      var lftime=$(this).attr('data-time');
      var date= new Date(Date.parse(lftime.replace(/-/g,"/"))); //转换成Data();
      var year=date.getFullYear();
      var month=date.getMonth();
      var day=date.getDate();
      var hour=date.getHours();
      var minute=date.getMinutes();
      setInterval(function(){djtime(year,month,day,hour,minute,'#tm-'+id);}, 1000);
    });

    

    bluefoc(".key_search","输入标题关键字或信息编号");
   /* var i=0;
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

