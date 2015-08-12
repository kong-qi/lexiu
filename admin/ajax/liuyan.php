<?php
session_start();
require_once("../class/class_config.inc.php");
require_once(FUN_PATH."global.func.inc.php");
require_once(CLASS_PATH."class_alert.inc.php");
$data=$_GET;

if($data['name']=='liuyan_list')
{
	$show=0;
	$nid='';
	$uid='';
	$qishu='';
	$title='';
	$id='';
	$ny='';
	$wherestr="where kq_search='1'";
	if(isset($data['show']))
	{
		if($data['show']==1)
		{
			$show=1;
		}elseif($data['show']==2)
		{
			$show=2;
		}
	}
	if(isset($data['newsid']))
	{
		$nid=$data['newsid'];
	}
	if(isset($data['userid']))
	{
		$uid=$data['userid'];
	}
	if(isset($data['qishu']))
	{
		$qishu=$data['qishu'];
	}
	if(isset($data['title']))
	{
		$title=$data['title'];
	}
	if(isset($data['lyid']))
	{
		$id=$data['lyid'];
	}
	if(isset($data['neirong']))
	{
		$ny=$data['neirong'];
	}
	if($show==1)
	{
		$wherestr.="and kq_checked='0'";
	}elseif($show==2)
	{
		$wherestr.="and kq_checked='1'";
	}
	if($nid)
	{
		$wherestr.="and kq_newsid='".$nid."'";
	}
	if($uid)
	{
		$wherestr.="and kq_userid='".$uid."'";
	}
	if($qishu)
	{
		$wherestr.="and kq_qishu='".$qishu."'";
	}
	if($title)
	{
		$wherestr.="and kq_title='".$title."'";
	}
	if($id)
	{
		$wherestr.="and id='".$id."'";
	}
	if($ny)
	{
		$wherestr.="and kq_content like '%".$ny."%'";
	}
	//echo $wherestr;
	
	$liuyan=array();	
	$list_sql=$conn->selectone("".DB_EXT."liuyan","*", $wherestr." order by id desc ");
	$list_total=$conn->rows($conn->selectall("".DB_EXT."liuyan", $wherestr));
	if($list_total)
	{
		
		while($list_r=$conn->result($list_sql)){
			$liuyan[]=$list_r;
		}
	}
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);
	date_default_timezone_set('Europe/London');
	date_default_timezone_set('PRC');
	if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');
	require_once '../phpexcel/PHPExcel.php';
	$objPHPExcel = new PHPExcel();
	$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
	 ->setLastModifiedBy("Maarten Balliauw")
	 ->setTitle("Office 2007 XLSX Test Document")
	 ->setSubject("Office 2007 XLSX Test Document")
	 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
	 ->setKeywords("office 2007 openxml php")
	 ->setCategory("Test result file");
	if(count($liuyan)>0)
	{
		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('A1', '编号')
		            ->setCellValue('B1', '楼层')
		            ->setCellValue('C1', '期数')
		            ->setCellValue('D1', '信息标题')
		            ->setCellValue('E1', '信息ID')
		            ->setCellValue('F1', '留言者')
		            ->setCellValue('G1', '留言ID')
		            ->setCellValue('H1', '留言内容')
		            ->setCellValue('I1', '留言时间');
		$key=2;
		foreach ($liuyan as $nkey => $value) {
			
			$objPHPExcel->setActiveSheetIndex(0)
			            ->setCellValue('A'.$key, $value['id'])
			            ->setCellValue('B'.$key, $value['kq_number'])
			            ->setCellValue('C'.$key, $value['kq_qishu'])
			            ->setCellValue('D'.$key, $value['kq_title'])
			            ->setCellValue('E'.$key, $value['kq_newsid'])
			            ->setCellValue('F'.$key, $value['kq_name'])
			            ->setCellValue('G'.$key, $value['kq_userid'])
			            ->setCellValue('H'.$key, $value['kq_content'])
			            ->setCellValue('I'.$key,  date("Y-m-d H:i:s",$value['kq_ctime']));
			$key++;
		}

	}else
	{
		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('A1', '没有数据')
		           ;
	}
	$objPHPExcel->getActiveSheet()->setTitle(date('Y年m月d日H时i分s秒').'留言导出数据');
	$objPHPExcel->setActiveSheetIndex(0);
	$datafile=date('Y-m-d H:i:s')."liuyan.xls";
	// Redirect output to a client’s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="'.$datafile.'"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');

	// If you're serving to IE over SSL, then the following may be needed
	header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header ('Pragma: public'); // HTTP/1.0

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;
}



?>