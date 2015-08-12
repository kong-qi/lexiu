
<?php
class ThumbnailPic{
    /*
    源图片路径
    缩略图高度
    缩略图宽度
    自定义保存目录
    补白
    */
    private $mSourceImg;
    private $mThumbHigeht;
    private $mThumbWidth;
    private $mCustomSaveDir;
    private $mFiller;

function __construct($thumbnailPic,$customSavaDir="",$filler=0){
    $this->mSourceImg=$thumbnailPic;
    $this->mCustomSaveDir=$customSavaDir;
    $this->mFiller=$filler;
    
}
//创建图片源
private function CreateFromImg(){

    $info=getimagesize($this->mSourceImg);     
    switch ($info[2])     
    {     
        case 1:     
            $im=imagecreatefromgif($this->mSourceImg);     
            break;     
        case 2:     
            $im=imagecreatefromjpeg($this->mSourceImg);     
            break;     
        case 3:     
            $im=imagecreatefrompng($this->mSourceImg);     
            break;     
    }     
    return $im;     


}

public  function CreateThumbsize($thumbWidth,$thumbHeight,$nodir='',$bili=0){
    $this->mThumbWidth=$thumbWidth;
    $this->mThumbHigeht=$thumbHeight;
    $temp=pathinfo($this->mSourceImg);     
    $name=$temp["basename"];//文件名     
    $dir=$temp["dirname"];//文件所在的文件夹     
    $extension=$temp["extension"];//文件扩展名     
    //$savepath="{$dir}/{$name}";//缩略图保存路径,新的文件名为*.thumb.jpg
    if($nodir)
    {
        $dirname=$dir."/";
    }else
    {
        $dirname=$dir."/".$this->mThumbWidth."x".$this->mThumbHigeht;
    }
    
    if(!is_dir($dirname)){
        mkdir($dirname);
    }     
    $savepath=$dirname."/".$name;
    //设置图片路径
    if($this->mCustomSaveDir){
        $savepath=$this->mCustomSaveDir;
        }
    
    
    //获取图片的基本信息     
    $info=getimagesize($this->mSourceImg);     
    $width=$info[0];//获取图片宽度     
    $height=$info[1];//获取图片高度     
    $per1=round($width/$height,2);//计算原图长宽比     
    $per2=round($this->mThumbWidth/$this->mThumbHigeht,2);//计算缩略图长宽比     
    
    //计算缩放比例     
    if($per1>$per2||$per1==$per2)     
    {     
        //原图长宽比大于或者等于缩略图长宽比，则按照宽度优先     
        $per=$this->mThumbWidth/$width;     
    }     
    if($per1<$per2)     
    {     
        //原图长宽比小于缩略图长宽比，则按照高度优先     
        $per=$this->mThumbHigeht/$height;     
    }
    //比例
    if($bili)
    {
        $temp_w=$thumbWidth;
        $temp_h=$thumbHeight;   
    }else
    {
        $temp_w=intval($width*$per);//计算原图缩放后的宽度     
        $temp_h=intval($height*$per);//计算原图缩放后的高度 
    }    
  
    $temp_img=imagecreatetruecolor($temp_w,$temp_h);//创建画布     
    $im=$this->CreateFromImg();     
    imagecopyresampled($temp_img,$im,0,0,0,0,$temp_w,$temp_h,$width,$height); 
   if($this->mFiller){
    if($per1>$per2)     
    {     
        imagejpeg($temp_img,$savepath, 100);     
        imagedestroy($im);     
        return $this->CreateFiller("w");     
        //宽度优先，在缩放之后高度不足的情况下补上背景     
    }     
    if($per1==$per2)     
    {     
        imagejpeg($temp_img,$savepath, 100);     
        imagedestroy($im);     
        return $savepath;     
        //等比缩放     
    }     
    if($per1<$per2)     
    {     
        imagejpeg($temp_img,$savepath, 100);     
        imagedestroy($im);     
        return $this->CreateFiller("h");       
        //高度优先，在缩放之后宽度不足的情况下补上背景     
    }     
   }//bubai end
    else{
        imagejpeg($temp_img,$savepath, 100);     
        imagedestroy($im); 
        return $savepath;  
        }
    
    
    
    
    
    
    
    
    }





//补白
private function CreateFiller($direction="w"){
    $bg=imagecreatetruecolor($this->mThumbWidth,$this->mThumbWidth);     
    $white = imagecolorallocate($bg,255,255,255);     
    imagefill($bg,0,0,$white);//填充背景     
    //获取目标图片信息     
    $info=getimagesize($this->mSourceImg);     
    $width=$info[0];//目标图片宽度     
    $height=$info[1];//目标图片高度     
    $img=$this->CreateFromImg();     
    if($direction=="wh")     
    {     
        //等比缩放     
        return $this->mSourceImg;      
    }     
    else    
    {     
        if($direction=="w")     
        {     
            $x=0;     
            $y=($this->mThumbHigeht-$height)/2;//垂直居中     
        }     
        if($fisrt=="h")     
        {     
            $x=($this->mThumbWidth-$width)/2;//水平居中     
            $y=0;     
        }     
        imagecopymerge($bg,$img,$this->mThumbWidth-$width,$this->mThumbHigeht-$height,0,0,$width,$height,100);     
        imagejpeg($bg,$src,100);     
        imagedestroy($bg);     
        imagedestroy($img);     
        return $this->mSourceImg;     
    }     
    
    
    
    
    
    
    
    
    
    
    }//CreateFiller end



}

?>