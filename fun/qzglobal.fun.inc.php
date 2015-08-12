<?php
//取得的配置信息
function get_config(){
	global $conn;
	$array=array();
	$sql=$conn->selectall(DB_EXT.'config',"");
	if($conn->rows($sql)){
		while($result=$conn->result($sql)){
				$array[]=$result;
		}
	}
	return $array;
}
function get_index($id){
  global $conn;
  $array=array();
  $sql=$conn->selectall(DB_EXT.'index',"where id='".$id."'");
  if($conn->rows($sql)){
        $array=$conn->result($sql);
  }
  return $array;
}
/**
 * [update_looknum description]
 * @return [type] [description]
 */
function update_looknum($newid){
  global $conn;
 
  $news=get_first_date('news',"where id='".$newid."'");
  if(count($news)>0)
  {
      $data['kq_looknum']=$news['kq_looknum']+1;
      $conn->post_update("".DB_EXT."news",$data,"id='".$newid."'");
  }

  
}
/**
 * [update_looknum description]
 * @return [type] [description]
 */
function update_uptime($newid){
  global $conn;
 
  $news=get_first_date('news',"where id='".$newid."'");
  if(count($news)>0)
  {
      $data['kq_uptime']=time();
      $conn->post_update("".DB_EXT."news",$data,"id='".$newid."'");
  }

  
}
function get_huodong_id(){
  $array=get_first_date('lanmu',"where kq_type='adv'",'more');
  $str='';

  foreach ($array as $key => $value) {
    $str.="'".$value['id']."',";
  }

  return substr($str, 0,-1);
}
/**
 * [get_all_classid 取得所以栏目ID]
 * @param  [type] $id     [description]
 * @param  array  &$array [description]
 * @return [type]         [description]
 */
function get_all_classid($id,&$array=array()){
	global $conn;
	$array=$array;
	$sql=$conn->selectall(DB_EXT."lanmu","where kq_fid='".$id."'");
	if($conn->rows($sql)){
		while($result=$conn->result($sql)){
				get_all_classid($result['id'],$array);
					$array[]=$result['id'];
		}
	}
	return $array;
}

//删除斜杠
function  dell_slashes($data){
  foreach ($data as $key=>$value){
    if(is_array($value)){
      dell_slashes($value);
    }else{
      $data[$key]=stripslashes($value);
    }
    
   }
 return $data;
}
/**
 * [get_class_array 取得分类的数组]
 * @param  string $where [description]
 * @return [type]        [description]
 */
function get_class_array($where=''){
	global $conn;
	$classarr=array();
	if($where)
	{
		$classql=$conn->selectall("".DB_EXT."lanmu",$where);
	}else
	{	
		$classql=$conn->selectall("".DB_EXT."lanmu","where kq_islast='0'");
	}
	
	while($class_r=$conn->result($classql)){
		$classarr[]=array($class_r['id'],$class_r['kq_fid'],$class_r['kq_name']);
	}
	return $classarr;
}
function get_class_array2($where=''){
	global $conn;
	$classarr=array();
	
		$classql=$conn->selectall("".DB_EXT."lanmu",$where);
	
	
	while($class_r=$conn->result($classql)){
		$classarr[]=array($class_r['id'],$class_r['kq_fid'],$class_r['kq_name']);
	}
	return $classarr;
} 
/**
 * [get_tree_class 输出树状]
 * @param  integer $fid   [description]
 * @param  integer $num   [description]
 * @param  [type]  $array [description]
 * @param  string  $bid   [description]
 * @return [type]         [description]
 */
function get_tree_class($fid=0,$num=0,$array,$bid=''){
	  for($i=0;$i<count($array);$i++){        
	   if($array[$i][1]==$fid){
	   	if($bid==$array[$i][0]){
			echo "<option value=".$array[$i][0]." selected='selected'>";
	   	}else{
	   		echo "<option value=".$array[$i][0].">";
	   	}       
	    echo str_repeat("&nbsp;&nbsp;", $num)."|-".$array[$i][2]."</option>";   
	    get_tree_class($array[$i][0],$num+2,$array);   
	   }  
	  }  
	 

}
/**
 * 
 * @param type $table 
 * @param type $wherestr 
 * @param type $type 
 * @return type
 */
