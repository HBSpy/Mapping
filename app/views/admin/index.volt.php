<form class="form-inline well" role="form" method="POST" action="<?php echo $this->url->get('admin/friend'); ?>">
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
		<?php foreach ($forms as $form) { ?>
		<tr class="<?php echo ($form->read ? 'success' : 'warning'); ?>">
			<td><?php echo ($form->star ? '<span class="glyphicon glyphicon-heart" style="color:red;"></span>' : ''); ?></td>
			<td><?php echo inet_ntop($form->ip); ?></td>
			<td><?php echo $form->time; ?></td>
			<td><a href="<?php echo $this->url->get('admin/form/') . $form->id; ?>" target="_blank" class="read"><?php echo ($form->read ? '已读' : '未读'); ?></a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<script>
	$('.read').click(function (){
		$(this).html('已读').parent().parent().removeClass('warning').addClass('success');
	});
</script>
