<?php $__env->startSection('content'); ?>
<div class="clear" style="height: 80px;">&nbsp;</div>
<div class="container" style="min-height: 500px">
    <div class="ui breadcrumb">
        <a href="<?php echo e(url('/')); ?>" class="section">Home</a>
        <i class="right chevron icon divider"></i>

        <a href="#" class="sidebar open">Menu</a>
        <i class="right chevron icon divider"></i>

        <div class="active section">Future Deals</div>
    </div>
    <div class="ui divider"></div>
    <div class="ui divider"></div>
    <div class="col-sm-12 col-ms1">
        <div class="col-sm-3 col5">
            <?php if(count($futureDeals)>0): ?>
            <ul>
                <?php foreach($futureDeals as $futureDeal): ?>
                <li>
                    <div class="ob">
                        <?php if(isset($futureDeal->file_name) && file_exists(public_path($futureDeal->disk. DIRECTORY_SEPARATOR . $futureDeal->media_id . DIRECTORY_SEPARATOR . $futureDeal->file_name)) ): ?>
                        <a href="<?php echo e(url('restaurant/'.$futureDeal->company_slug)); ?>" title="<?php echo e($futureDeal->company_name); ?>">
                            <img width="420" src="<?php echo e(url('media/'.$futureDeal->media_id.'/'.$futureDeal->file_name)); ?>" alt="<?php echo e($futureDeal->company_name); ?>"  />
                        </a>
                        <?php else: ?>
                        <a href="<?php echo e(url('restaurant/'.$futureDeal->company_slug)); ?>" title="<?php echo e($futureDeal->company_name); ?>">
                            <img src="<?php echo e(url('images/placeholdimagerest.png')); ?>" alt="<?php echo e($futureDeal->company_name); ?>" class="thumbnails"  />
                        </a>
                        <?php endif; ?>
                    </div>
                    <div class="text3" style="min-height: 280px;">
                        <strong><?php echo e($futureDeal->deal_name); ?></strong>
                        <span class="city">

                            <a href="<?php echo e(url('search?q='.$futureDeal->city)); ?>">
                                <span>
                                    <?php echo e($futureDeal->company_name); ?>

                                </span>
                                 |
                                <span>
                                    <i class="marker icon"></i> <?php echo e($futureDeal->city); ?>&nbsp;
                                </span>
                            </a>
                        </span>

                        <span class="stars"><img src="<?php echo e(asset('images/stars.png')); ?>" alt="stars">5.00</span>
                        <p><?php echo e($futureDeal->company_disc); ?></p>
                        <div>
                            <b style="max-width: 250px;">
                                <?php if($futureDeal->remain_persons > 0): ?>
                                    Beschikbaar voor <?php echo e($futureDeal->remain_persons); ?> personen
                                <?php else: ?>
                                    Not available
                                    <?php /*Alles is verzilverd*/ ?>
                                <?php endif; ?>
                            </b>
                        </div>
                        <div>
                            <b style="max-width: 250px;">
                                vervaldatum: <?php echo e(Carbon\Carbon::parse($futureDeal->date_to)->formatLocalized('%d %B %Y')); ?>

                            </b>
                        </div>
                        <br />
                        <?php if(($futureDeal->expired_at >= date('Y-m-d')) && ($futureDeal->remain_persons > 0)): ?>
                            <a href="<?php echo e(url('account/reserve-futuredeal/'.$futureDeal->future_deal_id)); ?>" class="more">Reserveer nu</a>
                        <?php endif; ?>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
                <?php else: ?>
                <a href="<?php echo e(url('/')); ?>">Helaas, u heeft nog geen vouchers gekocht klik hier om uw eerste voucher aan te schaffen</a>
                <?php endif; ?>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>