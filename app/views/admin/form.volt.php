<?php if (isset($form)) { ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			<?php echo inet_ntop($form->ip); ?>
			<span class="glyphicon glyphicon-heart pull-right" style="cursor:pointer; <?php echo ($form->star ? 'color:red;' : ''); ?>"></span>
		</h3>
	</div>
	<div class="panel-body">
		<pre><?php echo var_dump($form->form); ?></pre>
	</div>
	<div class="panel-footer"><?php echo $form->time; ?></div>
</div>
<?php } else { ?>
<?php echo $this->flash->error('此表单并不存在'); ?>
<?php } ?>

<script>
	$(function (){
		var star = <?php echo $form->star; ?>;

		$('.glyphicon-heart').click(function (){
			var glyphicon = this;
			$.ajax({
				url: '<?php echo $this->url->get('admin/star/'); ?>' + '<?php echo $form->id; ?>',
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
