 @inject('affiliateHelper', 'App\Helpers\AffiliateHelper')

 <div id="sliderImage" class="slider{{ Request::is('admin/*') == TRUE ? ' admin' : '' }}" style="{{ Route::getCurrentRoute()->uri() == '/' && $userAuth == FALSE ? '' : 'background-color: #000000;' }}">

    @if (Route::getCurrentRoute()->uri() == '/' && $userAuth == FALSE)
	<!--	
    <img class="background" src="{{ url('images/voordeelpas.jpg') }}" alt=""
         data-focus-left=".30" data-focus-top=".12" data-focus-right=".79" data-focus-bottom=".66" style="height: 450px!important;" />
   -->
   <section id="home" class="scroll-section root-sec grey lighten-5 home-wrap">
		<div class="sec-overlay">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="home-inner">
							<div class="center-align home-content">
								<h1 class="home-title">Activeer de spaarhulp en ontvang direct €5.- </h1>
								<h2 class="home-subtitle">Spaar nu automatisch bij wel 2000+ webshops. <br>
									Deze betalen u tot wel 10% dinertegoed bij iedere aankoop!</h2>
									<button class="button_action">Ja ik wil ook sparen!</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- .container end -->
				<div class="section-call-to-area">
					<div class="container">
						<div class="row">
							<a href="#activation" class="btn-floating btn-large button-middle call-to-about section-call-to-btn animated activation btn-show" data-section="#about">
								<i class="mdi-navigation-expand-more"></i>
							</a>
						</div>
					</div>
					<!-- .container end -->
				</div>
			</div>
	</section>
	@endif
	
	<section id="activation">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="col-sm-6 col2">
							<img src="{{ asset('images/laptop.png') }}" alt="laptop">
							<div class="text">
								<span class="start">Start nu en otvang!</span>
								<strong class="bax">€
									<strong class="number">5.-</strong></strong>
									<p>90 dagen geldig op alle menu’s van </p>
									<!-- <span class='crop'>UWvoordeelpas!</span> -->
								</div>
							</div>
							<div class="col-sm-6">
								<h1>Activeer de spaarhulp en ontvang direct €5.- </h1>
								<h4>Spaar nu automatisch bij wel 2000+ webshops. <br> Deze betalen u tot wel 10% dinertegoed bij iedere aankoop!</h4>
								<button class="button_action button_action2">Ja ik wil ook sparen!</button>
							</div>
					</div>
				</div>
			</div>
	</section>
   

   <!--- TO CHECK!!!! ON OLD SITE --->
	<section  style="display:none">
	  <div class="sliderImage" class="slider" style="background:#000;">
		<div class="container">

		@if (Route::getCurrentRoute()->uri() == '/' && $userAuth == FALSE)
		<div class="heading {{ Route::getCurrentRoute()->uri() == '/' && $userAuth == FALSE ? ' userLoggedOut' : 'userLoggedIn' }}">
			@if (Route::getCurrentRoute()->uri() == '/')
			<h1 class="noUppercase">{!! isset($contentBlock[1]) ? $contentBlock[1] : '' !!}</h1>
			@else
			<h2 class="noUppercase">{!! isset($contentBlock[1]) ? $contentBlock[1] : '' !!}</h2>
			@endif
		</div>
		@endif

		{{-- @if (Route::getCurrentRoute()->uri() == '/' AND ($userAuth && $userInfo->extension_downloaded == 1))--}}
		@if(Route::getCurrentRoute()->uri() != '/' ||  $userAuth == true)
			
		<!-- Desktop -->
			<div id="sliderDesktopForm" >
					<form action="<?php echo url('search'); ?>" method="GET" class="ui form">
						<div class="fields">
							<div class="field">
								<div id="usersCompaniesSearch2" class="ui search form">
									<div class="ui small icon input">
										<input class="prompt" type="text" name="q" value="{{ Request::segment(1) == 'search' ? Request::get('q') : '' }}" placeholder="{{ trans('app.keyword') }}" }}">
										<i class="location arrow icon"></i>
									</div>

									<div class="results"></div>
								</div>
							</div>

							<div class="field">
								<div class="ui small icon input">
									<input id="datepicker-search" type="text" name="date" class="pickadate search" placeholder="Datum" />
									<i class="calendar icon"></i>
								</div>
							</div>

							<div class="field">
								<div id="timeSliderField" class="ui normal selection tiny dropdown time searchReservation">
									@if (Request::segment(1) == 'search' && Request::has('sltime'))
									<input type="hidden" name="sltime" value="{{ date('H:i', strtotime(Request::get('sltime'))) }}">
									@else
									<input type="hidden" name="sltime" value="{{ isset($disabled[0]) ? $disabled[0] : '' }}">
									@endif 

									<i class="time icon"></i>
									<div class="default text">Tijd</div>
									<i class="dropdown icon"></i>

									<div class="menu">
										@foreach ($getTimes as $time)
										@if ($time >= '00:00' && $time >= '08:00')
										<div class="item" data-value="{{ $time }}" data-dd="0">{{ $time }}</div>
										@endif
										@endforeach
									</div>
								</div>
							</div>

							<div class="field">
								<div id="personsField2" class="ui normal selection dropdown">
									<input type="hidden" name="persons" value="{{ (Request::get('persons') != '' ? Request::get('persons') : ($userAuth && $userInfo->kids != 'null' && $userInfo->kids != NULL && $userInfo->kids != '[""]' ? $userInfo->kids : 2)) }}">

									<i class="male icon"></i>
									<div class="default text">Personen</div>
									<i class="dropdown icon"></i>

									<div class="menu">
										@for ($i = 1; $i <= 10; $i++)
										<div class="item" data-value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'persoon' : 'personen' }}</div>
										@endfor
									</div>
								</div>
							</div>

							<div class="four wide field">
								<button id="searchDesktop" class="ui blue fluid aligned center button no-radius filter" type="submit">
									<i class="search small icon"></i> Zoeken
								</button>
							</div>
						</div>
					</form>
			</div>
		<!-- Desktop -->

		<!-- Mobile -->
			<div id="sliderMobileTabletForm" class="ui grid container">
				<form action="<?php echo url('search'); ?>" method="GET" class="ui form">
					<div class="sixteen wide mobile sixteen wide tablet sixteen wide computer column">
						<div class="ui grid">
							<div class="row">
								<div class="sixteen wide mobile seven wide tablet seven wide computer column">
									<div class="ui action input">
										<div id="usersCompaniesSearch2-2" class="ui search form">
											<div class="ui icon input">
												<input class="prompt" type="text" name="q" value="{{ Request::segment(1) == 'search' ? Request::get('q') : '' }}" placeholder="{{ trans('app.keyword') }}" }}">
												<i class="location arrow icon"></i>
											</div>

											<div class="results"></div>
										</div>

										<div class="ui icon input">
											<input type="text" name="date" class="pickadate search" placeholder="Datum" data-value="{{ date('Y/m/d') }}" />
											<i class="calendar icon"></i>
										</div>
									</div>
								</div> 

								<div class="sixteen wide mobile seven wide tablet seven wide computer column">
									<div class="ui two columns no-padded grid">
										<div class="column">
											<div id="timeSliderField" class="ui normal fluid selection dropdown time searchReservation">
												@if (Request::segment(1) == 'search' && Request::has('sltime'))
												<input type="hidden" name="sltime" value="{{ date('H:i', strtotime(Request::get('sltime'))) }}">
												@else
												<input type="hidden" name="sltime" value="{{ isset($disabled[0]) ? $disabled[0] : '' }}">
												@endif 

												<i class="time icon"></i>
												<div class="default text">Tijd</div>
												<i class="dropdown icon"></i>

												<div class="menu">
													@foreach ($getTimes as $time)
													@if ($time >= '00:00' && $time >= '08:00')
													<div class="item" data-value="{{ $time }}" data-dd="0">{{ $time }}</div>
													@endif
													@endforeach
												</div>
											</div>

										</div>

										<div class="column">
											<div id="personsField2" class="ui normal fluid input selection dropdown">
												<input type="hidden" name="persons" value="{{ (Request::get('persons') != '' ? Request::get('persons') : ($userAuth && $userInfo->kids != 'null' && $userInfo->kids != NULL && $userInfo->kids != '[""]' ? $userInfo->kids : 2)) }}">
												<i class="male icon"></i>

												<div class="default text">Personen</div>
												<i class="dropdown icon"></i>

												<div class="menu">
													@for ($i = 1; $i <= 10; $i++)
													<div class="item" data-value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'persoon' : 'personen' }}</div>
													@endfor
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="two wide column">
									<div class="large screen only row">
										<button id="searchDesktop" class="ui blue fluid text aligned center button no-radius  filter" type="submit">
											<i class="search small icon"></i>
										</button>
									</div>
								</div>
							</div>

							<div id="mobileSliderSearchButton" class="ui two buttons">
								<button class="ui blue fluid text aligned center button no-radius  filter" type="submit">ZOEK</button>

								@if (Request::path() == '/' || Request::path() == 'search')
								<button class="ui blue button no-radius display filter" type="submit">UITGEBREID</button>
								@else
								<a href="{{ url('/?mobilefilter=1') }}" class="ui blue button no-radius">UITGEBREID</a>
								@endif
							</div>
						</div>
					</div>
				</form>
			</div>
		<!-- Mobile -->
		
		@endif
		</div>
	  </div>	
	</section>
