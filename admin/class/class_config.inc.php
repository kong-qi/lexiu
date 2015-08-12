<?php
/*
*
欢迎使用空气管理系统，作者首页www.kong-qi.com
本程序本着"简单是一种艺术，无师自通"；
本程序未获得授权允许，请勿上线。
*
*/
header("Content-type: text/html; charset=utf-8"); 
$dir_name=str_replace('\\','/',dirname(__FILE__));
$admin_dir=substr($dir_name,strrpos($dir_name,'/')+1);
define('ADMIN_PATH',str_replace($admin_dir,'',$dir_name));//admin目录
define('CMS_PATH',substr(ADMIN_PATH,0,strrpos(substr(ADMIN_PATH,0,(strlen(ADMIN_PATH)-1)),'/')+1));
define('INC_PATH',ADMIN_PATH.'inc/');//inc目录
define('ACTION_PATH',ADMIN_PATH.'action/');//action目录
define('CLASS_PATH',ADMIN_PATH.'class/');//class目录
define('PICDIR',"");//图片上传使用绝对路径'http://'.$_SERVER['HTTP_HOST']
define('FUN_PATH',ADMIN_PATH.'fun/');//FUN目录
$admin_url=substr(dirname($_SERVER['PHP_SELF']),strrpos(dirname($_SERVER['PHP_SELF']),'/')+1) ;
define('ADMIN_URL','http://'.$_SERVER['HTTP_HOST'].str_replace($admin_url,'',dirname($_SERVER['PHP_SELF'])));//admin URL
require(INC_PATH."config.inc.php");
//配置信息
$conn=new DbClass(DB_HOST,DB_ROOT,DB_PWD,DB_DBNAME);
//是否开启目录生成，默认禁止
define('CLOSEDIR', '1');
//是否开启手机端编辑器
define('MOBILE_EDT', 1);
//图片设置配置中心
define('SUOLUETU','1');
$sltarray=array(
	array(
		'w'=>'260',
		'h'=>'170'
		),
	array(
		'w'=>'450',
		'h'=>'295'
		)
);
define('SUOLUTDIR', 'thumbs');

//广告是否开启栏目作为
define("ADVLANMU", 1);


date_default_timezone_set('PRC');//设置时区
$nowtime=date("Y-m-d H:i:s",time());//现在时间
$sub_pages=5;//设置子分页
$pagesize=30;//分页数


class DbClass{
	private $host;
	private $root;
	private $pwd;
	private $db;
	private $conn;
	function __construct($host,$root,$pwd,$db){
		$this->host=$host;
		$this->root=$root;
		$this->pwd=$pwd;
		$this->db=$db;
	    $this->conn();	
		}
		private function conn(){
		$this->conn=mysql_connect($this->host,$this->root,$this->pwd) or die('数据库操作不存在'.mysql_error());
		mysql_select_db($this->db) or die("数据库不存在".mysql_error());
		mysql_query("set names utf8");
		
		}
	    private function query($sql){
		return mysql_query($sql);
		}
		function result($sql_query){
		    return mysql_fetch_array($sql_query,MYSQL_ASSOC);
		}
		
	    function rows($sql_query){
		return mysql_num_rows($sql_query);	
		}
	    //查询所有语句.表，条件参数
		
	    function selectall($table,$sql){
		return $this->query("select * from $table $sql");
		}
	   //查询单个记录，带字段	
	    function selectone($table,$zd,$sql){
		return $this->query("select $zd from $table $sql");
		}
	   //查询SQL语句	
	    function selectchar($sql){
		return $this->query($sql);
		
		}	
	  //计算记录数,带查询
	    function total($table,$sql){
		return $this->query("select * from $table $sql");
		
		}
	
	  //删除记录
	    function delete($table,$sql){
		
		return $this->query("delete from $table where $sql");
		}	
	   //更新记录
	   function update($table,$zd1,$sql){
		
		return $this->query("update $table set $zd1 where $sql");
		}	
	  //插入记录
	  //插入记录
	   function insert($table,$zd1,$zd2){
		
		return $this->query("insert into $table($zd1) values($zd2)");
		}
	
        function post_insert($table,$row){
        $k = array_keys ( $row );
		$v = array_values ( $row );
		$keys = implode ( ",", $k );
		$values = implode ( "','", $v );
        return  $this->query("INSERT INTO ".$table." (".$keys.") VALUES ('".$values."')");
        
    }
        function post_update($table,$update,$where = ''){
		$sqlud="";
        foreach ($update as $key=>$value) {
           $sqlud .= $key."= '".$value."',";
        }
		if($where){
            $sql = "UPDATE ".$table." SET ".substr($sqlud, 0, -1)." WHERE ".$where;
        }else{
            $sql = "UPDATE ".$table." SET ".substr($sqlud, 0, -1);
        }	
		
		 return  $this->query($sql);
 
		}//post_update end	
		//增加字段
		function alter_column_add($table,$name,$type,$length,$value,$isindex){
			if($isindex){
			$sql="ALTER TABLE ".$table." ADD COLUMN ".$name." ".$type." (".$length.") ".$value." ,ADD INDEX(".$name.") ";
			}else{
				$sql="ALTER TABLE ".$table." ADD COLUMN ".$name." ".$type." (".$length.") ".$value."";
				}
			return $this->query($sql);
			}
			//删除字段
		function alter_column_delete($table,$name){
			$sql="ALTER TABLE ".$table." DROP COLUMN ".$name." ";
			return $this->query($sql);
			}
			
	
	}//class mysql query end
?>