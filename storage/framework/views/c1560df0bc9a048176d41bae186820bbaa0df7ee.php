<?php if(isset($userAuth->lang) && !empty($userAuth->lang)): ?>
	 <?php /* */$lang=$userAuth->lang;/* */ ?>
 <?php elseif(Session::has('language')): ?>
	 <?php /* */$lang=Session::get('language');/* */ ?>
 <?php else: ?>
	 <?php /* */$lang='nl';/* */ ?>
 <?php endif; ?>
<header id="navigation" class="root-sec white nav header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="nav-inner">
                    <nav class="primary-nav">
                        <div class="clearfix nav-wrapper">
                        <?php echo $__env->make('template.sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <!-- <a href="<?php echo e(url('/')); ?>" class="left brand-logo menu-smooth-scroll" data-section="#home">
									   <img src="<?php echo e(asset('images/logo.png')); ?>" alt="">
									</a>
									
									 <div class="mobile-profile pp-container">
										<a href="<?php echo e(url('/')); ?>">
											<img src="<?php echo e(asset('images/logo.png')); ?>" alt="">
										 </a>
									 </div> -->
                            <a href="#" data-activates="mobile-top" class="button-collapse"> <i
                                        class="material-icons notranslate material-icons2">menu</i></a>
                            <div class="brand-logo">
                                <?php if($userAuth): ?>
                                    <a href="<?php echo e(url('/home')); ?>">
                                <?php else: ?>
                                    <a href="<?php echo e(url('/')); ?>">
                                <?php endif; ?>
                                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="" class="responsive-img">
                                </a>
                            </div>

                            <ul class="right side-nav" id="mobile-top"> <!-- center-menu- inline-menu -->
                                <form action="<?php echo url('search'); ?>" method="GET" class="form">
                                    <li>
                                        <div class="input-field">
                                            <div id="usersCompaniesSearch2" class="search form focus">
                                                <label class="label-icon" for="search" style="color:#ffffff;"><i
                                                            class="material-icons notranslate">pin_drop</i></label>
                                                <input id="search" name="q" type="search"
                                                       value="<?php echo e(Request::segment(1) == 'search' ? Request::get('q') : ''); ?>"
                                                       placeholder="<?php echo e(trans('app.keyword')); ?>" class="prompt"
                                                       autocomplete="off">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <label for="datepicker" style="color:#ffffff;">
                                        <!--<img src="<?php echo e(asset('images/m2.png')); ?>" alt="m2">-->
                                            <i class="material-icons notranslate">date_range</i>
                                            <input id="datepicker" placeholder="Datum" name="date"
                                                   class="datepicker1 quantity" data-filter-todate="yes"
                                                   data-time="#sltime"
                                                   type="text" <?php echo e((Request::has('date')) ?  'value='.Request::has('date') : ''); ?>>
                                        </label>
                                    </li>
                                    <li>
                                        <!--<img src="images/m3.png" alt="m3">-->
                                        <i class="material-icons notranslate">watch_later</i>
                                        <select id="sltime" name="sltime" class="quantity option-white-bg">
                                            <?php 
                                                // Check time
                                                if (Request::segment(1) == 'search' && Request::has('sltime'))
                                                    $current_time=date('H:i', strtotime(Request::get('sltime')));
                                                else
                                                    $current_time = (isset($disabled[0])) ? $disabled[0] : '';

                                                $datetime = new DateTime();
                                             ?>


                                            <?php foreach($getTimes as $time): ?>
                                                <?php 
                                                    $timed = date_create_from_format('H:i',$time);
                                                 ?>
                                                <?php if($time >= '00:00' && $time >= '08:00' && $timed->getTimestamp() >= $datetime->getTimestamp()): ?>
                                                    <option value="<?php echo e($time); ?>" data-value="<?php echo e($time); ?>"
                                                            data-dd="0"><?php echo e($time); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($time); ?>" data-value="<?php echo e($time); ?>" data-dd="0"
                                                            style="display:none"><?php echo e($time); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </li>
                                    <li>
                                        <!--<img src="images/m4.png" alt="m4">-->
                                        <i class="material-icons notranslate">person</i>
                                        <?php 
                                            $current_p = ((Request::get('persons') != '') ? Request::get('persons') : (($userAuth && $userInfo->kids != 'null' && $userInfo->kids != NULL && $userInfo->kids != '[""]') ? $userInfo->kids : 2))
                                         ?>

                                        <select name="persons" class="quantity quantity-expand option-white-bg">
                                            <!-- <option value="0" disabled="disabled">Pers</option> -->
                                            <?php for($i = 1; $i <= 10; $i++): ?>
                                                <option value="<?php echo e($i); ?>"
                                                        data-value="<?php echo e($i); ?>" <?php echo e(($i == $current_p ) ? "selected" : ""); ?>><?php echo e($i); ?> <?php echo e($i == 1 ? 'persoon' : 'personen'); ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </li>
                                     <li class="mobile-center">
                                        <button class="zoek" id="searchDesktop" type="submit" style="font-weight: bold;">zoek</button>
                                    </li> 
                                    <?php if($userAuth): ?>
                                        <li>
                                            <a href="<?php echo e(url('account/reservations/saldo')); ?>" class="">Uw saldo:
                                                &euro; <?php echo e($userInfo->saldo); ?> </a>
                                        </li>
                                        <li data-content="Uitloggen">
                                            <a href="<?php echo e(url('logout')); ?>">
                                                <i class="sign out icon"></i>Uitloggen
                                            </a>
                                        </li>
                                    <?php else: ?>
                                        <li>
                                            <a id="registerButton" class="register button item" href="#">
                                                <div class="header_icons">
                                                    <img src="<?php echo e(asset('images/register_icon.png')); ?>" alt="question">
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="login button" data-type="login" href="#">
                                                <div class="header_icons">
                                                    <img src="<?php echo e(asset('images/login_icon.png')); ?>" alt="question">
                                                </div>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <li>
                                        <a href="<?php echo e(url('/faq')); ?>" class="question">
                                            <div class="header_icons">
                                                <img src="<?php echo e(asset('images/help_icon.png')); ?>" alt="question">
                                            </div>
                                        </a>
                                    </li>
                                    <li>
											<a class="dropdown-button blog-submenu-init notranslate" id="language" href="#!" data-activates="dropdown1">
												<img src="<?php echo e(asset('images/flags/')); ?>/<?php echo e($lang); ?>.png" alt="flag"> <?php echo e(strtoupper($lang)); ?> <i class="fa fa-angle-down" aria-hidden="true"></i>
											</a>
											<ul id="dropdown1" class="inline-menu submenu-ul dropdown-content notranslate">
												 <li><a href="<?php echo e(url('setlang/nl?redirect='.Request::url())); ?>" data-value="nl" class="item <?php echo e(isset($userInfo->id) ? 'change-login-user-language' : ''); ?>"><i class="nl flag"></i> NL</a></li>
												 <li><a href="<?php echo e(url('setlang/en?redirect='.Request::url())); ?>" data-value="en" class="item <?php echo e(isset($userInfo->id) ? 'change-login-user-language' : ''); ?>"><i class="gb flag"></i> EN</a></li>
												 <li><a href="<?php echo e(url('setlang/be?redirect='.Request::url())); ?>" data-value="be" class="item <?php echo e(isset($userInfo->id) ? 'change-login-user-language' : ''); ?>"><i class="be flag"></i> BE</a></li>
												 <li><a href="<?php echo e(url('setlang/de?redirect='.Request::url())); ?>" data-value="de" class="item <?php echo e(isset($userInfo->id) ? 'change-login-user-language' : ''); ?>"><i class="de flag"></i> DE</a></li>
												 <li><a href="<?php echo e(url('setlang/fr?redirect='.Request::url())); ?>" data-value="fr" class="item <?php echo e(isset($userInfo->id) ? 'change-login-user-language' : ''); ?>"><i class="fr flag"></i> FR</a></li>
											</ul>
										</li>
                                </form>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- menu end -->
            </div>
        </div>
    </div>

<!-- .container end -->
</header>
 <?php /*  <?php echo $__env->yieldContent("header_picture"); ?>  */ ?>
	    