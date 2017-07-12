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
        <a href="#" class="sidebar open">Menu</a>

        <i class="right chevron icon divider"></i>
        <a href="<?php echo e(url('voordeelpas')); ?>" class="section">Voordeelpas</a>

        <i class="right chevron icon divider"></i>
        <div class="active section">Saldo opwaarderen</div>
    </div>

    <div class="ui divider"></div>

    <?php if(isset($discountSettings['discount_image2'])): ?>
    <div class="ui grid">
        <div class="ten wide column">
            Hier kunt u uw saldo opwaarderen, bij het klikken op 'Saldo opwaarderen' wordt u doorgeleid naar de betaalpagina.
        </div>

        <div class="five wide column">
            <?php if(isset($discountSettings['discount_image2'])): ?>
            <a href="<?php echo e(url(isset($discountSettings['discount_url']) ? 'redirect_to?p=2&to='.App\Helpers\StrHelper::addScheme($discountSettings['discount_url3']) : '#')); ?>" 
                <?php echo e(isset($discountSettings['discount_url3']) ? 'target="_blank"' : ''); ?> class="discount-card">
                 <img src="<?php echo e(asset(''.$discountSettings['discount_image2'])); ?>"

                <?php echo e(isset($discountSettings['discount_width2']) ? 'width='.$discountSettings['discount_width2'].'px' : ''); ?> 
                <?php echo e(isset($discountSettings['discount_height2']) ? 'height='.$discountSettings['discount_height2'].'px' : ''); ?> 
                 class="ui image" alt="Opwaarderen">
            </a>
            <?php endif; ?>
        </div>
    </div><br /><br />
    <?php else: ?>
        <p>Hier kunt u uw saldo opwaarderen, bij het klikken op 'Saldo opwaarderen' wordt u doorgeleid naar de betaalpagina.</p>
    <?php endif; ?>

    <?php echo Form::open(array('id' => 'formList', 'url' => 'payment/pay'.(Request::has('buy') ? '?buy=voordeelpas' : ''), 'method' => 'post', 'class' => 'ui form')) ?>
    <input id="actionMan" type="hidden" name="action">

    <?php if(isset($error) && trim($error) != ''): ?> 
        <div class="ui red message"><?php echo e($error); ?></div>
    <?php endif; ?>

    <div class="fields">
        <div class="four wide field">
            <label>Bedrag</label>
            <?php echo Form::text('amount', $restAmount); ?>
        </div>
    </div>
    <div class="fields">
        <div class="two field">
    <button class="ui button" type="submit">Saldo opwaarderen</button>
        </div>
        <div class="two field">
    <a href="<?php echo e(url('payment/giftcode')); ?>"><button class="ui button" type="button">Verzilver kadokaart</button></a>
        </div>
    </div>
    <?php echo Form::close(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>