<!--
    @if (Route::getCurrentRoute()->uri() != '/' AND ($userAuth && $userInfo->extension_downloaded == 1))
    {{--<ul id="flexiselDemo1">--}}
    {{--@foreach($topAffiliates as $key => $aff)--}}
    {{--<li>--}}
    {{--<div class="ui basic segment">--}}
    {{--<a id="{{ $key }}" href="{{ url('tegoed-sparen/company/'.$aff->slug) }}">--}}
    {{--<div class="logoHeight">--}}
    {{--@if (file_exists(public_path('images/affiliates/'.$aff->affiliate_network.'/'.$aff->program_id.'.'.$aff->image_extension)))--}}
    {{--<img class="ui huge image"--}}
    {{--alt="{{ $aff->title }}"--}}
    {{--src="{{ url('images/affiliates/'.$aff->affiliate_network.'/'.$aff->program_id.'.'.$aff->image_extension) }}">--}}
    {{--@else--}}
    {{--<img class="ui huge image"--}}
    {{--alt="{{ $aff->title }}"--}}
    {{--src="{{ url('images/placeholder.png') }}">--}}
    {{--@endif--}}
    {{--</div>--}}

    {{--<span data-html="{!! isset($contentBlock[54]) ? $contentBlock[54] : '' !!}" class="ui bottom right attached label visible tool hover">{{ $affiliateHelper->commissionMaxValue($aff->compensations) }}</span>--}}
	{{--</a>--}}
	{{--</div>--}}

	{{--<div class="clear"></div><br>--}}
	{{--<small><span class="hide mobile device">max.</span> spaartegoed</small>--}}
	{{--</li>--}}
	{{--@endforeach--}}
	{{--</ul>--}}

	<div class="clear"></div>
	@endif
