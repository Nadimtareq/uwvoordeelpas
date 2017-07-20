 <?php 
   $isGrey = ( Route::getCurrentRoute()->uri() != '/')
  ?>
 <header id="navigation" class="root-sec white nav <?php echo e((($isGrey) ) ? 'header_grey' : ''); ?> "> <!--   -->
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="nav-inner">
							<nav class="primary-nav">
								<?php echo $__env->make('template.sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
								
								<div class="clearfix nav-wrapper">
									<?php if($userAuth): ?>
										<a href="<?php echo e(url('/home')); ?>" class="brand-logo">
									<?php else: ?>
										<a href="<?php echo e(url('/')); ?>" class="brand-logo">
									<?php endif; ?>
									<img src="<?php echo e((($isGrey) ) ? asset('images/logo_grey.png') : asset('images/logo.png')); ?>" alt="" class="responsive-img">
									</a>
									<ul class="inline-menu side-nav" id="mobile-demo">
										 <?php if($userAuth): ?>
									<li><a href="<?php echo e(url('account/reservations/saldo')); ?>" class="">Uw saldo: &euro; <?php echo e($userInfo->saldo); ?> </a></li>
											<li data-content="Uitloggen"><a href="<?php echo e(url('logout')); ?>"><i class="sign out icon"></i>Uitloggen</a></li>
										<?php else: ?>
											<li><a id="registerButton" class="register button item" href="#" title="Aanmelden"><div class="header_icons"><img src="<?php echo e(asset('images/register_icon.png')); ?>" alt="question"></div></a>
											</li>
											<li><a class="login button" data-type="login" href="#" title="Inloggen"><div class="header_icons"><img src="<?php echo e(asset('images/login_icon.png')); ?>" alt="question"></div> </a></li>
										<?php endif; ?> 
										<li>
										  <a href="<?php echo e(url('/faq')); ?>" class="question" title="Help"><div class="header_icons"><img src="<?php echo e(asset('images/help_icon.png')); ?>" alt="question"></div> </a>
										</li>
										<li>
											<a class="dropdown-button blog-submenu-init" id="language" href="#!" data-activates="dropdown1">
												<img src="<?php echo e(asset('images/flag.png')); ?>" alt="flag"> NL <i class="fa fa-angle-down" aria-hidden="true"></i>
											</a>
											<ul id="dropdown1" class="inline-menu submenu-ul dropdown-content">
												 <li><a href="<?php echo e(url('setlang/nl?redirect='.Request::url())); ?>" data-value="nl" class="item"><i class="nl flag"></i> NL</a></li>
												 <li><a href="<?php echo e(url('setlang/en?redirect='.Request::url())); ?>" data-value="en" class="item"><i class="gb flag"></i> EN</a></li>
												 <li><a href="<?php echo e(url('setlang/be?redirect='.Request::url())); ?>" data-value="be" class="item"><i class="be flag"></i> BE</a></li>
												 <li><a href="<?php echo e(url('setlang/de?redirect='.Request::url())); ?>" data-value="de" class="item"><i class="de flag"></i> DE</a></li>
												 <li><a href="<?php echo e(url('setlang/fr?redirect='.Request::url())); ?>" data-value="fr" class="item"><i class="fr flag"></i> FR</a></li>
											</ul>
										</li>
										<li>
											<a id="#" class="item search-full-open"><i class="mdi-action-search"></i> </a>											
										</li>
									</ul>

								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- .container end -->
		</header>