@php
	$isGrey = ( Route::getCurrentRoute()->uri() != '/');
	$headerImg = request()->has("layout") && request()->get("layout") === "grid";
@endphp
<header id="navigation" class="{{ $headerImg ? "" : "root-sec white nav" .  (($isGrey) ) ? 'header_grey' : '' }} "> <!--   -->
	<div class="{{ $headerImg ? "header" : "" }}">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="nav-inner">
						<nav class="primary-nav">
							@include('template.sidemenu')

							<div class="clearfix nav-wrapper">
								@if($userAuth)
									<a href="{{ url('/home') }}" class="brand-logo">
										@else
											<a href="{{ url('/') }}" class="brand-logo">
												@endif
												<img src="{{ (($isGrey) ) ? asset('images/logo_grey.png') : asset('images/logo.png') }}" alt="" class="responsive-img">
											</a>
											<ul class="inline-menu side-nav" id="mobile-demo">
												@if($userAuth)
													<li><a href="{{ url('account/reservations/saldo') }}" class="">Uw saldo: &euro; {{$userInfo->saldo }} </a></li>
													<li data-content="Uitloggen"><a href="{{ url('logout') }}"><i class="sign out icon"></i>Uitloggen</a></li>
												@else
													<li><a id="registerButton" class="register button item" href="#" title="Aanmelden"><div class="header_icons"><img src="{{ asset('images/register_icon.png') }}" alt="question"></div></a>
													</li>
													<li><a class="login button" data-type="login" href="#" title="Inloggen"><div class="header_icons"><img src="{{ asset('images/login_icon.png') }}" alt="question"></div> </a></li>
												@endif
												<li>
													<a href="{{ url('/faq') }}" class="question" title="Help"><div class="header_icons"><img src="{{ asset('images/help_icon.png') }}" alt="question"></div> </a>
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

							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
@yield("header_picture")
<!-- .container end -->
</header>