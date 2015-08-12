// JavaScript Document
$(function(){
	$(".btn").click(function(){
	var name=$("input[name='username']");
	var pwd=$("input[name='password']");
	var code=$("input[name='code']");
	
	if (name.val()==""){
	checkfrom(name,"用户名不能为空");
	return false;
	}
	
	if (pwd.val()==""){
	checkfrom(pwd,"密码不能为空");
	return false;
	}
	
	if (code.val()==""){
	checkfrom(code,"验证码不能为空");
	return false;
	}else{
		if(parseInt(code.val().length)<4){
			checkfrom(code,"验证码不能小于4位");
			return false;
			}
		
		}
	
	})//btn click end
	
	})//function  jquery end
		  
function checkfrom(name,str){
	
		name.focus();
		alert(str);
		
		
	
	
	
	
	}