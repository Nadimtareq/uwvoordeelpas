<?php $__env->startSection('slider'); ?>
<br>
<?php $__env->stopSection(); ?>

<?php /**/ $pageTitle = 'Voordeelpas' /**/ ?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="discount-card">
        <a href="<?php echo e(url(isset($discountSettings['discount_url3']) ? 'redirect_to?p=3&to='.App\Helpers\StrHelper::addScheme($discountSettings['discount_url3']) : 'voordeelpas/buy')); ?>" 
            <?php echo e(isset($discountSettings['discount_url3']) ? 'target="_blank"' : ''); ?> 
            class="discount-card buy-page mobile ui">

            <?php if($company != NULL && $media != NULL && isset($media[0])): ?>
                <img src="<?php echo e(url('public'.$media[0]->getUrl('mobileThumb'))); ?>" alt="Voordeelpas">
            <?php else: ?>
                <?php if(isset($discountSettings['discount_image3'])): ?>
                    <img src="<?php echo e(asset('public/'.$discountSettings['discount_image3'])); ?>"
                    <?php echo e(isset($discountSettings['discount_width3']) ? 'width='.$discountSettings['discount_width3'].'px' : ''); ?> 
                    <?php echo e(isset($discountSettings['discount_height3']) ? 'height='.$discountSettings['discount_height3'].'px' : ''); ?> 
                     alt="Voordeelpas">
                <?php else: ?>
                    <img src="<?php echo e(asset('public/images/front-page-banner.png')); ?>" alt="Voordeelpas">
                <?php endif; ?>
            <?php endif; ?>

            <?php if(
                isset($discountSettings['discount_old3'])
                && isset($discountSettings['discount_new3'])
                && $discountSettings['discount_old3'] > 0
                OR $discountSettings['discount_new3'] > 0
            ): ?>
            <div class="price">
                <?php if(isset($discountSettings['discount_old3'])): ?>
                <sub>&euro;<?php echo e($discountSettings['discount_old3']); ?></sub>
                <?php else: ?>
                <sub>&euro;24,95</sub>
                <?php endif; ?>
                <br />

                <?php if(isset($discountSettings['discount_new3'])): ?>
                <strong>&euro;<?php echo e($discountSettings['discount_new3']); ?></strong>
                <?php else: ?>
                <strong>&euro;24,95</strong>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </a>
    </div>

    <div class="ui breadcrumb">
        <a href="<?php echo e(url('/')); ?>" class="section">Home</a>

        <i class="right chevron icon divider"></i>
        <a href="<?php echo e(url('voordeelpas/buy')); ?>" class="section">Voordeelpas</a>

        <i class="right chevron icon divider"></i>
        <div class="active section"><h1>Koop uw voordeelpas</h1></div>
    </div>
    <div class="ui divider"></div>
<div>
		<img id="barcode5"/>
		<script>
			var repeat5 = function(){
				JsBarcode("#barcode5", Math.floor(1000000+Math.random()*9000000)+"",{displayValue:true,fontSize:20});
			};
			setInterval(repeat5,500);
			repeat5();
		</script>
	</div>
	
	
    <div class="discount-card">
        <a href="<?php echo e(url(isset($discountSettings['discount_url3']) ? 'redirect_to?p=3&to='.App\Helpers\StrHelper::addScheme($discountSettings['discount_url3']) : 'voordeelpas/buy')); ?>" 
            <?php echo e(isset($discountSettings['discount_url3']) ? 'target="_blank"' : ''); ?> 
            class="discount-card buy-page large">

            <?php if($company != NULL && $media != NULL && isset($media[0])): ?>
                <img src="<?php echo e(url('public'.$media[0]->getUrl('mobileThumb'))); ?>" alt="Voordeelpas">
            <?php else: ?>
                <?php if(isset($discountSettings['discount_image3'])): ?>
                    <img src="<?php echo e(asset('public/'.$discountSettings['discount_image3'])); ?>"
                    <?php echo e(isset($discountSettings['discount_width3']) ? 'width='.$discountSettings['discount_width3'].'px' : ''); ?> 
                    <?php echo e(isset($discountSettings['discount_height3']) ? 'height='.$discountSettings['discount_height3'].'px' : ''); ?> 
                     alt="Voordeelpas">
                <?php else: ?>
                    <img src="<?php echo e(asset('public/images/front-page-banner.png')); ?>" alt="Voordeelpas">
                <?php endif; ?>
            <?php endif; ?>

            <?php if(
                isset($discountSettings['discount_old3'])
                && isset($discountSettings['discount_new3'])
                && $discountSettings['discount_old3'] > 0
                OR $discountSettings['discount_new3'] > 0
            ): ?>
            <div class="price">
                <?php if(isset($discountSettings['discount_old3'])): ?>
                <sub>&euro;<?php echo e($discountSettings['discount_old3']); ?></sub>
                <?php else: ?>
                <sub>&euro;24,95</sub>
                <?php endif; ?>
                <br />

                <?php if(isset($discountSettings['discount_new3'])): ?>
                <strong>&euro;<?php echo e($discountSettings['discount_new3']); ?></strong>
                <?php else: ?>
                <strong>&euro;24,95</strong>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </a>
    </div>
    <div class="padded">
        <?php echo isset($contentBlock[10]) ? $contentBlock[10] : ''; ?><br />
        
        <?php echo Form::open(array('url' => 'voordeelpas/buy', 'method' => 'post', 'class' => 'ui form')) ?>
            <?php if($userAuth): ?>
                <?php if($userInfo->terms_active == 0): ?>
                 <div class="field">
                    <div class="ui checkbox">
                        <?php echo Form::checkbox('terms', 1); ?>
                        <label>Ik ga akkoord met de <a href="<?php echo e(url('algemene-voorwaarden')); ?>" target="_blank">voorwaarden</a></label>
                    </div>  
                </div>  
                <?php else: ?>
                <?php echo Form::hidden('terms', 1); ?>
                <?php endif; ?>
            <?php else: ?>
            <div class="field">
                    <div class="ui checkbox">
                        <?php echo Form::checkbox('terms', 1); ?>
                        <label>Ik ga akkoord met de <a href="<?php echo e(url('algemene-voorwaarden')); ?>" target="_blank">voorwaarden</a></label>
                    </div>  
                </div>  
            <?php endif; ?>

            <?php if($userAuth == FALSE): ?>
                <a href="<?php echo e(url('voordeelpas/buy/direct')); ?>" data-redirect="<?php echo e(url('voordeelpas/buy/direct')); ?>"  class="ui button login blue" data-type="login">Koop nu</a>
                <a href="<?php echo e(url('account/barcodes')); ?>" data-redirect="<?php echo e(url('account/barcodes')); ?>" class="ui button login" data-type="login">Ik heb al een barcode</a>
            <?php else: ?>
                <button type="submit" class="ui button blue">Koop nu</button>
                <a href="<?php echo e(url('account/barcodes')); ?>" class="ui button">Ik heb al een barcode<a>
            <?php endif; ?>
        <?php echo Form::close(); ?> 
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>