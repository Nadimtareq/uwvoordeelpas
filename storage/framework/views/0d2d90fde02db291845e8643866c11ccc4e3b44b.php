<?php $__env->startSection('content'); ?>
<?php

use App\Models\Company;
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
    .form-control {
        display: block !important;
        width: 100% !important;
        height: 34px !important;
        padding: 6px 12px !important;
        font-size: 14px !important;
        line-height: 1.42857143 !important;
        color: #555 !important;
        background-color: #fff !important;
        background-image: none !important;
        border: 1px solid #ccc !important;
        border-radius: 4px !important;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075) !important;
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075) !important;
        -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s !important;
        -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s !important;
        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s !important;
    }
</style>

<div class='container'>
    <div class='row'>
        <div class='col-lg-12'>
            <div  style='padding:15px 15px 15px 0px;'>
                <h4>CREATE NEW TABLE  <a  href="<?php echo e(url("admin/tables")); ?>" class="btn btn-info btn-sm" style='font-size: 16px;'>BACK</a></h4>
                <hr/>
            </div>
        </div>
    </div>

    <?php if($errors->any()): ?>
    <div class="alert alert-danger" style='margin:15px 0px;padding:8px;font-size:17px;color:red;background: #FFCDD2;'>
        <?php foreach($errors->all() as $error): ?>
        <p><?php echo e($error); ?></p>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if(Session::has('flash_message')): ?>
    <div class="alert alert-success" style='margin:15px 0px;padding:8px;font-size:17px;color:green;background: #A5DC86;'>
        <?php echo e(Session::get('flash_message')); ?>

    </div>
    <?php endif; ?>

    <?php echo Form::open([
    'url' =>'admin/tables/store'
    ]); ?>

    <div class='row'>
        <div class='col-lg-3'>
            <div class='form-group'>
                <?php echo Form::label('table_number', 'TABLE NUMBER', ['class' => 'control-label']); ?>

                <?php echo Form::text('table_number', null, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class='col-lg-3'>
            <div class='form-group'>
                <?php echo Form::label('seating', 'SEATING ( No of persons )', ['class' => 'control-label']); ?>

                <?php echo Form::text('seating', null, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class='col-lg-3'>
            <div class='form-group'>
                <?php echo Form::label('priority', 'PRIORITY ( less number has high priority )', ['class' => 'control-label']); ?>

                <?php echo Form::text('priority', null, ['class' => 'form-control']); ?>

            </div>
        </div>

    </div>
    <div class='row'>
        <div class='col-lg-3'>
            <div class='form-group'>
                <?php echo Form::label('comp_id', 'COMPANY', ['class' => 'control-label']); ?>

                <?php echo Form::select('comp_id', $company,0,array('class' => 'form-control')); ?>

            </div>
        </div>
        <div class='col-lg-3'>
            <div class='form-group'>
                <?php echo Form::label('duration', 'DURATION ( In Minutes )', ['class' => 'control-label']); ?>

                <?php echo Form::text('duration', null, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class='col-lg-9'>
            <div class='form-group'>
                <?php echo Form::label('description', 'DESCRIPTION', ['class' => 'control-label']); ?>

                <?php echo Form::textarea('description', null, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class='col-lg-12'>
            <div class='form-group'>
                <?php echo Form::submit('ADD NEW TABLE', ['class' => 'btn btn-primary']); ?>

            </div>
        </div>
    </div>







    <?php echo Form::close(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>