function get_first_date($table,$wherestr,$type='one'){
  global $conn;
  $array=array();
  $nwodate=time();
  $sql=$conn->selectall(DB_EXT.$table,$wherestr);
  switch ($type) {
    case 'one':
        while($result=$conn->result($sql)){
            $array=$result;
        }
      break;
    case 'more':
        if($conn->rows($sql)){
          while($result=$conn->result($sql)){
              $array[]=$result;
          }
        }
      break;
    
    default:
      # code...
      break;
  }
  
  return $array;
}
//加斜杠注入类
function  add_slashes($data){
   foreach ($data as $key=>$value)
   {
      if(is_array($value)){
        add_slashes($value);
      }else{
          if(!get_magic_quotes_gpc())
          {
            $data[$key]=addslashes($value);
          }else{
            $data[$key]=$value;
          }
      }
      
       
   }
return $data;
}
/**
 * [uhtml d过滤非法字符正则]
 * @param  [type] $str [description]
 * @return [type]      [description]
 */
function uhtml($str)     
{     
    $farr = array(     
        "/\s+/", //过滤多余空白     
         //过滤 <script>等可能引入恶意内容或恶意改变显示布局的代码,如果不需要插入flash等,还可以加入<object>的过滤     
        "/<(\/?)(script|i?frame|style|html|body|title|link|meta|\?|\%)([^>]*?)>/isU",    
        "/(<[^>]*)on[a-zA-Z]+\s*=([^>]*>)/isU",//过滤javascript的on事件     
   );     
   $tarr = array(     
        " ",     
        "\1\2\3",//如果要直接清除不安全的标签，这里可以留空     
        "\1\2",     
   );     
  $str = preg_replace( $farr,$tarr,$str);     
   return $str;     
}
/**
 * [guolv 前端过滤非法字符]
 * @param  [type] $data [description]
 * @return [type]       [description]
 */
function guolv($data){
  foreach ($data as $key => $value) {
    if(is_array($value)){
      guolv($value);
    }else{
         $data[$key]=uhtml($value);
    }
    
  }
  return $data;

}
/**
 * [pic_url 图片URL]
 * @param  [type] $str [description]
 * @return [type]      [description]
 */
function pic_url($str,$size=""){
	
	if($str){
		if(strstr($str,"http://") or strstr($str,"HTTP://")){
		    $picurl=$str;	   
		}else{
		    $picurl=KQ_URL."updatefile/".SUOLUTDIR."/".$size.$str;
		}
	}else{
		$picurl='images/nopic.gif';
	}
	
	return $picurl;
}
/**
 * [http_url HTTP修改]
 * @param  [type] $url [description]
 * @return [type]      [description]
 */
function http_url($url){
	$url=str_replace("http://", "", $url);
	$url=str_replace("HTTP://", "", $url);
	return "http://".$url;
}
/**
 * [empty_url 是否空连接]
 * @param  [type] $url [description]
 * @return [type]      [description]
 */
function empty_url($url,$str="javascript:void(0)"){
	if($url){
		return $url;
	}else{
		return $str;
	}
}
function on_nav($str,$wherestr,$type=""){
  if($type){
    if($str==$wherestr){
      return 'class="on"';

    }else{
      return '';
    }
  }else{
    if($str==$wherestr){
      echo 'class="on"';

    }else{
      echo '';
    }
  }
 

}

function echo_option($str,$array){
	echo $array[$str];
}
function echo_check($str,$num,$type='ck'){
	if($str==$num){
		if($type=='ck'){
			echo 'checked="checked"';
		}else{
			echo 'selected="selected"';
		}
	}
}

/**
 * [has_date ]
 * @param  是否存在数据  $table    [description]
 * @param  [type]  $wherestr [description]
 * @return boolean           [description]
 */
