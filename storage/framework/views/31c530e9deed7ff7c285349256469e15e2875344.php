<?php /**/ $pageTitle = $page->title /**/ ?>
<?php /**/ $metaDescription = $page->meta_description /**/ ?>

<?php $__env->startSection('content'); ?>
<div class="container ">
	<div class="row">
	 <div class="col-md-12 page-fixed">
		<?php echo str_replace(array('\r\n','\n'), ' ', $page->content); ?>	
	 </div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>