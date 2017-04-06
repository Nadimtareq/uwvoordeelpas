@inject('affiliateHelper', 'App\Helpers\AffiliateHelper')
<div id="sliderImage" class="slider{{ Request::is('admin/*') == TRUE ? ' admin' : '' }}" style="{{ Route::getCurrentRoute()->uri() == '/' && $userAuth == FALSE ? '' : 'background-color: #000000;' }}">

    @if (Route::getCurrentRoute()->uri() == '/' && $userAuth == FALSE)
    <img class="background" src="{{ url('images/voordeelpas.jpg') }}" alt=""
         data-focus-left=".30" data-focus-top=".12" data-focus-right=".79" data-focus-bottom=".66" style="height: 450px!important;" />
    @endif

    <div class="container">

        <div class="info" style="{{ Route::getCurrentRoute()->uri() == '/' && $userAuth == FALSE ? '' : 'padding-top: 10px !important;' }}">

            @if (Route::getCurrentRoute()->uri() == '/' && $userAuth == FALSE)
            <div class="heading {{ Route::getCurrentRoute()->uri() == '/' && $userAuth == FALSE ? ' userLoggedOut' : 'userLoggedIn' }}">
                @if (Route::getCurrentRoute()->uri() == '/')
                <h1 class="noUppercase">{!! isset($contentBlock[1]) ? $contentBlock[1] : '' !!}</h1>
                @else
                <h2 class="noUppercase">{!! isset($contentBlock[1]) ? $contentBlock[1] : '' !!}</h2>
                @endif
            </div>
            @endif

            {{--            @if (Route::getCurrentRoute()->uri() == '/' AND ($userAuth && $userInfo->extension_downloaded == 1))--}}
            @if ($userAuth)
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
                            <button id="searchDesktop" class="ui blue text fluid aligned center button no-radius filter" type="submit">
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

        @if (Route::getCurrentRoute()->uri() == '/n234d' && $userAuth == FALSE)
        <?php echo Form::open(array('url' => 'search-redirect', 'class' => 'ui form', 'method' => 'post')) ?>
        <div id="searchLoggedOut" class="ui grid">
            <div class="row">
                <div class="sixteen wide mobile eight wide computer column">
                    <div id="affiliateSearch-1" class="ui search">
                        <div class="ui icon fluid input">
                            <input type="text" class="prompt" name="q" placeholder="In welke webshop wilt u een aankoop gaan doen?">
                            <i class="search link icon"></i>
                        </div>

                        <div class="results"></div>
                    </div>
                </div>

                <div class="sixteen wide mobile four wide computer column">
                    <?php
                    echo Form::select(
                            'page', array(
                        'restaurant' => 'Restaurants',
                        'saldo' => 'Tegoed sparen',
                        'faq' => 'Veelgestelde vragen'
                            ), 'saldo', array('class' => 'ui fluid normal dropdown searchRedirectCategories')
                    );
                    ?>
                </div>

                <div class="sixteen wide mobile four wide computer column">
                    <button id="sliderSubmitButton" class="ui button blue fluid">
                        Spaar direct
                    </button>
                </div>
            </div>
        </div>

        <?php echo Form::close(); ?>
        <div id="howBlockContainer">
            <ul id="howBlock">
                <li>
                    <a href="{{ url('tegoed-sparen') }}">
                        <img src="{{ url('images/step-1.png') }}" alt="{{ isset($contentBlock[49]) ? strip_tags($contentBlock[49]) : '1. Shopt u ook online?' }}">
                        <h5>{!! isset($contentBlock[49]) ? $contentBlock[49] : '1. Shopt u ook online?' !!}</h5>
                    </a>
                </li>
                <li>
                    <a href="{{ url('tegoed-sparen') }}">
                        <img src="{{ url('images/step-2.png') }}" alt="{{ isset($contentBlock[50]) ? strip_tags($contentBlock[50]) : '2. Spaar bij 1500+ Webshops!' }}">
                        <h5>{!! isset($contentBlock[50]) ? $contentBlock[50] : '2. Spaar bij 2000+ Webshops!' !!}</h5>
                    </a>
                </li>
                <li>
                    <a href="{{ url('search') }}">
                        <img src="{{ url('images/step-3.png') }}" alt="{{ isset($contentBlock[51]) ? strip_tags($contentBlock[51]) : '3. Reserveer met uw spaartegoed!' }}">
                        <h5>{!! isset($contentBlock[51]) ? $contentBlock[51] : '3. Reserveer met uw spaartegoed!' !!}</h5>
                    </a>
                </li>
                <li>
                    <a href="{{ url('tegoed-sparen') }}">
                        <img src="{{ url('images/step-4.png') }}" alt="{{ isset($contentBlock[52]) ? strip_tags($contentBlock[52]) : '4. Geniet van uw spaartegoed!' }}">
                        <h5>{!! isset($contentBlock[52]) ? $contentBlock[52] : '4. Geniet van uw spaartegoed!' !!}</h5>
                    </a>
                </li>
            </ul>
        </div>

        <div class="clear"></div>
        @endif

        {{--        @if (Route::getCurrentRoute()->uri() == '/' && $userAuth == FALSE)--}}
        @if ((Route::getCurrentRoute()->uri() == '/' && $userAuth == FALSE) OR (Route::getCurrentRoute()->uri() == '/' && $userAuth && $userInfo->extension_downloaded == 0))



        <div class="homepage_block_container">
            <div class="homepage_block_1">
                <a href="">
                    <img style=" width: auto; height: 315px;" src="{{ url('images/landingpage_notebook.jpeg') }}">
                </a>
            </div>

            <div class="homepage_block_2">

                <h3 style="color: #808080; margin: 48px 29px 0px 0px; font-size: 1.9em; text-align: center;"><em>"Wilt u na 1 klik automatisch tot<br> wel 10% sparen bij 2000+ webshops?"</em></h3>
                <?php @$browser = Session::get('browser'); ?>
               
                    <a  style="margin-top: 80px; display: inline-block;" class="homepage_btn install {{$browser['name']}}" 
                        href="">Ja! Ik wil gratis sparen!</a>
               
            </div>

            <span style="clear: both;"></span>

        </div>



        @endif

    </div>
</div>