function has_date($table,$wherestr){
	global $conn;
	$array=array();
	$nwodate=time();
	$sql=$conn->selectall(DB_EXT.$table,$wherestr);
	if($conn->rows($sql)){
		return true;
	}else{
		return false;
	}
}
/**
 * [close_web 关闭站点]
 * @param  [type] $close [description]
 * @return [type]        [description]
 */
function close_web($close){
	
	if($close){
		
		return exit_err('站点暂时关闭中，如果有疑问请联系站长!');
		
		}else{
			return false;
			}
	  
	
	}
/**
 * [close_ip IP被禁用]
 * @param  [type] $ip      [description]
 * @param  [type] $iparray [description]
 * @return [type]          [description]
 */
function close_ip($ip,$iparray){
	if (in_array($ip,$iparray)){
		return	exit_err('非常抱歉，你的IP被网站管理员禁止了。');
		exit();
		}else{
			return false;
			}
	
	
	}
function exit_err($str){
		return '<div class="web_close"><h1>'.$str.'</h1></div>';
}




//取得单个广告 $type=广告类型，$position广告位置，ID为广告ID
	
function get_one_adv($position,$type,$id=""){
	global $conn;
	$strid=empty($id)?'':"and a_id='".$id."'";
	$sql=$conn->selectone("".DB_EXT."adv","*","where kq_type='".$type."' and kq_position='".$position."' ".$strid." limit 1  ");
	$result=$conn->result($sql);
	if($type==1){
		if($result['a_url'] && $result['kq_url']!="#"){
				return '<a href="http://'.str_replace("http://","",$result['kq_url']).'" target="_blank" ><img src="'.$result['kq_picurl'].'" alt="'.$result['kq_title'].'" /></a>';
			}else{
				return '<img src="'.$result['kq_picurl'].'" alt="'.$result['kq_name'].'" />';
			}
		
		}else{
			return $result['kq_code'];
			
			}
	
	
	}


//生成唯一UUID
function uuid(){
	return md5(uniqid(rand(),true).rand(1,time()));
	
	}
	
//防注查询SQL
function setdefensesql($str){
               $str = str_replace("and","",$str);
               $str = str_replace("execute","",$str);
               $str = str_replace("update","",$str);
               $str = str_replace("count","",$str);
               $str = str_replace("chr","",$str);
               $str = str_replace("mid","",$str);
               $str = str_replace("master","",$str);
               $str = str_replace("truncate","",$str);
               $str = str_replace("char","",$str);
               $str = str_replace("declare","",$str);
               $str = str_replace("select","",$str);
               $str = str_replace("create","",$str);
               $str = str_replace("delete","",$str);
               $str = str_replace("insert","",$str);
               $str = str_replace("or","",$str);
               $str = str_replace("=",'',$str);
               $str = str_replace("\'","",$str);
			   $str = str_replace("\"","",$str);
				$str = str_replace("#","",$str);
				$str = str_replace("<script>","",$str);
              

       return $str;
}	
	
	
/**
 * 分页类
 */
class SubPages{ 
     
  private  $each_disNums;//每页显示的条目数 
  private  $nums;//总条目数 
  private  $current_page;//当前被选中的页 
  private  $sub_pages;//每次显示的页数 
  private  $pageNums;//总页数 
  private  $page_array = array();//用来构造分页的数组 
  private  $subPage_link;//每个分页的链接 
  private  $subPage_type;//显示分页的类型
  private  $htmlurl; 
   /*
   __construct是SubPages的构造函数，用来在创建类的时候自动运行.
   @$each_disNums   每页显示的条目数
   @nums     总条目数
   @current_num     当前被选中的页
   @sub_pages       每次显示的页数
   @subPage_link    每个分页的链接
   @subPage_type    显示分页的类型
    
   当@subPage_type=1的时候为普通分页模式
         example：   共4523条记录,每页显示10条,当前第1/453页 [首页] [上页] [下页] [尾页]
         当@subPage_type=2的时候为经典分页样式
         example：   当前第1/453页 [首页] [上页] 1 2 3 4 5 6 7 8 9 10 [下页] [尾页]
   */ 
  function __construct($each_disNums,$nums,$current_page,$sub_pages,$subPage_link,$subPage_type,$htmlurl=""){ 
   $this->each_disNums=intval($each_disNums); 
   $this->nums=intval($nums); 
    if(!$current_page){ 
    $this->current_page=1; 
    }else{ 
    $this->current_page=intval($current_page); 
    } 
	$this->htmlurl=$htmlurl;
   $this->sub_pages=intval($sub_pages); 
   $this->pageNums=ceil($nums/$each_disNums); 
   $this->subPage_link=$subPage_link;  
   $this->show_SubPages($subPage_type);  
   //echo $this->pageNums."--".$this->sub_pages; 
  } 
     
     
  /*
    __destruct析构函数，当类不在使用的时候调用，该函数用来释放资源。
   */ 
  function __destruct(){ 
    unset($each_disNums); 
    unset($nums); 
    unset($current_page); 
    unset($sub_pages); 
    unset($pageNums); 
    unset($page_array); 
    unset($subPage_link); 
    unset($subPage_type); 
   } 
     
