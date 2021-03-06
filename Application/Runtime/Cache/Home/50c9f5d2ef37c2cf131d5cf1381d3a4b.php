<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>登录页面</title>
		<meta content="target-densityDpi=device-dpi,width=device-width, initial-scale=1, maximum-scale=1.2, user-scalable=0" name="viewport" />
		<link rel="stylesheet" href="/orderDeal/Public/static/css/global.css" />
		<link rel="stylesheet" href="/orderDeal/Public/static/css/login.css" />
	</head>
	<body>
		<div class="title">登录页</div>
		<div class="loginForm">
			<div class="userIcon">
				<div class="icon">
					<!--<img src="/orderDeal/Public/static/img/logo2.png"/>-->
				</div>
			</div>
			<form>
				<div class="codeBox">
					<img src="/orderDeal/Public/static/img/code.png" />
					<input type="text" class="code" name="code" placeholder="企业编号" />
				</div>
				<div class="phoneBox">
					<img src="/orderDeal/Public/static/img/user.png" />
					<input type="text" class="phone" name="phone" placeholder="分配帐号" />
				</div>
				<div class="pwdBox">
					<img src="/orderDeal/Public/static/img/pwd.png" />
					<input type="password" class="pwd" name="pwd" placeholder="登录凭证" />
				</div>
				<div class="text">
					<input class="left" type="checkbox" id="remeber" name="remeber" />
					<label for="remeber">记住密码</label>
					<a class="right" href="#">忘记密码？</a>
				</div>
				<div class="loginBtn">
					<input type="button" value="登录"/>
				</div>
			</form>
		</div>
	</body>
	<script type="text/javascript" src="/orderDeal/Public/static/js/jquery-1.9.1.min.js" ></script>
	<script type="text/javascript" src="/orderDeal/Public/static/js/main.js" ></script>
	<script type="text/javascript" src="/orderDeal/Public/static/js/layer.js" ></script>
	<script type="text/javascript">
		function load(){
			window.location.href = '/orderDeal/Home/Index/home';
		}
		//提交
		$("input[type=button]").bind('click',function(){
			var code = $('input[name=code]').val();
			var phone = $('input[name=phone]').val();
			var pwd = $('input[name=pwd]').val();
			if(!code){
				layers('企业编号不能为空哦');
				return false;
			}
			if(!phone){
				layers('手机号不能为空哦');
				return false;
			}
			if(!pwd){
				layers('密码不能为空哦！');
				return false;
			}
			var url = '/orderDeal/Home/Login/login';
			var data = {};
			data['code'] = $('input[name=code]').val();
			data['phone'] = $('input[name=phone]').val();
			data['pwd'] = $('input[name=pwd]').val();
			$.post(url,data,function(ref){
				layers(ref.msg);
				if(ref.status == 1){
					setInterval('load()',1000);
				}
			},'json');
		})
	</script>
</html>