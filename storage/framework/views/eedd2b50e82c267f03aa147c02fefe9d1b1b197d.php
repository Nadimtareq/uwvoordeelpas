<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript">
		$(document).ready(function() {
		    closeBrowser();  
		});
	</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <?php if($data != null): ?>
    	<?php echo $__env->make('admin.template.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
		<?php echo Form::open(array('method' => 'post', 'class' => 'ui edit-changes form')) ?>
		<div class="three fields">
			<div class="field">
				<label>Bedrag</label>
				<div class="ui left icon input">
				  	<i class="euro icon"></i>
					<?php echo Form::text('amount', $data->amount); ?>
				</div>
			</div>	

			<div class="field">
				<label>Status</label>
				<?php 
				echo Form::select(
					'status',
					array(
						'open' => 'Open',
						'paid' => 'Betaald',
					),
					$data->status,
					array(
						'class' => 'ui normal dropdown'
					)
				); 
				?>
			</div>

			<div class="field">
				<label>Betalingswijze</label>
				<?php echo Form::text('payment_type', $data->payment_type); ?>
			</div>	
		</div>	

		<button class="ui button" type="submit"><i class="save icon"></i> Opslaan</button>

		<?php echo Form::close(); ?>
	<?php else: ?>
		<div class="ui error message">Het formulier met record ID <strong><?php echo e(Request::segment(4)); ?></strong> is niet gevonden.</div>
	<?php endif; ?>
</div>
<div class="clear"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>