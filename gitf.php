<?php
define("KQ_WORK",true);
require_once("inc/base.inc.php");

$id='';
if(isset($_GET['id'])){
  $id=setdefensesql($_GET['id']);
}

//获取好礼相送的目录

$giflanm=get_first_date('lanmu',"where kq_type='gitf' order by id desc");
if($id)
{
  $show_r=get_first_date('news',"where id='".$id."'  ");
}else
{
  $show_r=get_first_date('news',"where kq_lmid='".$giflanm['id']."' and kq_checked='1'  order by id asc ");
}

$list_r=get_first_date('news',"where kq_lmid='".$giflanm['id']."' and kq_checked='1'  and  id <>'".$show_r['id']."' order by id desc  ","more");
$navname="gift";
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
<body class="gitbody">
<?php require_once(KQ_PATH.'inc/state.inc.php');?>
  <div class="warp ">
    <!-- 头部 -->
    <?php require_once(KQ_PATH.'inc/header.inc.php');?>

    <!-- 中间内容 -->
    <div>
    <div class="part_bg">
      <div class="part part1 ">
        <div class="wm800">
        <div class="gitf_warp">
          <div class="title">
            <h3>第【<?php echo $show_r['kq_qishu']?>】期</h3>
            <div class="endtime">
              <p>距离结束还有</p>
              <p class="endtimeshow" data-time="<?php echo date("Y-m-d H:i:s",$show_r['kq_endtime'])?>">
                
              </p>
            </div>
          </div><!-- title -->
          <div class="h1">
           <img src="images/giftitle.png" alt="">
          </div>
          <?php
            if($show_r['kq_zhongjiang']){
          ?>
          <div class="zhongjiang">
           
            <div class="marqueezj" >
              <p id="scrollobj" style="width:1000px"><?php echo $show_r['kq_zhongjiang']?></p>
            </div>
            <div class="clear_float"></div>
          </div>
        
          <?php
          }
          ?>
          
         
          <div class="gifmsg">
         
           <dl>
             <dd><h3>本期赠送数量：<?php echo $show_r['kq_number']?></h3></dd>
             <dd><img src="<?php echo pic_url($show_r['kq_picurl'])?>" alt=""></dd>
             <dd><h4> <?php echo $show_r['kq_title']?></h4></dd>
           </dl>

          </div>
          <div class="zhanzu">
            <h2>赞助商</h2>
            <div class="msg">
                <?php
                  echo $show_r['kq_zhanzu'];
                ?>
            </div>
            <div class="msgpic">
              <ul>
                <?php
                $picurl=json_decode($show_r['kq_zhanzupic'],true);
                
                if(count($picurl)>0)
                {


                foreach ($picurl as $key => $value) {
                  echo ' <li><a href="'.urldecode($value['url']).'" target="_blank"><img class="lazy" data-original="'.pic_url($value['path']).'" alt=""></a></li>';
                }
                }
                ?>
                <div class="clear_float"></div>
              </ul>
            </div>
          </div>

        </div><!-- gitf_warp -->
        </div>
      </div><!-- part -->
    </div>
      <div class="part part2">
        <div class="wm800">
          <div class="guize">
            <h3 class="h3">本期赠送礼品规则</h3>
            <div class="msg">
              <?php
                if($show_r['kq_guize'])
                {
                  echo $show_r['kq_guize'];
                }else
                {
                  $guize=get_index(6);
                  echo $guize['kq_content'];
                }
              ?>
             
            </div>
            <div class="balog">
              <dl>
                <dd>
                  <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
                  <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"24"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                </dd>
                <dd>
                  <?php
                    if(isset($_COOKIE['user'])){
                      $username=is_login($_COOKIE['uid']);
                      if($username){
                        echo '欢迎<span><a href="user.html">'.$username['kq_name'].'</a></span>';
                      }else{
                         echo '<a href="login.php" target="_blank"  ><img src="images/Connect_logo_4.png" alt=""></a>';
                      }
                    }else{
                      echo '<a href="login.php" target="_blank"  ><img src="images/Connect_logo_4.png" alt=""></a>';
                    }
                  ?>
                
                </dd>
                <dd>
                  <div class="wxpic">
                    <?php
                      echo "<img src='".pic_url($wxpic[0])."' alt='关注微信' />";
                    ?>
                    扫一扫 加微信公众号
                    可以快捷登录网站，下次浏览更方便
                  </div>
                </dd>
                <div class="clear_float"></div>
              </dl>
                 <div class="clear_float"></div>
            </div>
          </div>
        </div>
      </div>
      <?php
      if(count($list_r)>0){
      ?>
      <div class="part part3">
        <div class="wm800">
          <h2>往期活动</h2>
          <div class="over">
            <div class="box">
            <ul class="over_ul" >
              <?php
                foreach ($list_r as $ltkey => $lt_r) {
                  if($lt_r['id']!=$show_r['id'])
                  {
                    echo '
                      <li><a href="git-'.$lt_r['id'].'.html">
                          <img class="lazy"  data-original="'.pic_url($lt_r['kq_picurl']).'" alt="">
                          <p>【'.$lt_r['kq_qishu'].'期】'.$lt_r['kq_title'].'</p>
                        </a>
                      </li>
                    ';
                  }
                  
                }
              ?>
              <div class="clear_float"></div>
            </ul>
            </div>
            <div class="clear_float"></div>
            <div class="subli">
              <a href="javascript:void(0)" class="next">下一期</a>
              <a href="javascript:void(0)" class="prev">上一期</a>
            </div>
          </div>
        </div>
      </div>
      <?php
      }
      ?>

      <div class="part part4">
        <div class="wm800">
            <div class="msg_linyan">
            <div class="liuyan">
              <h3>留言信息</h3>
              <?php
                
                if(($show_r['kq_endtime']>time())>0)
                {
                ?>
              <div class="add_liuyan">
                <textarea name="kq_content" cols="70" rows="5" class="textArea" id="kq_content"></textarea>
                <p id="ylpic"></p>
                
                <p>
                  <?php
                  if(!is_login(@$_COOKIE['uid'],0,0)){
                    echo ' <b>还没登录不能留言</b><a href="login.php" target="_blank"> 立即登录</a>';
                  }else
                  {
                    echo '<p class="mb-10 ">
                  <input name="kq_picurl" size="40" class="inpMain" id="kq_picurl" type="hidden">
                  <input name="submit" class="btn" onclick="updatepic(\'kq_picurl\',\'ylpic\')" value="上传图片" type="button">
                </p>';
                    echo ' <input name="submit" class="btn go_liuyan" value="留言" type="submit">';
                  }
                  ?>
                </p>
                
              </div>
              <?php
               }
              ?>
               <div class="line"></div>
              <div class="ad_ly_list">
                
              </div><!-- ad_ly_list -->
              <div id="ly_list_page">
                
              </div>
            </div>
            </div>
        </div>
      </div>
   

    <?php echo $kq_tongji?>
    <script>
       toptime(".time");
      $(".wx").hover(function() {
        $(this).find('.wx_img').stop().fadeIn();
      }, function() {
        $(this).find('.wx_img').stop().fadeOut();
      });
      $(document).on('click', '.jy', function(event) {
        alert_box('<div class="jianyi"> <table class="tableBasic" border="0" cellpadding="8" cellspacing="0" width="100%"> <tr> <td>建议主题</td> <td><input name="title" size="40" class="inpMain" id="kq_title" type="text"></td> </tr> <tr> <td>内容</td> <td><textarea name="content" cols="70" rows="5" class="textArea" id="kq_description"></textarea></td> </tr> <tr> <td colspan="2" align="center"><input name="submit" class="btn jianyibtn" value="提交" type="submit"></td> </tr> </table> </div>');
        $(document).on('click', '.jianyibtn', function(event) {
          var title=$("#kq_title").val();
          var content=$("#kq_description").val();
          $.post('inc/action.php',{action:'ly_add',kq_title:title,kq_content:content},function(data){
            
            if(data){
              
              $(".alert_box").hide();
              $(".alert_bg").remove();
              alert('反馈成功');
              
            
            }else{
              alert('反馈失败，再试一次');
            }
          });

        });
      });
      $(".user_sroll").kxbdMarquee({
        direction:'up'
      });
      $(".news_gg").kxbdMarquee({
        direction:'left'
      });
      $(document).ready(function($){
        $(".lazy").show().lazyload({
          effect : "show"
        });
        $(".index_list_adv img").show().lazyload({
          effect : "show"
        });
      });
      
    </script>
    <?php
    update();
    ?>
  </div>

