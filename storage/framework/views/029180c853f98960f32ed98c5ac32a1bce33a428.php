<?php $__env->startSection('scripts'); ?>
<?php if(Request::has('direct')): ?>
<script type="text/javascript">
    $('#formList').submit();
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <div class="content">
    <div class="ui breadcrumb">
        <a href="<?php echo e(url('/')); ?>" class="section">Home</a>

        <i class="right chevron icon divider"></i>
        <a href="#" class="sidebar open" data-activates="slide-out">Menu</a>

        <i class="right chevron icon divider"></i>
        <a href="<?php echo e(url('voordeelpas')); ?>" class="section">Voordeelpas</a>

        <i class="right chevron icon divider"></i>
        <div class="active section">Saldo opwaarderen</div>
    </div>

    <div class="ui divider"></div>

    <p>Hier kunt u uw giftcard verzilveren. Voer uw code in en klik op de Verzilveren knop.</p>
    

    <?php echo Form::open(array('id' => 'formList', 'url' => 'payment/paygiftcard', 'method' => 'post', 'class' => 'ui form')) ?>
    <input id="actionMan" type="hidden" name="action">

    <?php if(isset($error) && trim($error) != ''): ?> 
        <div class="ui red message"><?php echo e($error); ?></div>
    <?php endif; ?>

    <div class="fields">
        <div class="four wide field">
            <label>Giftcard Aantal</label>
            <?php echo Form::text('giftcard'); ?>
        </div>
    </div>

    <button class="ui button" type="submit">Verzilveren</button>
    <?php echo Form::close(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>