-->
	@if (Route::getCurrentRoute()->uri() == '/' && $userAuth == FALSE)
	<section id="how_it_works">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1>Hoe werkt het?</h1>
					<div class="col-sm-3 coll">
					 <a href="{{ url('tegoed-sparen') }}">
						<img src="{{ url('images/how_it_works_1.png') }}"  alt="{{ isset($contentBlock[49]) ? strip_tags($contentBlock[49]) : '1. Shopt u ook online?' }}">
						{!! isset($contentBlock[49]) ? $contentBlock[49] : '1. Shopt u ook online?' !!}
						<!-- <p>uw online aankoop<br>begint hier!</p> -->
					  </a>
					</div>
					<div class="col-sm-3 coll">
					  <a href="{{ url('tegoed-sparen') }}">
						<img src="{{ url('images/how_it_works_2.png') }}" alt="{{ isset($contentBlock[50]) ? strip_tags($contentBlock[50]) : '2. Spaar bij 1500+ Webshops!' }}">
						{!! isset($contentBlock[50]) ? $contentBlock[50] : '2. Spaar bij 2000+ Webshops!' !!}
						<!-- <p>U spaart tot vel 10%<br>van uw aankoop</p> -->
					  </a>
					</div>
					<div class="col-sm-3 coll">
					  <a href="{{ url('search') }}">
						<img src="{{ url('images/how_it_works_3.png') }}" alt="{{ isset($contentBlock[51]) ? strip_tags($contentBlock[51]) : '3. Reserveer met uw spaartegoed!' }}">
						{!! isset($contentBlock[51]) ? $contentBlock[51] : '3. Reserveer met uw spaartegoed!' !!}
						<!-- <p>reserveer direct<br>bij veel restaurants</p> -->
					  </a>
					</div>
					<div class="col-sm-3 coll">
					 <a href="{{ url('tegoed-sparen') }}">
						<img src="{{ url('images/how_it_works_4.png') }}" alt="{{ isset($contentBlock[52]) ? strip_tags($contentBlock[52]) : '4. Geniet van uw spaartegoed!' }}">
						{!! isset($contentBlock[52]) ? $contentBlock[52] : '4. Geniet van uw spaartegoed!' !!}
						<!-- <p>u betaald heel simpel<br>met uw spaargeld</p> -->
					  </a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="clear"></div>
	@endif

	{{--        @if (Route::getCurrentRoute()->uri() == '/' && $userAuth == FALSE)--}}
	@if((Route::getCurrentRoute()->uri() == '/' && $userAuth == true) OR (Route::getCurrentRoute()->uri() == '/' && $userAuth && $userInfo->extension_downloaded == 0))

		<!--
	<div class="homepage_block_container">
		<div class="homepage_block_1">
			<a href="">
				<img style=" width: auto; height: 315px;" src="{{ url('images/landingpage_notebook.jpeg') }}">
			</a>
		</div>
		@if($userAuth && $userInfo->extension_downloaded == 0)
		<div class="homepage_block_2">

			<h3 style="color: #808080; margin: 48px 29px 0px 0px; font-size: 1.9em; text-align: center;"><em>"Wilt u na 1 klik automatisch tot<br> wel 10% sparen bij 2000+ webshops?"</em></h3>
			<?php @$browser = Session::get('browser'); ?>                
			@if(strtolower($browser['name']) == 'chrome')
			<script type="text/javascript">
				function chromeInstallFunction() {
					chrome.webstore.install('https://chrome.google.com/webstore/detail/kfnndmokhnlhhblfedaeebnonfjbihpo', function () {
	//                    alert('success');
					}, function(error, errorCode) {
	//                    alert(errorCode + "-----------" + error);
					})
					return false;
				};
			</script>
			@endif 
			@if(strtolower($browser['name']) == 'firefox')               
			<a  style="margin-top: 80px; display: inline-block;" class="homepage_btn install {{$browser['name']}}" 
				href="/firefox.xpi" iconURL="/images/icons/android-icon-48x48.png">Ja! Ik wil gratis sparen!</a>
			@endif
			@if(strtolower($browser['name']) == 'chrome')
			<a href="#" onclick="chromeInstallFunction();" id="install-button" style="margin-top: 80px; display: inline-block;" class="homepage_btn install {{$browser['name']}}">Ja! Ik wil gratis sparen!</a>
			@endif

		</div> -->
		@endif
		<span style="clear: both;"></span>
	</div>

  @endif

</div>


