<?php $affiliate = app('App\Models\Affiliate'); ?>
<?php $strHelper = app('App\Helpers\StrHelper'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="ui grid container">
            <div class="center floated sixteen wide mobile ten wide computer column">
                Reference Url&nbsp;
                <div class="ui label">
                    <a href="<?php echo e(url("source?reference={$reference->reference_code}")); ?>"><?php echo e(url("source?reference={$reference->reference_code}")); ?></a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>