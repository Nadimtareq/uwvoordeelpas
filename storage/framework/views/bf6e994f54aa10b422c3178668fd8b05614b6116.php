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

		<div class="active section">Mijn voordeelpas</div>
	</div>

	<div class="ui divider"></div>
	
	<?php echo Form::open(array('url' => 'account/barcodes', 'method' => 'post', 'class' => 'ui form')) ?>		
		<?php if(count($data) == 0): ?>
		<div class="field">
		 	<label>Voer hier uw barcode in:</label>
			<?php echo Form::text('code') ?>
		</div>

		<button class="ui green button" name="action" value="update" type="submit">
			<i class="check mark icon"></i> Activeren
		</button>
		
		<a class="ui icon blue button" href="<?php echo e(url('voordeelpas/buy')); ?>">
			<i class="barcode icon"></i> Koop een voordeelpas
		</a>

		<a class="ui icon button" href="<?php echo e(url('voordeelpas/buy')); ?>">
			<i class="info  icon"></i> Informatie
		</a>
		<?php endif; ?>

		<?php if(count($data) >= 1): ?>	
		<?php echo isset($contentBlock[56]) ? $contentBlock[56] : ''; ?>


		<h3 class="ui header thin">Mijn voordeelpas barcode</h3>

		<table class="ui very basic collapsing table list" style="width: 100%;">
			<thead>
				<tr>
					<th>Gekocht bij</th>
					<th>Barcode</th>
					<th>Geactiveerd op</th>
					<th>Verloopt op</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($data as $barcode): ?>
				<?php
				$endDate = $barcode->expire_date == NULL OR $barcode->expire_date == '0000-00-00' ? date('Y-m-d', strtotime('+1 years', strtotime($barcode->activatedOn))) : $barcode->expire_date;
				$barcodeDate = \Carbon\Carbon::create(
				    date('Y', strtotime($endDate)), 
				    date('m', strtotime($endDate)),
				    date('d', strtotime($endDate)),
				    0,
				    0,
				    0
				);
				?>
				<tr class="<?php echo e($barcodeDate->isPast() ? 'disabled' : ''); ?>">
					<td><?php echo e(trim($barcode->name) == '' ? 'UwVoordeelpas' : $barcode->name); ?></td>
					<td><div id="barcode" data-code="<?php echo e($barcode->code); ?>"></div></td>
					<td><?php echo e(date('d-m-Y', strtotime($barcode->activatedOn))); ?></td>
					<td>
						<?php if($barcode->expire_date != NULL && $barcode->expire_date != '0000-00-00'): ?>
				            <?php echo e(date('d-m-Y', strtotime($barcode->expire_date))); ?>

				        <?php else: ?>
				            <?php echo e(date('d-m-Y', strtotime('+1 year', strtotime($barcode->activatedOn)))); ?>

				        <?php endif; ?>
				    </td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php endif; ?>
	<?php echo Form::close(); ?>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>