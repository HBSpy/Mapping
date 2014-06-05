<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>H酱の征友系统</title>

		<?php echo $this->tag->stylesheetLink('css/bootstrap.min.css'); ?>
		<?php echo $this->tag->javascriptInclude('js/jquery-1.11.0.min.js'); ?>
		<?php echo $this->tag->javascriptInclude('js/bootstrap.min.js'); ?>

		<!--[if lt IE 9]>
		<?php echo $this->tag->javascriptInclude('js/html5shiv.js'); ?>
		<?php echo $this->tag->javascriptInclude('js.respond.min.js'); ?>
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
					<li <?php if ($this->dispatcher->getControllerName() == 'info') { ?> class="active" <?php } ?>><a href="<?php echo $this->url->get('info'); ?>">个人信息</a></li>
					<li <?php if ($this->dispatcher->getActionName() == 'remark') { ?> class="active" <?php } ?>><a href="<?php echo $this->url->get('friend/remark'); ?>">好友评价</a></li>
					<li <?php if ($this->dispatcher->getControllerName() == 'form') { ?> class="active" <?php } ?>><a href="<?php echo $this->url->get('form'); ?>">问卷</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php if ($this->session->get('friend')) { ?>
					<li><a href="<?php echo $this->url->get('friend'); ?>"><?php echo $this->session->get('friend')->user; ?></a></li>
					<li><a href="<?php echo $this->url->get('friend/logout'); ?>">退出</a></li>
					<?php } else { ?>
					<li><a href="<?php echo $this->url->get('friend/login'); ?>">好友登录</a></li>
					<?php } ?>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
		</nav>

		<div class="container">
			<?php echo $this->flash->output(); ?>
			<?php echo $this->getContent(); ?>
		</div>
	</body>
</html>
