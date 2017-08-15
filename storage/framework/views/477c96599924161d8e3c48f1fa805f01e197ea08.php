<?php if(isset($userAuth->lang) && !empty($userAuth->lang)): ?>
    <?php /* */$lang=$userAuth->lang;/* */ ?>
<?php elseif(Session::has('language')): ?>
    <?php /* */$lang=Session::get('language');/* */ ?>
<?php else: ?>
    <?php /* */$lang='nl';/* */ ?>
<?php endif; ?>
<a href="#" data-activates="slide-out" class="button-collapse2"><i class="material-icons notranslate material-icons2">menu</i></a>

<ul id="slide-out" class="side-nav2 right-aligned" style="overflow:auto" >
    <li><a href="javascript:void(0);" id="closeMenu"><i class="material-icons notranslate">close</i> Sluiten</a></li>
    <li><a href="<?php echo e(url('news')); ?>"><i class="material-icons notranslate">assignment</i> Nieuws</a></li>
    <li><a href="<?php echo e(url('tegoed-sparen')); ?>"><i class="material-icons notranslate">monetization_on</i> Tegoed sparen</a></li>
    <li><a href="<?php echo e(url('voordeelpas/buy')); ?>"><i class="material-icons notranslate">credit_card</i> Voordeelpas</a></li>
     <?php if($userCompany OR $userWaiter): ?>
        <li><a href="<?php echo e(url('faq/3/restaurateurs')); ?>"><i class="material-icons notranslate">help</i> Veelgestelde vragen</a></li>
    <?php else: ?>
        <li><a href="<?php echo e(url('faq/2/restaurateurs')); ?>"><i class="material-icons notranslate">help</i> Veelgestelde vragen</a></li>
    <?php endif; ?>
    <li><a href="#" class="item search-full-open"><i class="material-icons notranslate">search</i> Zoeken</a></li>
    <li><a href="<?php echo e(url('account/giftcards')); ?>"><i class="material-icons notranslate">assignment</i> Koop een cadeaubon</a></li>
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
                <i class="material-icons notranslate">euro_symbol</i><strong>Spaartegoed:</strong> <?php echo e($userInfo->saldo); ?>

            </a>
        </li>
        <li><a href="<?php echo e(url('payment/charge')); ?>" ><i class="material-icons notranslate">euro_symbol</i> Saldo opwaarderen</a></li>
        <li><a href="<?php echo e(url('account')); ?>" ><i class="material-icons notranslate">code</i> Mijn gegevens</a></li>
        <li><a href="<?php echo e(url('account/reviews')); ?>" ><i class="material-icons notranslate">thumb_up</i> Mijn recensies</a></li>
        <li><a href="<?php echo e(url('account/reservations')); ?>" ><i class="material-icons notranslate">local_dining</i> Mijn reserveringen</a></li>
        <li><a href="<?php echo e(url('account/future-deals')); ?>" ><i class="material-icons notranslate">reorder</i> Mijn vouchers</a></li>
        <li><a href="<?php echo e(url('?extension_download_btn=1')); ?>"><i class="material-icons notranslate">star</i>Installeer spaarhulp</a></li>
        <li><a href="<?php echo e(url('reference_code')); ?>"><i class="material-icons notranslate">euro_symbol</i>Geld verdienen</a></li>
        <li><a href="<?php echo e(url('account/barcodes')); ?>" ><i class="material-icons notranslate">reorder</i> Mijn voordeelpas</a></li>
        <li><a href="<?php echo e(url('account/favorite/companies')); ?>" ><i class="material-icons notranslate">favorite_border</i> Mijn favoriete restaurants</a></li>
        <li><a href="<?php echo e(url('logout')); ?>" ><i class="material-icons notranslate">touch_app</i> Uitloggen</a></li>
        <?php endif; ?>

        <?php $companyReservation = app('App\Models\CompanyReservation'); ?>
        <?php echo $__env->make('template/navigation/company', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('template/navigation/callcenter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('template/navigation/admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <li class="divider"> </li>
        <?php else: ?>
        <li><a id="registerButton2" class="register button item" href="#" ><i class="material-icons notranslate">vpn_key</i> Aanmelden</a></li>
        <li><a class="login button" data-type="login" href="#"><i class="material-icons notranslate">exit_to_app</i> Inloggen</a></li>
        <li><a href="<?php echo e(url('hoe-werkt-het')); ?>"><i class="material-icons notranslate">description</i> Hoe werkt het?</a></li>
        <li><a href="<?php echo e(url('algemene-voorwaarden')); ?>"><i class="material-icons notranslate">book</i> Voorwaarden</a></li>
    <?php endif; ?>

    <li class="sidebar-dropdown notranslate">
        <a href="javascript:void(0)" class="dropbtn">
            <img src="<?php echo e(asset('images/flags/')); ?>/<?php echo e($lang); ?>.png" alt="flag"> <?php echo e(strtoupper($lang)); ?> <i class="fa fa-angle-down" aria-hidden="true"></i>
        </a>
        <div class="sidebar-dropdown-content">
            <a href="<?php echo e(url('setlang/nl?redirect='.Request::url())); ?>" data-value="nl" class="item <?php echo e(isset($userInfo->id) ? 'change-login-user-language' : ''); ?>"><i class="nl flag"></i> NL</a>
            <a href="<?php echo e(url('setlang/en?redirect='.Request::url())); ?>" data-value="en" class="item <?php echo e(isset($userInfo->id) ? 'change-login-user-language' : ''); ?>"><i class="gb flag"></i> EN</a>
            <a href="<?php echo e(url('setlang/be?redirect='.Request::url())); ?>" data-value="be" class="item <?php echo e(isset($userInfo->id) ? 'change-login-user-language' : ''); ?>"><i class="be flag"></i> BE</a>
            <a href="<?php echo e(url('setlang/de?redirect='.Request::url())); ?>" data-value="de" class="item <?php echo e(isset($userInfo->id) ? 'change-login-user-language' : ''); ?>"><i class="de flag"></i> DE</a>
            <a href="<?php echo e(url('setlang/fr?redirect='.Request::url())); ?>" data-value="fr" class="item <?php echo e(isset($userInfo->id) ? 'change-login-user-language' : ''); ?>"><i class="fr flag"></i> FR</a>
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
    </li>

</ul>

