<form class="form-inline well" role="form" method="POST" action="{{ url('admin/friend') }}">
	<div class="form-group">
		<label class="sr-only" for="user">昵称</label>
		<input type="text" class="form-control" name="user" id="exampleInputEmail2" placeholder="昵称" required="required">
	</div>
	<button type="submit" class="btn btn-default">添加</button>
</form>

<table class="table">
	<thead>
		<tr>
			<th><span class="glyphicon glyphicon-heart"></span></th>
			<th>IP</th>
			<th>Time</th>
			<th>View</th>
		</tr>
	</thead>
	<tbody>
		{% for form in forms %}
		<tr class="{{ form.read ? 'success' : 'warning' }}">
			<td>{{ form.star ? '<span class="glyphicon glyphicon-heart" style="color:red;"></span>' : ''}}</td>
			<td>{{ form.ip|inet_ntop }}</td>
			<td>{{ form.time }}</td>
			<td><a href="{{ url('admin/form/') ~ form.id }}" target="_blank" class="read">{{ form.read ? '已读' : '未读'}}</a></td>
		</tr>
		{% endfor %}
	</tbody>
</table>
<script>
	$('.read').click(function (){
		$(this).html('已读').parent().parent().removeClass('warning').addClass('success');
	});
</script>