  /*
    show_SubPages函数用在构造函数里面。而且用来判断显示什么样子的分页  
   */ 
  function show_SubPages($subPage_type){ 
    if($subPage_type == 1){ 
    $this->subPageCss1(); 
    }elseif ($subPage_type == 2){ 
    $this->subPageCss2(); 
    }elseif ($subPage_type == 3){ 
    $this->subPageCss3(); 
    }  
   } 
     
     
  /*
    用来给建立分页的数组初始化的函数。
   */ 
  function initArray(){ 
    for($i=0;$i<$this->sub_pages;$i++){ 
    $this->page_array[$i]=$i; 
    } 
    return $this->page_array; 
   } 
     
     
  /*
    construct_num_Page该函数使用来构造显示的条目
    即使：[1][2][3][4][5][6][7][8][9][10]
   */ 
  function construct_num_Page(){ 
    if($this->pageNums < $this->sub_pages){ 
    $current_array=array(); 
     for($i=0;$i<$this->pageNums;$i++){  
     $current_array[$i]=$i+1; 
     } 
    }else{ 
    $current_array=$this->initArray(); 
     if($this->current_page <= 3){ 
      for($i=0;$i<count($current_array);$i++){ 
      $current_array[$i]=$i+1; 
      } 
     }elseif ($this->current_page <= $this->pageNums && $this->current_page > $this->pageNums - $this->sub_pages + 1 ){ 
      for($i=0;$i<count($current_array);$i++){ 
      $current_array[$i]=($this->pageNums)-($this->sub_pages)+1+$i; 
      } 
     }else{ 
      for($i=0;$i<count($current_array);$i++){ 
      $current_array[$i]=$this->current_page-2+$i; 
      } 
     } 
    } 
      
    return $current_array; 
   } 
     
