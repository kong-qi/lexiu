<?php
session_start();
require("base.inc.php");

$data=$_GET;
$data=guolv(add_slashes($data));
switch ($data['action']) {
	
	case 'ly_list':
		$page=$data['page'];
		$liuyan=get_first_date('liuyan',"where kq_newsid='".$data['id']."' and kq_checked='1' order by id desc limit ".($page-1)*$pagesize.",".$pagesize."","more");
		$total=$conn->rows($conn->selectall("".DB_EXT."liuyan","where  kq_newsid='".$data['id']."'"));
		$total=ceil($total/$pagesize);
		$str='';
		$lypic='';
		$border="";

		if(count($liuyan)>0){
			//获取用户
			foreach ($liuyan as $key => $v) {
				$user=get_first_date('user',"where id='".$v['kq_userid']."'");
				if(count($user)>0){
					$pic='<img src="'.pic_url($user['kq_picurl']).'" >';
				}else{
					$pic='';
				}
				if(isset($data['showpic']))
				{
					$lypic=' <dd><img class="img_fll lazy" src="'.pic_url($v['kq_picurl'],"260x260/").'"></dd>';
					$border='style="border:none"';
				}
				$str.= '<dl>
	              <dt>'.$pic.'</dt>
	              <dd '.$border.'><em>'.$v['kq_number'].'楼</em><b>'.$v['kq_name'].'</b><span>('.date('Y-m-d H:i:s',$v['kq_ctime']).')</span><p>'.$v['kq_content'].'</p></dd>
	             	'.$lypic.'
	              <div class="clear_float"></div>
	              </dl>';
			}
			$data2=array(
				'pages'=>$total,
				'contents'=>$str
				);
			echo json_encode($data2);
		}
		else
		{
			$data2=array(
				'pages'=>1,
				'contents'=>'没有留言记录'
				);
			echo json_encode($data2);
		}
		break;
	case "del":
		if($conn->delete("".DB_EXT."news","kq_uuid='".$data['id']."'")){
			echo "<script>alert('删除成功');window.location.href='user-list.html'</script>";
		}else{
			echo "<script>alert('删除失败');history.back()</script>";
		}
	break;
	default:
		# code...
		break;
}
?>