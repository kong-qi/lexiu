<?php
/*
*
欢迎使用空气管理系统，作者首页www.kong-qi.com
本程序本着"简单是一种艺术，无师自通"；
本程序未获得授权允许，请勿上线。
*
*/
header("Content-type:text/html;charset=utf-8");
class Alert{
	private $str;
	private $href;
	private $type;
	
	function __construct($str,$type="",$href=""){
		$this->str=$str;
		$this->type=$type;
		$this->href=$href;
		$this->msgstr();
		}
	private function msgstr(){
			if($this->type==""){
			echo "<script language='javascript'>
		alert('".$this->str."');</script>";
			}
		
		if($this->type=="back"){
			echo "<script language='javascript'>alert('".$this->str."');history.back()</script>";
			
			}
		if($this->type=="href"){
			echo "<script language='javascript'>
		alert('".$this->str."');window.location.href='".$this->href."'</script>";
			}
			if($this->type=="close"){
			echo "<script language='javascript'>
		alert('".$this->str."');window.close();</script>";
			}

		
		}	
		
	
		
	};





?>