  /*
   构造普通模式的分页
   共4523条记录,每页显示10条,当前第1/453页 [首页] [上页] [下页] [尾页]
   */ 
  function subPageCss1(){ 
   $subPageCss1Str=""; 
   $subPageCss1Str.="共".$this->nums."条记录，"; 
   $subPageCss1Str.="每页显示".$this->each_disNums."条，"; 
   $subPageCss1Str.="当前第".$this->current_page."/".$this->pageNums."页 "; 
    if($this->current_page > 1){ 
    $firstPageUrl=$this->subPage_link."1"; 
    $prewPageUrl=$this->subPage_link.($this->current_page-1); 
    $subPageCss1Str.="[<a href='$firstPageUrl'>首页</a>] "; 
    $subPageCss1Str.="[<a href='$prewPageUrl'>上一页</a>] "; 
    }else { 
    $subPageCss1Str.="[首页] "; 
    $subPageCss1Str.="[上一页] "; 
    } 
      
    if($this->current_page < $this->pageNums){ 
    $lastPageUrl=$this->subPage_link.$this->pageNums; 
    $nextPageUrl=$this->subPage_link.($this->current_page+1); 
    $subPageCss1Str.=" [<a href='$nextPageUrl'>下一页</a>] "; 
    $subPageCss1Str.="[<a href='$lastPageUrl'>尾页</a>] "; 
    }else { 
    $subPageCss1Str.="[下一页] "; 
    $subPageCss1Str.="[尾页] "; 
    } 
      
    echo $subPageCss1Str; 
      
   } 
     
     
  /*
   构造经典模式的分页
   当前第1/453页 [首页] [上页] 1 2 3 4 5 6 7 8 9 10 [下页] [尾页]
   */ 
  function subPageCss2(){ 
   $subPageCss2Str=""; 
 //  $subPageCss2Str.="一共有<b>".$this->nums."</b>条 每页<b>".$this->each_disNums."</b>条记录&nbsp;<b>".$this->current_page."/".$this->pageNums."</b>页 "; 
   $subPageCss2Str.="当前第".$this->current_page."/".$this->pageNums."</b>页 "; 
    
      
    if($this->current_page > 1){ 
    $firstPageUrl=$this->subPage_link."1".$this->htmlurl; 
    $prewPageUrl=$this->subPage_link.($this->current_page-1)."$this->htmlurl"; 
    $subPageCss2Str.="<a href='$firstPageUrl'>首页</a>"; 
    $subPageCss2Str.="<a href='$prewPageUrl'>上一页</a> "; 
    }else { 

    } 
      
   $a=$this->construct_num_Page(); 
    for($i=0;$i<count($a);$i++){ 
    $s=$a[$i]; 
     if($s == $this->current_page ){ 
     $subPageCss2Str.="<a  class='curr' >".$s."</a>"; 
     }else{ 
     $url=$this->subPage_link.$s.$this->htmlurl; 
     $subPageCss2Str.="<a href='$url'>".$s."</a>"; 
     } 
    } 
      
    if($this->current_page < $this->pageNums){ 
    $lastPageUrl=$this->subPage_link.$this->pageNums.$this->htmlurl; 
    $nextPageUrl=$this->subPage_link.($this->current_page+1).$this->htmlurl; 
    $subPageCss2Str.=" <a href='$nextPageUrl'>下一页</a> "; 
    $subPageCss2Str.="<a href='$lastPageUrl'>尾页</a> "; 
    }else { 

    } 
    echo $subPageCss2Str; 
   }
    function subPageCss3(){ 
     $subPageCss2Str=""; 
   //  $subPageCss2Str.="一共有<b>".$this->nums."</b>条 每页<b>".$this->each_disNums."</b>条记录&nbsp;<b>".$this->current_page."/".$this->pageNums."</b>页 "; 
     
      
        
      if($this->current_page > 1){ 
      $firstPageUrl=$this->subPage_link."1".$this->htmlurl; 
      $prewPageUrl=$this->subPage_link.($this->current_page-1)."$this->htmlurl"; 
      $subPageCss2Str.="<li><a href='$firstPageUrl'><<</a></li>"; 
      $subPageCss2Str.="<li><a href='$prewPageUrl'><</a></li>"; 
      }else { 

      } 
        
     $a=$this->construct_num_Page(); 
      for($i=0;$i<count($a);$i++){ 
      $s=$a[$i]; 
       if($s == $this->current_page ){ 
       $subPageCss2Str.="<li><a  class='curr' >".$s."</a></li>"; 
       }else{ 
       $url=$this->subPage_link.$s.$this->htmlurl; 
       $subPageCss2Str.="<li><a href='$url'>".$s."</a></li>"; 
       } 
      } 
        
      if($this->current_page < $this->pageNums){ 
      $lastPageUrl=$this->subPage_link.$this->pageNums.$this->htmlurl; 
      $nextPageUrl=$this->subPage_link.($this->current_page+1).$this->htmlurl; 
      $subPageCss2Str.=" <li><a href='$nextPageUrl'>></a> </li>"; 
      $subPageCss2Str.="<li><a href='$lastPageUrl'>>></a> </li>"; 
      }else { 

      } 
      echo $subPageCss2Str; 
     }  
} 
/**
 * [Strsub 截取数据]
 * @param [type]  $string [description]
 * @param [type]  $sublen [description]
 * @param integer $start  [description]
 * @param string  $code   [description]
 */
