<?php $preference = app('App\Models\Preference'); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
$(document).ready(function() {
	$("#barcode").barcode(
		$("#barcode").data('code'), // Value barcode (dependent on the type of barcode)
		"code128" // type (string)
	);
});
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="ui breadcrumb">
		<a href="<?php echo e(url('/')); ?>" class="section">Home</a>
		<i class="right chevron icon divider"></i>

		<a href="#" class="sidebar open">Menu</a>
	    <i class="right chevron icon divider"></i>

		<div class="active section">Kopen Giftcard</div>
	</div>

	<div class="ui divider"></div>
	
	<?php echo Form::open(array('url' => 'account/giftcards', 'method' => 'post', 'class' => 'ui form')) ?>		
		
		<div class="field">
		 	<label>Selecteer hier uw giftcard in:</label>
			<?php echo Form::select('code', $data, 0, array('class' => 'ui normal search dropdown')); ?>
		</div>

		<button class="ui green button" name="action" value="update" type="submit">
			<i class="check mark icon"></i> Kopen Giftcard
		</button>
		
	<?php echo Form::close(); ?>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>