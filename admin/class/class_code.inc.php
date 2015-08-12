<?php
/*
*
欢迎使用空气管理系统，作者首页www.kong-qi.com
本程序本着"简单是一种艺术，无师自通"；
本程序未获得授权允许，请勿上线。
*
*/
session_start();
class code{
	private $width;
	private $height;
	private $code;
	private $codenum;
	private $img;
	private $gaorao;
    private $bg;

function __construct($width=60, $height=30, $codenum=4,$gaorao=1){

	$this->width=$width;
	$this->height=$height;
	$this->gaorao=$gaorao;
	$this->img=imagecreatetruecolor($width,$height);
	$this->codenum=$codenum;
	
	}
function createcode(){
$this->creatimg();
$this->gaorao();
$this->codeput();
$this->outimg();


	
	}
private function creatimg(){
	$bg=imagecolorallocate($this->img,220,225,225);
imagefill($this->img,0,0,$bg);

	
	
	}

private function gaorao(){
	$black=imagecolorallocate($this->img,255,225,255);
$gray = imagecolorallocate($this->img,36,36,35);
$red = imagecolorallocate($this->img,140,149,140);
	if($this->gaorao=="1"){
		for($i=0;$i<10;$i++){
imageline($this->img,0,0,rand(0,$this->width),rand(0,$this->height),$red);
 imagesetpixel($this->img,rand(0,$this->width),rand(0,$this->height),$gray);
}

		
		}
	
	
	}
	
private function codeput(){
	$codestry="";
$code="1,2,3,4,5,6,7,8,9,a,b,c,d,e,f,g,h,j,k,l,o,m,n";
$codearr=explode(",",$code);

for($i=0;$i<$this->codenum;$i++){
$codestry.=$codearr[rand(0,count($codearr)-1)];	
	
	
	}
$_SESSION['code']=$codestry;	
	$this->code= $codestry;   
	$black=imagecolorallocate($this->img,25,8,228);
	imagestring($this->img,3,10,ceil(($this->height)/2)-5,$codestry,$black);
	} 	

private function outimg(){
	
	header("Content-type:image/png");
imagepng($this->img);

	}


	}

$code=new code(60,34,4,0);
$code->createcode();



?>