function Strsub($string, $sublen, $start = 0, $code = 'UTF-8')
{
    if($code == 'UTF-8')
    {
        $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
        preg_match_all($pa, $string, $t_string);

        if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen));
        return join('', array_slice($t_string[0], $start, $sublen));
    }
    else
    {
        $start = $start*2;
        $sublen = $sublen*2;
        $strlen = strlen($string);
        $tmpstr = '';

        for($i=0; $i< $strlen; $i++)
        {
            if($i>=$start && $i< ($start+$sublen))
            {
                if(ord(substr($string, $i, 1))>129)
                {
                    $tmpstr.= substr($string, $i, 2);
                }
                else
                {
                    $tmpstr.= substr($string, $i, 1);
                }
            }
            if(ord(substr($string, $i, 1))>129) $i++;
        }
        if(strlen($tmpstr)< $strlen ) $tmpstr.= "";
        return $tmpstr;
    }
}

/*
*功能：php多种方式完美实现下载远程图片保存到本地
*参数：文件url,保存文件名称，使用的下载方式
*当保存文件名称为空时则使用远程文件原来的名称
*/
function getImage($url,$filename='',$type=0){

    if($url==''){return false;}
    if($filename==''){
        $ext=strrchr($url,'.');
        if($ext!='.gif' && $ext!='.jpg'){return false;}
        $filename=time().$ext;
    }
    //文件保存路径 
  if($type){
    $ch=curl_init();
    $timeout=5;
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
    $img=curl_exec($ch);
    curl_close($ch);
  }else{
     ob_start(); 
     readfile($url);
     $img=ob_get_contents(); 
     ob_end_clean(); 
  }
  $size=strlen($img);
    //文件大小 
  $fp2=@fopen($filename,'a');
  fwrite($fp2,$img);
  fclose($fp2);
  return $filename;
}
function GrabImage($url,$dir='updatefile/',$filename="") { 
  global $sltarray;
  if($url=="") return false; 

    if($filename=="") { 
    $ext=strrchr($url,"."); 
    if($ext!=".gif" && $ext!=".jpg" && $ext!=".png") return false; 
    $filename=date("YmdHis").$ext; 
    } 

  ob_start(); 
  readfile($url); 
  $img = ob_get_contents(); 
  ob_end_clean(); 
  $size = strlen($img); 

  $file_path=KQ_PATH.$dir.SUOLUTDIR."/".$filename;

  $fp2=@fopen($file_path, "a"); 
  fwrite($fp2,$img); 
  fclose($fp2); 

  $thumbs=new ThumbnailPic($file_path);
  foreach ($sltarray as $key => $sltvalue) {
    $thumbs->CreateThumbsize($sltvalue['w'],$sltvalue['h']);
  }
  return $filename; 
}
/**
 * [is_login 是否登陆监测]
 * @param  [type]  $uid   [description]
 * @param  string  $only  [description]
 * @param  integer $false [description]
 * @return boolean        [description]
 */
function is_login($uid,$only='1',$false=1){
  $user=get_first_date('user',"where kq_uniqueid='".$uid."'");
  if(count($user)>0)
  {
    if($only)
    {
      return $user;
    }else{
      return true;
    }
    
  }
  else
  {
    if($false)
    {
      echo "<script>alert('请登陆后操作');window.location.href='/';</script>";
      exit();
    }else{
      return false;
    }
    
  }
}

/**
 * [update 更新站点]
 * @return [type] [description]
 */
function update(){
  global $conn;
  global $kq_number;
  $data['kq_number']=$kq_number+1;
  $conn->post_update("".DB_EXT."config",$data,"kq_basename='kongqi'");



}
/**
 * [web_url 判断是否第一个为空，如果是返回第二个]
 * @param  [type] $url    [description]
 * @param  [type] $strurl [description]
 * @return [type]         [description]
 */
function web_url($url,$strurl){
  if($url){
    return $url;
  }else{
    return $strurl;
  }
}


?>