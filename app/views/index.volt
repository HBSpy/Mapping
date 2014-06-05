<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>H酱の征友系统</title>

		{{ stylesheet_link('css/bootstrap.min.css') }}
		{{ javascript_include('js/jquery-1.11.0.min.js') }}
		{{ javascript_include('js/bootstrap.min.js') }}

		<!--[if lt IE 9]>
		{{ javascript_include('js/html5shiv.js') }}
		{{ javascript_include('js.respond.min.js') }}
		<![endif]-->
	</head>
	<body>
		<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Mapping</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li {% if dispatcher.getControllerName() == 'info' %} class="active" {% endif %}><a href="{{ url('info') }}">个人信息</a></li>
					<li {% if dispatcher.getActionName() == 'remark' %} class="active" {% endif %}><a href="{{ url('friend/remark') }}">好友评价</a></li>
					<li {% if dispatcher.getControllerName() == 'form' %} class="active" {% endif %}><a href="{{ url('form') }}">问卷</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					{% if session.get('friend') %}
					<li><a href="{{ url('friend') }}">{{ session.get('friend').user }}</a></li>
					<li><a href="{{ url('friend/logout') }}">退出</a></li>
					{% else %}
					<li><a href="{{ url('friend/login') }}">好友登录</a></li>
					{% endif %}
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
		</nav>

		<div class="container">
			{{ flash.output() }}
			{{ content() }}
		</div>
	</body>
</html>