<script src="js/gonglue.js"></script>
 <script language="javascript" src="layer/layer.min.js"></script>
<script>
//中奖滚动
<?php
     if($show_r['kq_zhongjiang']){
?>
var i=480;
function zj_roll()
{
  $zlfetsize=$("#scrollobj").width();
  i--;
  if(i==-$zlfetsize)
  {
    i=380;
  }
  $("#scrollobj").css('left', i);

}
;
zjroo=setInterval('zj_roll()',10);
$("#scrollobj").hover(function() {
  window.clearInterval(zjroo);
}, function() {
 zjroo=setInterval('zj_roll()',10);
});
<?php
}
?>
<?php
      if(count($list_r)>0){
      ?>
$(".over").roll({
  'subbox':'.over_ul',
  'findtype':'children',
  'subclass':'li',
  'slide':false,
 
  'leftsize':10,
  'pageli':1
});
<?php
}
?>
  //时间倒计时
      var lftime=$('.endtimeshow').attr('data-time');
      var date= new Date(Date.parse(lftime.replace(/-/g,"/"))); //转换成Data();
      var year=date.getFullYear();
      var month=date.getMonth();
      var day=date.getDate();
      var hour=date.getHours();
      var minute=date.getMinutes();
      setInterval(function(){djtime(year,month,day,hour,minute,'.endtimeshow');}, 1000);


