<?php $__env->startSection('content'); ?>
<div class="content">
    <?php echo $__env->make('admin.template.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="ui normal floating basic search selection large dropdown">
       	<div class="text">Filter op bedrijf</div>
        <i class="dropdown icon"></i>

		    <div class="menu">
            <?php foreach($companies as $company): ?>
            <a class="item" href="<?php echo e(url('admin/widgets/'.$company->slug)); ?>"><?php echo e($company->name); ?></a>
            <?php endforeach; ?>
       </div>
    </div>
</div>
<div class="clear"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>