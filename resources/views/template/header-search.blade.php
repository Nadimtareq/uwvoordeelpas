<header id="navigation" class="root-sec white nav header">
			 <div class="container">
				<div class="row">
					<div class="col-sm-12">
					
						<div class="nav-inner nav-extended">
							<nav class="primary-nav">
							  <div class="navbar-fixed">
								<div class="nav-wrapper">
								 <form action="<?php echo url('search'); ?>" method="GET" class="form">
								 	@include('template.sidemenu')
									
									<!-- <a href="{{ url('/')}}" class="left brand-logo menu-smooth-scroll" data-section="#home">
									   <img src="{{asset('images/logo.png')}}" alt="">
									</a>
									
									 <div class="mobile-profile pp-container">
										<a href="{{ url('/')}}">
											<img src="{{ asset('images/logo.png') }}" alt="">
										 </a>
									 </div> -->
										<a href="{{ url('/')}}" class="brand-logo"><img src="{{ asset('images/logo.png') }}" alt="" class="responsive-img"></a>																	
									   <!-- <a href="#" data-activates="mobile-top" class="button-collapse"> <i class="material-icons material-icons2">menu</i></a> -->
									 
										<ul class="right side-nav" id="mobile-top"> <!-- center-menu- inline-menu -->

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
											<li>
												<img src="images/m3.png" alt="m3">
												<select name="sltime" class="quantity">
													@php
														// Check time
														if (Request::segment(1) == 'search' && Request::has('sltime')) 
															$current_time=date('H:i', strtotime(Request::get('sltime')));
														else	
															$current_time = (isset($disabled[0])) ? $disabled[0] : '';
														
														$datetime = new DateTime();												
													@endphp
											  
												   @foreach ($getTimes as $time)
														@php  
															$timed = date_create_from_format('H:i',$time);															
														@endphp
														@if ($time >= '00:00' && $time >= '08:00' && $timed->getTimestamp() >= $datetime->getTimestamp())
															<option value="{{ $time }}" data-value="{{ $time }}" data-dd="0" {!! ($current_time == $time) ? "selected" : "" !!}>{{ $time }}</option>												
														@endif													
													@endforeach
												</select>
											</li>
											<li>
												<img src="images/m4.png" alt="m4">
												@php  
												   $current_p = ((Request::get('persons') != '') ? Request::get('persons') : (($userAuth && $userInfo->kids != 'null' && $userInfo->kids != NULL && $userInfo->kids != '[""]') ? $userInfo->kids : 2))
												@endphp
											
												<select name="persons" class="quantity quantity-expand">
													<!-- <option value="0" disabled="disabled">Pers</option> -->
													  @for ($i = 1; $i <= 10; $i++)
														<option  value="{{ $i }}" data-value="{{ $i }}" {{ ($i == $current_p ) ? "selected" : "" }}>{{ $i }} {{ $i == 1 ? 'persoon' : 'personen' }}</option>
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
										
									
										
										
									</form>
								</div>
								</div>
							   </nav>
						</div>
						<!-- menu end -->
						
						</div>
					</div>
				</div> 
				<!-- .container end -->				

</header>
	
	    