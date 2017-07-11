<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript">
		$(document).ready(function() {
		    closeBrowser();  
		});
	</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <?php if($data != ''): ?>
	    <?php echo $__env->make('admin.template.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<?php echo Form::open(array('method' => 'post', 'class' => 'ui edit-changes form', 'files' => true)) ?>
			<div class="left section">
				<div class="field">
				    <label>Bedrijf</label>
				    <?php echo Form::select('company', array_add($companies, '0', 'UwVoordeelpas'), $data->company_id, array('class' => 'ui normal search dropdown'));  ?>
				</div>	

				<div class="two fields">
					<div class="field">
					    <label>Code</label>
					    <?php echo Form::text('code', $data->code); ?>
					</div>	

					<div class="field">
					    <label>Verloopt op</label>
					    <?php echo Form::text('expire_date', $data->expire_date, array('class' => 'datepicker')); ?>
					</div>	
				</div>	

				<button class="ui tiny button" type="submit"><i class="pencil icon"></i> Wijzigen</button>
			</div>

			<div class="right section" style="padding-left: 20px;">
				<div class="field">
					<label>Barcode inschakelen</label>
					<div class="ui toggle checkbox">
						<?php echo Form::checkbox('is_active', ($data->is_active == 0 ? 1 : 0), $data->is_active); ?>
						<label>Actief</label>
					</div>
				</div>
			</div>
		<?php echo Form::close(); ?>

		<div class="clear"></div>
	<?php else: ?>
		<div class="ui error message">Het formulier met record ID <strong><?php echo e(Request::segment(4)); ?></strong> is niet gevonden.</div>
	<?php endif; ?>
</div>
<div class="clear"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>