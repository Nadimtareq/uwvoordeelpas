 <header id="navigation" class="root-sec white nav {{ ( Route::getCurrentRoute()->uri() != '/' || $userAuth == TRUE )  ? 'header2' : '' }} ">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="nav-inner">
							<nav class="primary-nav">
								<div class="clearfix nav-wrapper">
								
									<a href="{{ url('/') }}" class="left brand-logo menu-smooth-scroll pp-container" data-section="#home">
										<img src="{{ url('images/logo.png') }}">
									</a>
									
									<div class="mobile-profile pp-container">
										<img src="{{ asset('images/logo.png') }}" alt="">
									</div>
									
									 <!-- <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>-->
								<!--	<ul class="right static-menu">
										<li>
											<a class="dropdown-button blog-submenu-init" id="language" href="#!" data-activates="dropdown1">
												<img src="{{ asset('images/flag.png') }}" alt="flag"> NL <i class="fa fa-angle-down" aria-hidden="true"></i>
											</a>
										</li>
										<li>
											<a id="#" class="item search-full-open"><i class="mdi-action-search"></i> </a>											
										</li>
									
									</ul> -->

									<ul class="inline-menu side-nav" id="mobile-demo">

										<!-- Mini Profile // only visible in Tab and Mobile -->
										<!-- <li class="mobile-profile">
											<div class="profile-inner">
												<div class="pp-container">
													<img src="{{ asset('images/logo.png') }}" alt="">
												</div>
											</div> 
										</li> -->

										 @if($userAuth)
											<li><a href="{{ url('account/reservations/saldo') }}" class="">Uw saldo: &euro; {{$userInfo->saldo }} </a></li>
											<li data-content="Uitloggen"><a href="{{ url('logout') }}"><i class="sign out icon"></i>Uitloggen</a></li>
										@else
											<li><a id="registerButton" class="register button item" href="#">Aanmelden</a></li>
											<li><a class="login button" data-type="login" href="#" >Inloggen</a></li>
										@endif 
										<li>
										  <a href="#" class="question">Help <div class="question2"><img src="{{ asset('images/question.png') }}" alt="question"></div> <i class="fa fa-question-circle-o" aria-hidden="true"></i></a>
										</li>
										<li>
											<a class="dropdown-button blog-submenu-init" id="language" href="#!" data-activates="dropdown1">
												<img src="{{ asset('images/flag.png') }}" alt="flag"> NL <i class="fa fa-angle-down" aria-hidden="true"></i>
											</a>
											<ul id="dropdown1" class="inline-menu submenu-ul dropdown-content">
												 <li><a href="{{ url('setlang/nl?redirect='.Request::url()) }}" data-value="nl" class="item"><i class="nl flag"></i> NL</a></li>
												 <li><a href="{{ url('setlang/en?redirect='.Request::url()) }}" data-value="en" class="item"><i class="gb flag"></i> EN</a></li>
												 <li><a href="{{ url('setlang/be?redirect='.Request::url()) }}" data-value="be" class="item"><i class="be flag"></i> BE</a></li>
												 <li><a href="{{ url('setlang/de?redirect='.Request::url()) }}" data-value="de" class="item"><i class="de flag"></i> DE</a></li>
												 <li><a href="{{ url('setlang/fr?redirect='.Request::url()) }}" data-value="fr" class="item"><i class="fr flag"></i> FR</a></li>
											</ul>
										</li>
										<li>
											<a id="#" class="item search-full-open"><i class="mdi-action-search"></i> </a>											
										</li>
									</ul>

																	
									
									@include('template.sidemenu')
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- .container end -->
		</header>