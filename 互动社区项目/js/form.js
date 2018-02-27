//首页处理函数

function openPanel(){
	$( "#mypanel" ).panel( "open" );
}
function login()
{
	//var zhanghao = encodeURIComponent($("#zhanghao").val());
	//var mima = encodeURIComponent($("#mima").val());
	var zhanghao = $("#zhanghao").val();
	var mima = $("#mima").val();	
	var site="index.php?zhanghao=" + zhanghao + "&mima="+ mima;
	location.href=site;
}
function replay(n){
	form = $("#frm"+n);
	//var bianhao = encodeURIComponent(form[0]["bianhao"].value);
	//var nicheng = encodeURIComponent(form[0]["nicheng"].value);	
	//var replay_text = form[0]["replay_text"].value;
	var replay_text = form[0]["replay_text"].value;
	var bianhao = form[0]["bianhao"].value;
	var nicheng = form[0]["nicheng"].value;	
		
	var site="replay.php?replay_text="+ encodeURIComponent(replay_text) + "&bianhao="+ bianhao;
	$.get(site, function(data){
		//document.write(data);
		if(data){
			form.before("<p><span class='blue'>"+ nicheng + "</span>："+ replay_text + "</p>");
			form[0]["replay_text"].value = "";
			form[0]["replay_text"].focus();
		}
		else{
			alert("回复失败");
		}
	});
}

//注册页

function register(){
	//$zhanghao = encodeURIComponent($("#zhanghao").val());
	//$nicheng = encodeURIComponent($("#nicheng").val());
	//$mima= encodeURIComponent($("#mima").val());
	//获取真名的值
	$zhanghao = $("#zhanghao").val();
     //获取昵称的值
	$nicheng = $("#nicheng").val();
	//获取密码的值
	$mima= $("#mima").val();	
	//将获取的值通过URL传送给reg.php
	$site="register_ok.php?zhanghao="+$zhanghao+"&nicheng="+$nicheng+"&mima="+$mima;
	location.href=$site;
}

//发布页

function say()
{
	//$who= encodeURIComponent($("#who").val());
	//$what= encodeURIComponent($("#what").val());
	$who= $("#who").val();
	$what= $("#what").val();	
	$site="say_ok.php?who="+$who+"&what="+$what;
	location.href=$site;
}