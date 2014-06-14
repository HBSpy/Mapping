{% if session.get('friend') %}
<form role="form" method="POST">
	<div class="form-group">
		<textarea class="form-control" rows="4" name="remark" placeholder="说点啥呗……" required="required"></textarea>
	</div>
	<button type="submit" class="btn btn-default">评价一下</button> 
</form>
<br />
{% endif %}

{% set colors = ['success', 'info', 'warning', 'danger'] %}
{% for remark in remarks %}
<div class="panel panel-<?php echo $colors[array_rand($colors, 1)]; ?>">
	<div class="panel-heading">
		<h3 class="panel-title" style="font-weight:bold;">
			{{ remark.friend.user }} [{{ remark.friend.relation|default("未知关系") }}]
			{% if session.get('friend') %}
				{% if remark.friend_id == session.get('friend').id %}
				<span class="glyphicon glyphicon-trash pull-right" style="cursor:pointer;" remark_id="{{ remark.id }}"></span>
				{% endif %}
			{% endif %}
		</h3>
	</div>
	<div class="panel-body">
		{{ remark.remark|nl2br }}
	</div>
	<div class="panel-footer">{{ remark.time }}</div>
</div>
{% endfor %}
<script>
	$('.glyphicon-trash').click(function (){
		remark_id = $(this).attr('remark_id');
		var panel = this;
		$.ajax({
			url: '{{ url('friend/remark/') }}' + remark_id,
			type: 'DELETE',
			success: function (data){
				if(data.status){
					$(panel).parent().parent().parent().remove();
				}
			}
		});
	});
</script>
