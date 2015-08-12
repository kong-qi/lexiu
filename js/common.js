function toptime()
{
	var now=new Date();
	var year=now.getFullYear();
	var month=now.getMonth();
	var day=now.getDate();
	var hours=now.getHours();
	var minutes=now.getMinutes();
	var seconds=now.getSeconds();
	var str=""+year+"年"+month+"月"+day+"日 "+hours+":"+minutes+":"+seconds+"";
	$(".time").html(str);
//一秒刷新一次显示时间
	var timeID=setTimeout(toptime,1000);
}
function djtime(year,month,day,h,f,divname) 
{ 
var now = new Date(); 
var endDate = new Date(year, month, day,h,f); 
var leftTime=endDate.getTime()-now.getTime();
if(leftTime<=0){
	$(divname).text('活动结束');
}else{
	var leftsecond = parseInt(leftTime/1000); 
	//var day1=parseInt(leftsecond/(24*60*60*6)); 
	var day1=Math.floor(leftsecond/(60*60*24)); 
	var hour=Math.floor(leftsecond/3600); 
	var hour2=Math.floor((leftsecond-day1*24*60*60)/3600); 
	var minute=Math.floor((leftsecond-day1*24*60*60-hour2*3600)/60); 
	var second=Math.floor(leftsecond-day1*24*60*60-hour2*3600-minute*60); 
	
	$(divname).text(hour+":"+minute+":"+second); 
}

} 

//收藏
function sc_website (obj, title) {
	url="http://"+window.location.host;  
    var e = window.event || arguments.callee.caller.arguments[0];  
    var B = {  
        IE : /MSIE/.test(window.navigator.userAgent) && !window.opera  
        , FF : /Firefox/.test(window.navigator.userAgent)  
        , OP : !!window.opera  
    };  
    obj.onmousedown = null;  
    if (B.IE) {  
        obj.attachEvent("onmouseup", function () {  
            try {  
                window.external.AddFavorite(url, title);  
                window.event.returnValue = false;  
            } catch (exp) {}  
        });  
    } else 
    {  
        if (B.FF || obj.nodeName.toLowerCase() == "a") {  
            obj.setAttribute("rel", "sidebar"), obj.title = title, obj.href = url;  
        } else if (B.OP) {  
            var a = document.createElement("a");  
            a.rel = "sidebar", a.title = title;  
            obj.parentNode.insertBefore(a, obj);  
            a.appendChild(obj);  
            a = null;  
        }  
	} 
}
//检查IE版本
function hasie(){
  var isIE6 = /msie 6/i.test(navigator.userAgent);
  var isIE7 = /msie 7/i.test(navigator.userAgent);
  var isIE8 = /msie 8/i.test(navigator.userAgent);
  var isIE = /msie/i.test(navigator.userAgent);
  if(isIE){
    switch(isIE){
      case isIE6:return 6;
      case isIE7:return 7;
      case isIE8:return 8;
    }
  }
}
//FOCUSE
function bluefoc(classid,keyvalue){
  $(classid).focus(function(event) {
      if($(this).val()==keyvalue){
        $(this).val("");
      }
    }).blur(function(event) {
      if($(this).val()==""){
        $(this).val(keyvalue);
      }
    });
};

//弹窗
function alert_box(html){
   
    var doc_h=$(document).height();
   
    htmlstr='';
    htmlstr+='<div class="alert_box"> <a href="javascript:void(0)" class="alert_close close_alert_btn">×</a> ';
    htmlstr+='<div class="alert_cont">';
    htmlstr+=html;
    htmlstr+='</div></div>';
    $(".alert_box").remove();
    $(".alert_bg").remove();
    $("body").append(htmlstr);
    $("body").append('<div class="alert_bg alert_close" style="height:'+doc_h+'px"></div>');
    var window_w=$(window).width();
    var window_h=$(window).height();
   
    //获取海岛的ID和房型ID
    var box_h=$(".alert_box").height();
    var box_w=$(".alert_box").width();
    //var box_top=(window_h-box_h)/2;
    detop=(window_h-box_h)/2;
    sctop=$(window).scrollTop();
    
    var box_top=(window_h-box_h)/2;
    if(hasie()==6){
         box_top=sctop+detop;
         $(".alert_box").css({
            'position': 'absolute'
         });
    }
    var box_left=(window_w-box_w)/2;

    $(".alert_box").css({
        'top': box_top+"px",
        'left':  box_left+"px"
    });
    
    $(window).scroll(function(event) {
        sctop=$(window).scrollTop();
        var box_left=(window_w-box_w)/2
        var box_top=(window_h-box_h)/2;
        if(hasie()==6){
             box_top=sctop+detop;
        }
        $(".alert_box").css({
            'top': box_top+"px",
            'left':  box_left+"px"
        });
    });
    $(".alert_close").click(function(event) {
        $(".alert_box").hide();
        $(".alert_bg").remove();
    });

}
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
    if(w!='undefined' )
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
function go_qq(){
  var A=window.open("qqconnect/oauth/index.php","TencentLogin","width=450,height=320,menubar=0,scrollbars=1, resizable=1,status=1,titlebar=0,toolbar=0,location=1"); 
}

// JavaScript Document
(function($){
  $.fn.myScroll = function(options){
  //默认配置
  var defaults = {
    speed:40,  //滚动速度,值越大速度越慢
    rowHeight:24 //每行的高度
  };
  
  var opts = $.extend({}, defaults, options),intId = [];
  
  function marquee(obj, step){
  
    obj.find("ul").animate({
      marginTop: '-=1'
    },0,function(){
        var s = Math.abs(parseInt($(this).css("margin-top")));
        if(s >= step){
          $(this).find("li").slice(0, 1).appendTo($(this));
          $(this).css("margin-top", 0);
        }
      });
    }
    
    this.each(function(i){
      var sh = opts["rowHeight"],speed = opts["speed"],_this = $(this);
      intId[i] = setInterval(function(){
        if(_this.find("ul").height()<=_this.height()){
          clearInterval(intId[i]);
        }else{
          marquee(_this, sh);
        }
      }, speed);

      _this.hover(function(){
        clearInterval(intId[i]);
      },function(){
        intId[i] = setInterval(function(){
          if(_this.find("ul").height()<=_this.height()){
            clearInterval(intId[i]);
          }else{
            marquee(_this, sh);
          }
        }, speed);
      });
    
    });

  }

})(jQuery);