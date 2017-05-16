<header id="navigation" class="root-sec white nav header">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="nav-inner">
							<nav class="primary-nav">
								<div class="clearfix nav-wrapper">
								 <form action="<?php echo url('search'); ?>" method="GET" class="form">
									
									<a href="{{ url('/')}}" class="left brand-logo menu-smooth-scroll" data-section="#home">
									   <img src="{{asset('images/logo.png')}}" alt="">
									</a>
									
									 <div class="mobile-profile pp-container">
										<a href="{{ url('/')}}">
											<img src="{{ asset('images/logo.png') }}" alt="">
										 </a>
									 </div>
									
										<!-- <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>-->
										<!-- <ul class="right static-menu right-no">
										  <li class="search-form-li sk">										  
										    <div class="input-field">
											  <label class="label-icon" for="search"><i class="mdi-action-search sss"></i></label>											
											  <input id="search" name="q" type="search" value="{{ Request::segment(1) == 'search' ? Request::get('q') : '' }}" placeholder="{{ trans('app.keyword') }}" >
											</div>
											  DELETED  <a id="initSearchIcon" class="search_"><i class="mdi-action-search sss"></i>
												Proin gravida nibh elit ... </a>
												<div class="search-form-wrap hide">
													<form action="#" class="">
														<input class="search" type="search">
														<button type="submit"><i class="mdi-action-search"></i>
														</button>
													</form>
												</div> 
											</li>
										</ul> -->

										<ul class="inline-menu side-nav center-menu" id="mobile-demo">

											<!-- Mini Profile // only visible in Tab and Mobile -->
											<!-- <li class="mobile-profile">
												<div class="profile-inner">
													<div class="pp-container">
														<img src="images/logo.png" alt="">
													</div>
												</div>
											</li> --> <!-- mini profile end-->

											<li class="search-form-li sk">										  
												<div class="input-field">
													<label class="label-icon" for="search"><i class="mdi-actio2n-search sss"></i></label>											
													<input id="search" name="q" type="search" value="{{ Request::segment(1) == 'search' ? Request::get('q') : '' }}" placeholder="{{ trans('app.keyword') }}" >
												</div>
											</li>
											
											<li>
												<label for="datepicker">
													<img src="{{asset('images/m2.png') }}" alt="m2">
													<input id="datepicker" placeholder="Datum" name="date" class="datepicker1 quantity" type="text">
												</label>
											</li>
											<li><img src="images/m3.png" alt="m3">
												<select name="sltime" class="quantity">
												   <!-- <option value="0" disabled="disabled" >Tijd</option>-->
												   @foreach ($getTimes as $time)
														@if ($time >= '00:00' && $time >= '08:00')
														<option value="{{ $time }}" data-value="{{ $time }}" data-dd="0">{{ $time }}</option>
														@endif
													@endforeach
												</select>
											</li>
											<li><img src="images/m4.png" alt="m4">
												<select name="persons" class="quantity">
													<!-- <option value="0" disabled="disabled">Pers</option> -->
													  @for ($i = 1; $i <= 10; $i++)
														<option  value="{{ $i }}" data-value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'persoon' : 'personen' }}</option>
													  @endfor
												</select>												
											</li>
											<li>
											    <button class="zoek" id ="searchDesktop" type="submit">zoek</button>
											</li>
										</ul>
										
										@if($userAuth)
										<!--	<ul class="inline-menu side-nav">
												<li data-content="Uitloggen"><a href="{{ url('logout') }}"><i class="sign out icon"></i>Signout</a></li>
											</ul>  -->
										@endif 
										
										@include('template.sidemenu')
										
										
									</form>
								</div>
								 
							   </nav>
							</div>
						</div>
					</div>
				</div>
				<!-- .container end -->
			</header>