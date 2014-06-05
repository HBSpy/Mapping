<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">好友信息</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" method="POST" action="{{ url('friend/edit') }}">
					<div class="form-group">
						<label for="inputUser" class="col-sm-2 control-label">昵称</label>
						<div class="col-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
								<input type="text" name="user" class="form-control" id="inputUser" value="{{ session.get('friend').user }}" required="required">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPass" class="col-sm-2 control-label">密码</label>
						<div class="col-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
								<input type="password" name="pass" class="form-control" id="inputPass">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputRelation" class="col-sm-2 control-label">关系</label>
						<div class="col-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-magnet"></span></span>
								<input type="text" name="relation" class="form-control" id="inputRelation" value="{{ session.get('friend').relation }}" required="required">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary">修改</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
