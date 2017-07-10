<?php $preference = app('App\Models\Preference'); ?>
<?php $content = app('App\Models\Content'); ?>
<?php $affiliateHelper = app('App\Helpers\AffiliateHelper'); ?>

<?php /**/ $pageTitle = $data->name /**/ ?>

<?php $__env->startSection('slider'); ?>
<br>
<?php $__env->stopSection(); ?>

<div class="shop">
    <div class="container">
        <div class="up">
            <div class="more">
                <div>
                    <h2><?php echo e($data->name); ?></h2>
                    <div class="wrap"><img src="<?php echo e(url('images/affiliates/'. $data->affiliate_network .'/'.$data->program_id.'.'.$data->image_extension)); ?>" alt="more" /></div>
                    <div class="t2">
                        <strong>Wat u kunt sparen</strong>
                        <?php if(trim($data->compensations) != ''): ?>
                        <?php foreach($affiliateHelper->commissionUnique(json_decode($data->compensations)) as $key => $commission): ?>
                        <?php if($commission['value'] > 0 && !isset($commission['noshow'])): ?>
                        <?php if($userAuth): ?>
                        <span><?php echo e($affiliateHelper->amountAsUnit($commission['value'], $commission['unit'])); ?> <?php echo e($commission['name']); ?></span>
                        <?php else: ?>
                        <span><?php echo e($commission['unit'] != '%' ? '&euro;' : ''); ?><?php echo e(round($commission['value'] / 100 * 70, 2)); ?><?php echo e($commission['unit'] == '%' ? '%' : ''); ?> <?php echo e($commission['name']); ?></span>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <i>Standaard vergoeding</i>

                        <?php if($userAuth): ?>
                        <a id="visiteStore"
                           href="<?php echo e($affiliateHelper->getAffiliateUrl($data, $userInfo->id)); ?>"
                           class="ui blue no-radius <?php echo e($userInfo->cashback_popup == 0 ? 'cashback' : 'cashback'); ?> logged-in fluid button"
                           <?php echo e($userInfo->cashback_popup == 1 ? 'target="_blank"' : ''); ?>>
                            Bezoek webwinkel
                        </a>
                        <br />

                        <?php if($favoriteCompany >= 1): ?>
                        <a  id="visiteStore"
                            href="<?php echo e(url('tegoed-sparen/delete-favorite/'.$data->id.'/'.$data->slug)); ?>"
                            class="ui fluid button">
                            Verwijder favoriet
                        </a>
                        <?php else: ?>
                        <a  id="visiteStore"
                            href="<?php echo e(url('tegoed-sparen/favorite/'.$data->id.'/'.$data->slug)); ?>"
                            class="ui yellow fluid button">
                            Bewaren
                        </a>
                        <?php endif; ?>
                        <?php else: ?>
                        <a  id="visiteStore"
                            href="<?php echo e(url('tegoed-sparen/company/'.$data->slug)); ?>?open_cashbackinfo=1"
                            class="ui blue no-radius login cashback fluid button"
                            data-type="login"
                            data-redirect="<?php echo e(url('tegoed-sparen/company/'.$data->slug)); ?>?open_cashbackinfo=1">
                            Bezoek webwinkel
                        </a>
                        <?php endif; ?>

                    </div>
                    <div class="t">
                        <h2>Voorwaarden</h2>
                        <p>
                            <?php echo $data->terms; ?>

                            <?php echo isset($contentBlock[20]) ? $contentBlock[20] : ''; ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('pages/cashback/companies', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>

<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>