 <header id="navigation" class="root-sec white nav {{ ( Route::getCurrentRoute()->uri() != '/' || $userAuth == TRUE )  ? 'header2' : '' }} ">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="nav-inner">
							<nav class="primary-nav">
								<div class="clearfix nav-wrapper">
									<a href="{{ url('/') }}" class="left brand-logo menu-smooth-scroll" data-section="#home">
										<img src="{{ url('images/logo.png') }}">
									</a>
									
									<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
									<ul class="right static-menu">

										<li>
											<a class="dropdown-button blog-submenu-init" id="language" href="#!" data-activates="dropdown1">
												<img src="{{ asset('images/flag.png') }}" alt="flag"> NL <i class="fa fa-angle-down" aria-hidden="true"></i>
											</a>
										</li>
										<li>
											<a id="#" class="item search-full-open"><i class="mdi-action-search"></i> </a>											
										</li>
										<!-- <li class="search-form-li">
											<a id="initSearchIcon" class=""><i class="mdi-action-search"></i> </a>
											<div class="search-form-wrap hide">
												<form action="#" class="">
													<input class="search" type="search">
													<button type="submit"><i class="mdi-action-search"></i>
													</button>
												</form>
											</div> 
										</li> -->
<!-- 										<li>
											<a href="#" data-activates="dropdown2" class='button-collapse2'>
												<i class="material-icons material-icons2">menu</i>
											</a>
										</li> -->
									</ul>

									<ul class="inline-menu side-nav" id="mobile-demo">

										<!-- Mini Profile // only visible in Tab and Mobile -->
										<li class="mobile-profile">
											<div class="profile-inner">
												<div class="pp-container">
													<img src="{{ asset('images/logo.png') }}" alt="">
												</div>
											</div>
										</li><!-- mini profile end-->

										 @if($userAuth)
											<li ><a href="{{ url('account/reservations/saldo') }}" class="">Uw saldo: &euro; {{$userInfo->saldo }} </a></li>
											<li data-content="Uitloggen"><a href="{{ url('logout') }}"><i class="sign out icon"></i>Signout</a></li>
										@else
											<li><a id="registerButton" class="register button item" href="#">Aanmelden</a></li>
											<li><a class="login button" data-type="login" href="#" >Inloggen</a></li>
										@endif 
										<li><a href="#" class="question">Help <div class="question2"><img src="{{ asset('images/question.png') }}" alt="question"></div> <i class="fa fa-question-circle-o" aria-hidden="true"></i></a>
										</li>

									</ul>

									<ul id="slide-out" class="side-nav2 right-aligned" style="overflow:auto" >
										<li><a href="{{ url('news') }}"><i class="material-icons">assignment</i> Nieuws</a></li>
										<li><a href="{{ url('tegoed-sparen') }}"><i class="material-icons">monetization_on</i> Tegoed sparen</a></li>
										<li><a href="{{ url('voordeelpas/buy') }}"><i class="material-icons">credit_card</i> Voordeelpas</a></li>
										 @if($userCompany OR $userWaiter)
										 <li><a href="{{ url('faq/3/restaurateurs') }}"><i class="material-icons">help</i> Veelgestelde vragen</a></li>
										@else
										 <li><a href="{{ url('faq/2/restaurateurs') }}"><i class="material-icons">help</i> Veelgestelde vragen</a></li>
										@endif
									
										<li><a href="#" class="item search-full-open"><i class="material-icons">search</i> Zoeken</a></li>
										@if($userAuth)
										
										    @if( $userCompany != 1 && $userWaiter != 1 )
											<li class="fixed-row">
											   <a class="active">
											      {{ ($userInfo->name != '' ? strtoupper($userInfo->name) : 'Gebruiker') }}
												</a>
											</li>
											<li>
												<a href="{{ url('account/reservations/saldo') }}" class="item">
													<i class="material-icons">euro_symbol</i><strong>Spaartegoed:</strong> {{$userInfo->saldo }}
												</a>
											</li>
											<li><a href="{{ url('payment/charge') }}" ><i class="material-icons">euro_symbol</i> Saldo opwaarderen</a></li>
											<li><a href="{{ url('account') }}" ><i class="material-icons">euro_symbol</i> Mijn gegevens</a></li>
											<li><a href="{{ url('account/reviews') }}" ><i class="material-icons">thumb_up</i> Mijn recensies</a></li>
											<li><a href="{{ url('account/reservations') }}" ><i class="material-icons">local_dining</i> Mijn reserveringen</a></li>
											<li><a href="{{ url('account/barcodes') }}" ><i class="material-icons">reorder</i> Mijn voordeelpas</a></li>
											<li><a href="{{ url('account/favorite/companies') }}" ><i class="material-icons">favorite_border</i> Mijn favoriete restaurants</a></li>
											<li><a href="{{ url('logout') }}" ><i class="material-icons">touch_app</i> Uitloggen</a></li>
											@endif
											
											@inject('companyReservation', 'App\Models\CompanyReservation')           
											@include('template/navigation/company')
											@include('template/navigation/callcenter')
											@include('template/navigation/admin')
											<li class="divider"> </li>
										@else 										
											<li><a id="registerButton2" class="register button item" href="#" ><i class="material-icons">vpn_key</i> Aanmelden</a></li>
											<li><a class="login button" data-type="login" href="#"><i class="material-icons">exit_to_app</i> Inloggen</a></li>
											<li><a href="{{ url('hoe-werkt-het') }}"><i class="material-icons">description</i> Hoe werkt het?</a></li>
											<li><a href="{{ url('algemene-voorwaarden') }}"><i class="material-icons">book</i> Voorwaarden</a></li>
									    @endif
									</ul>
									<a href="#" data-activates="slide-out" class="button-collapse2"><i class="material-icons material-icons2">menu</i></a>

									<ul id="dropdown1" class="inline-menu submenu-ul dropdown-content">
										 <li><a href="{{ url('setlang/nl?redirect='.Request::url()) }}" data-value="nl" class="item"><i class="nl flag"></i> NL</a></li>
                                         <li><a href="{{ url('setlang/en?redirect='.Request::url()) }}" data-value="en" class="item"><i class="gb flag"></i> EN</a></li>
                                         <li><a href="{{ url('setlang/be?redirect='.Request::url()) }}" data-value="be" class="item"><i class="be flag"></i> BE</a></li>
                                         <li><a href="{{ url('setlang/de?redirect='.Request::url()) }}" data-value="de" class="item"><i class="de flag"></i> DE</a></li>
                                         <li><a href="{{ url('setlang/fr?redirect='.Request::url()) }}" data-value="fr" class="item"><i class="fr flag"></i> FR</a></li>
									</ul>

								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- .container end -->
		</header>