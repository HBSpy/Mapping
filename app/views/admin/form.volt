{% if form is defined %}
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			{{ form.ip|inet_ntop }}
			<span class="glyphicon glyphicon-heart pull-right" style="cursor:pointer; {{ form.star ? 'color:red;' : '' }}"></span>
		</h3>
	</div>
	<div class="panel-body">
		<pre>{{ dump(form.form) }}</pre>
	</div>
	<div class="panel-footer">{{ form.time }}</div>
</div>
{% else %}
{{ flash.error('此表单并不存在') }}
{% endif %}

<script>
	$(function (){
		var star = {{ form.star }};

		$('.glyphicon-heart').click(function (){
			var glyphicon = this;
			$.ajax({
				url: '{{ url('admin/star/') }}' + '{{ form.id }}',
				type: 'POST',
				success: function (data){
					if(data.status){
						if(star){
							$(glyphicon).css('color','black');
							star = !star;
							} else {
							$(glyphicon).css('color','red');
							star = !star;
						}
					}
				}
			});
		});
	});
</script>
