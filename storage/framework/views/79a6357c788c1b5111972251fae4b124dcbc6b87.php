<?php $__env->startSection('logo'); ?>
<a href="<?php echo e(url('/')); ?>" target="_blank">
	<img align="left" 
		 alt="Uw Voordeelpas" 
		 class="mcnImage" 
		 src="<?php echo e(url('public/images/vplogo.png')); ?>" 
		 style="max-width: 133px;padding-bottom: 0;display: inline !important;vertical-align: bottom;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" width="190">
</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
Beste <?php echo $user; ?>,<br /><br />


Je hebt met succes een cadeaubon van <?php echo "€ ".$code->amount;?> gekocht. Je code is <?php echo $code->code;?><br /><br />

<strong>Met vriendelijke groet,</strong><br />
UWvoordeelpas.nl
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
&copy; <?php echo e(date('Y')); ?> UWvoordeelpas B.V.
<?php $__env->stopSection(); ?>
<?php echo $__env->make('emails.template.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>