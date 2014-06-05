<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default" id="panel">
			<div class="panel-heading">
				<h3 id="message" class="panel-title">好友登录</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="login" role="form">
					<div class="form-group">
						<label for="inputUser" class="col-sm-2 control-label">昵称</label>
						<div class="col-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
								<input type="text" name="user" class="form-control" id="inputUser" required="required">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPass" class="col-sm-2 control-label">密码</label>
						<div class="col-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
								<input type="password" name="pass" class="form-control" id="inputPass" required="required">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">登录</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(function (){
		$('#login').submit(function (){
			$.post('{{ url('friend/login') }}', $(this).serialize(), function (data){
				if(data.status){
					window.location.href = data.redirect;
					} else {
					$('#message').html(data.message).css('color','red');	
					$('#panel').removeClass('panel-default').addClass('panel-danger');
				}
			});
			return false;
		});	
	});
</script>
