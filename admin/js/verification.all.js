// JavaScript Document
//权限添加验证
//切换TAB
$(".kq_li ul li").eq(0).addClass("selected");
var $div_li=$(".kq_li ul li");
$(".kq_li ul li").click(function(){
 		$(this).addClass("selected").siblings().removeClass("selected");
		 var index=$div_li.index(this);
		$(".kq_div > div").eq(index).animate({
				height: 'toggle', opacity: 'show'
 		}, 500).siblings().hide();
	
})
//单击图片弹出
$(document).on('click', '.fmpic', function(event) {
		var picurl=$(this).attr("src");
		var theImage = new Image();
		theImage.src=$(this).attr("src");
		var imageWidth = theImage.width;
		if(imageWidth>500){
			imageWidth=500;
		}
	$.layer({
		type : 1,
		title : false,
		fix : false,
		shadeClose : true,
		offset:['50px' , ''],
		area : [imageWidth,'auto'],
		page : {html :'<img src='+picurl+' width="100%" />'}
		});

})
//提示信息
$(".zhaotip").click(function(){
		var msg=$(this).attr("rel");

		layer.tips(msg, this,
			 {
			style: ['background-color:#0FA6D8; color:#fff', '#0FA6D8'],
			maxWidth:250,
			guide: 0,
			closeBtn : [0 , true]
			  });
})	
function rm(id){
			$("#"+id).remove();
	}
function Alert_msg(name,str){
			alert(str);
			$(name).focus();
	}	
//全选和取消	
function CheckAll(form){
  		for (var i=0;i<form.elements.length;i++){
			var e = form.elements[i];
			if (e.name != 'chkall')
			   e.checked = form.chkall.checked;
  		  }
}

//改变action,并且要求全选

$("input[name='sortbtn']").click(function(){
		var allchk=$("#chkall:checked").length;
		if(parseInt(allchk)>0){
		var actionname=$(this).attr("rel");
		ChangeAction(".admin_form","action/ac_sort.php?type="+actionname);}else{
		alert("排序请全选");return false;
		}
})

//改变action,并且不需要全选
$("input[name='sortbtn2']").click(function(){
			
		var actionname=$(this).attr("rel");
		ChangeAction(".admin_form","action/ac_sort.php?type="+actionname);
})

function ChangeAction(classname,actionurl){
	$(classname).attr("action",actionurl).submit();
	}


//退出确认
$(".outlogin").click(function(){

 $.layer({
		shade : [0], //不显示遮罩
		area : ['auto','auto'],
		dialog : {
			msg:'您当前确定退出吗？',
			btns : 2, 
			type : 4,
			btn : ['退出','取消'],
			yes : function(){
				window.location.href='outlogin.php';
			}
		  
		}
});


	
})//outlogin
	
  //上传图片
function updatepic(id,ylpics,list,updatepic,w,h,bili){
    var ylpicstr;
    if(ylpics){
      ylpicstr="&ylpic="+ylpics;
      }else{
        ylpicstr="";
    }
    if(list){
      list='&list='+list;
    }else{
      list='';
    }
    if(updatepic)
    {
      updatepic='&file='+updatepic;
    }else{
      updatepic='&file=up_pic';
    }
    var sizeurl='';
    if(w)
    {
      sizeurl='&size_w='+w+'&size_h='+h;
    }
    if(bili)
    {
      sizeurl+='&bili='+bili;
    }
   
    $.layer({
      type: 2,
      title: false,
      shade: [0.1,'#fff', true],
      border : [5, 0.3, '#666', true],
      area: ['450px','100px'],
      iframe: {src: 'inc/updatepic.php?pidid='+id+ylpicstr+list+updatepic+sizeurl},
      success: function(){
      }
    });

}

//判断是否删除
function is_del($str){
	if(window.confirm($str)){
        
        return true;
    }else{
        
        return false;
    }
}
$(document).on('click', ".delete", function(event) {

  if(is_del('你确定删除吗？')){
    return true;
  }else{
    return false;
  }
  
});
$(document).on('click', ".delall", function(event) {

  if(is_del('你确定删除吗？')){
    return true;
  }else{
    return false;
  }
  
});

