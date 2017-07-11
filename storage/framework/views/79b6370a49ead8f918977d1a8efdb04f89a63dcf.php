<div class="ui padded breadcrumb">
    <a href="#" data-activates="slide-out" class="sidebar open">Menu</a>
    <i class="right chevron icon divider"></i>

    <?php if(isset($section) && trim($section) != ''): ?>
    <a href="<?php echo e(url((isset($noAdmin) ? '' : 'admin/').$slugController.(isset($slugParam) ? $slugParam : ''))); ?>"><?php echo e($section); ?></a>

    <i class="right chevron icon divider"></i>
    <?php endif; ?>

    <?php if(isset($currentPage)): ?>
    <div class="active section"><?php echo e($currentPage); ?></div>
    <?php endif; ?>
</div>

<div class="ui divider"></div>