</script>
<script>
id="<?php echo $show_r['id']?>";
qishu="<?php echo $show_r['kq_qishu']?>";
 $.getJSON('inc/action_get.php', {id:'13',page:1,action:"ly_list",showpic:1 }, function(res){ //从第6页开始请求。返回的json格式可以任意定义
     laypage({
         cont: 'ly_list_page', //容器。值支持id名、原生dom对象，jquery对象。【如该容器为】：<div id="page1"></div>
         pages: res.pages, //通过后台拿到的总页数
         curr: 1, //初始化当前页
         jump: function(e){ //触发分页后的回调
             $.getJSON('inc/action_get.php', {page: e.curr,id:id,action:"ly_list",showpic:1 }, function(res){
                 e.pages = e.last = res.pages; //重新获取总页数，一般不用写
                 //渲染
                 var view = $(".ad_ly_list"); //你也可以直接使用jquery
                  view.html(res.contents); 
             });
         }
     });
 });
 <?php

       if(($show_r['kq_endtime']>time())>0)
       {
   ?>
$(document).on('click', '.go_liuyan', function(event) {
  var content=$("#kq_content").val();
  var pic=$("#kq_picurl").val();
  var title="<?php echo $show_r['kq_title']?>";
  if(content=='')
  {
	alert('留言内容不能为空');
	return false;
  }
  $.ajax({
      'url': 'inc/action.php',
      type:'POST',
      data:{action:"liuyan_add",kq_title:title,kq_newsid:id,kq_content:content,kq_picurl:pic,kq_qishu:qishu},
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

});

<?php

 }
?>
  
</script>
</body>
</html>

