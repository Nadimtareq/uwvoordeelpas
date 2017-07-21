<a href="#" data-activates="slide-out" class="button-collapse2"><i class="material-icons material-icons2">menu</i></a>

<ul id="slide-out" class="side-nav2 right-aligned" style="overflow:auto" >
    <li><a href="javascript:void(0);" id="closeMenu"><i class="material-icons">close</i> Sluiten</a></li>
    <li><a href="<?php echo e(url('news')); ?>"><i class="material-icons">assignment</i> Nieuws</a></li>
    <li><a href="<?php echo e(url('tegoed-sparen')); ?>"><i class="material-icons">monetization_on</i> Tegoed sparen</a></li>
    <li><a href="<?php echo e(url('voordeelpas/buy')); ?>"><i class="material-icons">credit_card</i> Voordeelpas</a></li>
     <?php if($userCompany OR $userWaiter): ?>
        <li><a href="<?php echo e(url('faq/3/restaurateurs')); ?>"><i class="material-icons">help</i> Veelgestelde vragen</a></li>
    <?php else: ?>
        <li><a href="<?php echo e(url('faq/2/restaurateurs')); ?>"><i class="material-icons">help</i> Veelgestelde vragen</a></li>
    <?php endif; ?>
    <li><a href="#" class="item search-full-open"><i class="material-icons">search</i> Zoeken</a></li>
    <li><a href="<?php echo e(url('account/giftcards')); ?>"><i class="material-icons">assignment</i> Koop een cadeaubon</a></li>
    <?php if($userAuth): ?>
        <?php if( $userCompany != 1 && $userWaiter != 1 ): ?>
        <li class="fixed-row">
           <a class="active">
              <?php echo e(($userInfo->name != '' ? strtoupper($userInfo->name) : 'Gebruiker')); ?>

            </a>
        </li>
        <li class="fixed-row">
           <a href="<?php echo e(URL::to('account')); ?>">
              <?php echo e(trans('app.profile')); ?>-<?php echo e(trans('app.status')); ?>:&nbsp;&nbsp;<?php echo e(Account::getProfileStatus()); ?>

            </a>
        </li>
        <li>
            <a href="<?php echo e(url('account/reservations/saldo')); ?>" class="item">
                <i class="material-icons">euro_symbol</i><strong>Spaartegoed:</strong> <?php echo e($userInfo->saldo); ?>

            </a>
        </li>
        <li><a href="<?php echo e(url('payment/charge')); ?>" ><i class="material-icons">euro_symbol</i> Saldo opwaarderen</a></li>
        <li><a href="<?php echo e(url('account')); ?>" ><i class="material-icons">euro_symbol</i> Mijn gegevens</a></li>
        <li><a href="<?php echo e(url('account/reviews')); ?>" ><i class="material-icons">thumb_up</i> Mijn recensies</a></li>
        <li><a href="<?php echo e(url('account/reservations')); ?>" ><i class="material-icons">local_dining</i> Mijn reserveringen</a></li>
        <li><a href="<?php echo e(url('account/future-deals')); ?>" ><i class="material-icons">reorder</i> Mijn vouchers</a></li>
        <li><a href="<?php echo e(url('?extension_download_btn=1')); ?>"><i class="material-icons">star</i>Installeer spaarhulp</a></li>
        <li><a href="<?php echo e(url('account/barcodes')); ?>" ><i class="material-icons">reorder</i> Mijn voordeelpas</a></li>
        <li><a href="<?php echo e(url('account/favorite/companies')); ?>" ><i class="material-icons">favorite_border</i> Mijn favoriete restaurants</a></li>
        <li><a href="<?php echo e(url('logout')); ?>" ><i class="material-icons">touch_app</i> Uitloggen</a></li>
        <?php endif; ?>

        <?php $companyReservation = app('App\Models\CompanyReservation'); ?>
        <?php echo $__env->make('template/navigation/company', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('template/navigation/callcenter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('template/navigation/admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <li class="divider"> </li>
        <?php else: ?>
        <li><a id="registerButton2" class="register button item" href="#" ><i class="material-icons">vpn_key</i> Aanmelden</a></li>
        <li><a class="login button" data-type="login" href="#"><i class="material-icons">exit_to_app</i> Inloggen</a></li>
        <li><a href="<?php echo e(url('hoe-werkt-het')); ?>"><i class="material-icons">description</i> Hoe werkt het?</a></li>
        <li><a href="<?php echo e(url('algemene-voorwaarden')); ?>"><i class="material-icons">book</i> Voorwaarden</a></li>
    <?php endif; ?>
</ul>
