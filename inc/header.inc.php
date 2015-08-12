<?php
if (!defined("KQ_WORK")){
	 exit("非法操作");
}
?>

<div id="top">
    <div class="wm1000 top_warp">
      <div class="left_float left">
        <span class="time">
          
        </span>
      </div>
      <div class="right_float right">
        <ul>
          <li class="lll">浏览量： <span class="c_fd3"><?php echo $kq_number?></span> </li>
          <li class="qq"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php $qqstr=get_index($kq_openconfig['qq']); echo $qqstr['kq_code'] ;?>&site=qq&menu=yes" target="_blank"><span class="iconfont">&#xe60d;</span>客服QQ</a></li>
          <li class="wx"><a href="javascript:void(0)"><span class="iconfont">&#xe60b;</span>微信公众号</a><div class="wx_img">
            <img src="<?php echo pic_url($wxpic[0]);?>" alt="关注微信公众号">
          </div></li>
         <!--  <li class="hy">
         <?php
         if(isset($_COOKIE['uid']))
         {
           echo '<a href="user.html">';
         }else{
           echo '<a href="login.php">';
         }
         ?>
         <span class="iconfont">&#xe610;</span>会员中心</a>
         </li> -->
          <!-- <li class="hy">
          <?php
          if(isset($_COOKIE['uid']))
          {
            echo '<a href="user-add.html">';
          }else{
            echo '<a href="login.php">';
          }
          ?>
          <span class="iconfont">&#xe60c;</span>项目发布</a> -->
          </li>
          <li class="sc"><a href="javascript:void(0)" onclick="sc_website(this,'<?php echo $kq_name?>')"><span class="iconfont">&#xe613;</span>收藏网站</a> </li>
          <li class="jy"><a href="javascript:void(0)"><span class="iconfont">&#xe603;</span>反馈/建议</a> </li>
          <div class="clear_float">帮助中心</div>
        </ul>
      </div>
     <div class="clear_float"></div>
    </div>
  </div>
  <div id="head">
    <div class="wm1000 head_warp">
      
      <div class="nav_warp">
        <ul>
          <?php
          $navindex=get_first_date('nav',"where kq_checked='1' order by kq_sort desc,id desc limit 5",'more');
          //print_r($navindex);
          foreach ($navindex as $key => $index_v) {
            $navurl=empty_url($index_v['kq_wburl'],"index-".$index_v['kq_url'].".html");
            echo '<li><a href="'.$navurl.'" '.on_nav($navname,$index_v['kq_ename'],'1').'>'.$index_v['kq_name'].'</a></li>';
          }
          ?>
          
          <div class="clear_float"></div>
        </ul>
        <div class="clear_float"></div>
      </div>
      <div class="logo">
        <a href="/"><img src="images/logo.jpg" alt="<?php echo $kq_name?>"></a>
      </div>
      <div class="clear_float"></div>
      
    </div>
    <div class="gonggao">
      <div class="wm1000">
        <span style="float: left" >公告<em class="iconfont">&#xe604;</em>: </span>
        <div class="news_gg">

          <ul>
            <?php
            $gongaolan=get_first_date('news',"where kq_checked='1' and kq_lmid='6'  order by kq_sort desc",'more');
            if(count($gongaolan)>0)
            {
              foreach ($gongaolan as $key => $value) {
                $strurl="help-".$value['kq_lmid']."-".$value['id'].".html";
                echo '<li><a href="'.web_url($value['kq_wburl'],$strurl).'" target="_blank">'.$value['kq_title'].'</a></li>';
              }
            }
            ?>
           
          </ul>
           <div class="clear_float"></div>
        </div>
        
      </div>
        
      </div>
  </div>
