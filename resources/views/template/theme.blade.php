<!DOCTYPE html>
<html lang="nl">
<head>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Reserveer in enkele stappen met uw spaartegoed!' }} - UwVoordeelpas</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/icons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/icons/android-icon-192x192.png') }}">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="{{ asset('images/icons/favicon-16x16.png') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css?rand='.str_random(40)) }}">
    <link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
     <script src="{{ asset('js/jsBarcode/dist/JsBarcode.all.js') }}"></script>
    @yield('styles')

    <link rel="shortcut icon" sizes="144x144" href="launcher-icon-3x.png"> 
    <link rel="shortcut icon" sizes="144x144" href="launcher-icon-3x.png">
    <meta name="mobile-web-app-capable" content="yes">
   <link rel="chrome-webstore-item" href="https://chrome.google.com/webstore/detail/idnomlffdbadkainngpiabkecmapeaad">
    <meta name="robots" content="nofollow" />
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="{{ isset($metaDescription) ? strip_tags($metaDescription) : 'Reserveer in enkele stappen met uw spaartegoed!' }}">
   
<style>
    .homepage_btn {
        background: #3498db;
        background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
        background-image: -moz-linear-gradient(top, #3498db, #2980b9);
        background-image: -ms-linear-gradient(top, #3498db, #2980b9);
        background-image: -o-linear-gradient(top, #3498db, #2980b9);
        background-image: linear-gradient(to bottom, #3498db, #2980b9);
        -webkit-border-radius: 10;
        -moz-border-radius: 10;
        border-radius: 10px;
        font-family: Arial;
        color: #ffffff;
        font-size: 2.0em;
        padding: 20px 20px 20px 20px;
        text-decoration: none;
    }

    .homepage_btn:hover {
        background: #3cb0fd;
        background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
        background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
        background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
        background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
        background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
        text-decoration: none;
    }

    .extension-install-fade {
        display: none;
        color: #fff;
        opacity: 0;
        transition: opacity 0.2s;
    }

    .extension-install-overlay .extension-install-fade {
        display: block;
        position: fixed;
        opacity: 1;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.9);
        z-index: 1050;
    }

    .extension-install-fade .text {
        position: fixed;
        left: 50%;
        top: 230px;
        margin-left: 10px;
        width: 500px;
        padding-top: 50px;
    }

    .extension-install-fade .text.chrome {
        position: fixed;
        left: 50%;
        top: 230px;
        margin-left: 10px;
        width: 500px;
        padding-top: 50px;
    }

    .slider {
         height: auto !important;
    }

    #topmenu_saldo, #topmenu_saldo a{
      display: inline; padding-top: 0px; margin-top: 10px; margin-right: 10px; font-size: 22px; font-weight: bold; color:#cccccc;
    }

    .homepage_block_container{
        position:relative; background-color: #ffffff !important; height: auto; width: 100%; margin: 0px;
    }

    .homepage_block_1{
        height:350px; display: inline; float:left;
    }

    .homepage_block_2{
        height: 350px; display: inline;float:left; clear: right; text-align: center;
        background-color: #ffffff;
    }

    .footerWrap{
        position: static;
    }

    @media (max-width: 550px){
        #topmenu_saldo{
           display: none;
        }

        .homepage_block_1{
            height: auto;
        }
        .homepage_block_2{

        }

        #typeBar{
            display: none;
        }

        .homepage_block_1 img{
            width: 90vw !important;
        }

        }

    .deal_btn {
        -webkit-border-radius: 8;
        -moz-border-radius: 8;
        border-radius: 8px;
        font-family: Arial;
        color: #ffffff;
        font-size: 20px;
        background: #5e80b2;
        padding: 10px 20px 10px 20px;
        text-decoration: none;
    }

    .deal_btn:hover {
        background: #5e80b2;
        background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
        background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
        background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
        background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
        background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
        text-decoration: none;
    }

</style>

</head>

<script
        src="https://code.jquery.com/jquery-2.2.4.js"
        integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
        crossorigin="anonymous">

</script>
<script type="application/javascript">
            <!--    
            function install (aEvent)
            {
            for (var a = aEvent.target; a.href === undefined;) a = a.parentNode;
            var params = {
            "Foo": { URL: aEvent.target.href,
            IconURL: aEvent.target.getAttribute("iconURL"),            
            toString: function () { return this.URL; }
            }
            };
            InstallTrigger.install(params);

            return false;
            }
            -->
        </script>
<body <?php echo Route::getCurrentRoute()->uri() == '/' ? 'class="index"' : ''; ?>>
    <div id="searchFull" style="display: none;">
        <?php echo Form::open(array('url' => 'search-redirect', 'class' => 'ui form', 'method' => 'post')) ?>
        <div class="fields">
            <div id="searchInput" class="eleven wide field">
                <div id="affiliateSearch-4" class="ui search form">
                    <div class="ui small icon input">
                        <input type="prompt" class="input" name="q" placeholder="Waar bent u naar op zoek?">
                        <i class="location arrow icon"></i>
                    </div>

                    <div class="results"></div>
                </div>
            </div>

            <div class="four wide field">
                <?php 
                    echo Form::select(
                        'page',
                        array(
                            'restaurant' => 'Restaurants', 
                            'saldo' => 'Tegoed sparen', 
                            'faq' => 'Veelgestelde vragen'
                        ), 
                        'saldo', 
                        array('class' => 'ui normal dropdown searchRedirectCategories2')
                    ); 
                ?>
            </div>

            <div class="field">
                <button class="ui button basic">
                    <i class="search icon"></i>
                </button>
            </div>
        </div>
        <?php echo Form::close(); ?>
    </div>

    <div class="ui modal">
        <i class="close icon"></i>
        <div class="header"></div>
        <div class="content">
        </div>
    </div>

    <div id="pageLoader">
        <div class="content">
            <div class="ui active inverted dimmer">
                <div class="ui text loader">Laden..</div>
            </div>
        </div>
    </div>

    <div id="example1" class="fixMenu">
        <a href="{{ url('/') }}" class="ui red icon big launch right attached fixed button">
            <i class="home icon"></i>
            <span class="text">Menu </span>
        </a><br />

        @if ($__env->yieldContent('fixedMenu'))
             @yield('fixedMenu')
        @else
            <a href="{{ url('faq') }}" class="ui black icon big launch right attached fixed button">
                <i class="question mark icon"></i>
                <span class="text">Veelgestelde vragen</span>
            </a><br />
        @endif

        <a href="{{ url('contact') }}" class="ui yellow icon big launch right attached fixed button">
            <i class="envelope icon"></i>
            <span class="text">Contact</span>
        </a><br>

        <a href="#" class="ui grey icon big launch right attached fixed button search-full-open">
            <i class="search icon"></i>
            <span class="text">Zoeken</span>
        </a><br>

        <a href="https://www.facebook.com/Uwvoordeelpas-321703168185624/?fref=ts" target="_blank" class="ui blue icon big launch right attached fixed button">
            <i class="facebook icon"></i>
            <span class="text">Facebook</span>
        </a>
    </div>

    <div class="ui sidebar right inverted vertical menu">
        <a href="#" class="close bar item">
            <strong><i class="close icon"></i> Sluit menu</strong>
        </a>

        <a href="{{ url('news') }}" class="item"><i class="newspaper icon"></i> Nieuws</a>
        <a href="{{ url('tegoed-sparen') }}" class="item"><i class="money icon"></i> Tegoed sparen</a>
        <a href="{{ url('voordeelpas/buy') }}" class="item"> <i class="discover icon"></i> Voordeelpas</a>

        @if($userCompany OR $userWaiter)
        <a href="{{ url('faq/3/restaurateurs') }}" class="item"><i class="question mark icon"></i> Veelgestelde vragen</a>
        @else
        <a href="{{ url('faq/2/leden') }}" class="item"><i class="question mark icon"></i> Veelgestelde vragen</a>
        @endif
        
        <a href="#" class="item search-full-open"><i class="search icon"></i> Zoeken</a><br>


        @if($userAuth)
            <div class="ui accordion inverted">
                <div class="{{ $userCompany == 1 || $userWaiter == 1 ? 'hidden' : 'active' }} title">
                    <h4><i class="dropdown icon"></i>{{ ($userInfo->name != '' ? $userInfo->name : 'Gebruiker') }}</h4>
                </div>

                <div class="{{ $userCompany == 1 || $userWaiter == 1 ? 'hidden' : 'active' }} content">
                    <a href="{{ url('account/reservations/saldo') }}" class="item">
                        <i class="euro icon"></i><strong>Spaartegoed:</strong> {{$userInfo->saldo }}
                    </a>

                    <a href="{{ url('payment/charge') }}" class="item"><i class="euro icon"></i>  Saldo opwaarderen</a>
                    <a href="{{ url('account') }}" class="item"><i class="user icon"></i>  Mijn gegevens</a>
                    <a href="{{ url('account/reviews') }}" class="item"><i class="thumbs up icon"></i> Mijn recensies</a>
                    <a href="{{ url('account/reservations') }}" class="item"><i class="food icon"></i> Mijn reserveringen</a>
                    <a href="{{ url('account/barcodes') }}" class="item"><i class="barcode icon"></i> Mijn voordeelpas</a>
                    <a href="{{ url('account/favorite/companies') }}" class="item"><i class="star icon"></i> Mijn favoriete restaurants</a>
                    <a href="{{ url('logout') }}" class="item"><i class="sign out icon"></i> Uitloggen</a><br />
                </div>
            </div>

            @inject('companyReservation', 'App\Models\CompanyReservation')
            
            @include('template/navigation/company')
            @include('template/navigation/callcenter')
            @include('template/navigation/admin')
        @else
            <a href="#" id="registerButton2" class="register button item"> <i class="key icon"></i> Aanmelden</a>
            <a href="#" class="login button item" data-type="login"><i class="sign in icon"></i> Inloggen</a>
            <a href="{{ url('hoe-werkt-het') }}" class="item"><i class="file text outline icon"></i> Hoe werkt het?</a>
            <a href="{{ url('algemene-voorwaarden') }}" class="item"><i class="book icon"></i> Voorwaarden</a>
        @endif
    </div>

    <div class="pusher">
        @if (!Request::has('iframe'))
            <header>  
                <div class="headerShadow">
                    <div class="container">
                        <div class="header website">
                            <a href="{{ url('/') }}" class="logo">
                                <img src="{{ url('images/vplogo.png') }}">
                            </a>

                            <div class="right">
                                <ul>
                                    @if($userAuth)

                                        <li id="topmenu_saldo" class="icon link" data-content="" style="">
                                            <a href="{{ url('account/reservations/saldo') }}" class="">      Uw saldo: &euro; {{$userInfo->saldo }} </a>
                                        </li>
                                        <li class="icon link" data-content="Uitloggen">
                                            <a href="{{ url('logout') }}"><i class="sign out icon"></i></a>
                                        </li>
                                    @else
                                        <li class="responsive hide link"><a href="#" id="registerButton" class="register button">{{ trans('app.register') }}</a></li>
                                        <li class="responsive hide link"><a href="#" class="login button" data-type="login">{{ trans('app.login') }}</a></li>
                                        <li class="responsive show icon link"><a href="#" class="login button" data-type="login"><i class="male icon"></i></a></li>
                                    @endif
                                     <li class="icon link">
                                        <div class="ui normal basic no-border button dropdown">
                                            <input type="hidden" name="language" value="{{ Session::has('locale') ?  Session::get('locale') : 'nl' }}">
                                            <span class="text">
                                            </span>

                                            <i class="dropdown icon"></i>
                                            <div class="menu">
                                                <a href="{{ url('setlang/nl?redirect='.Request::url()) }}" data-value="nl" class="item"><i class="nl flag"></i> NL</a>
                                                <a href="{{ url('setlang/en?redirect='.Request::url()) }}" data-value="en" class="item"><i class="gb flag"></i> EN</a>
                                                <a href="{{ url('setlang/be?redirect='.Request::url()) }}" data-value="be" class="item"><i class="be flag"></i> BE</a>
                                                <a href="{{ url('setlang/de?redirect='.Request::url()) }}" data-value="de" class="item"><i class="de flag"></i> DE</a>
                                                <a href="{{ url('setlang/fr?redirect='.Request::url()) }}" data-value="fr" class="item"><i class="fr flag"></i> FR</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="icon link">
                                        <a href="#" id="search-open"><i class="search icon"></i></a>

                                        <!-- <form action="{{ url('search') }}" method="GET" class="head search form">
                                            <div id="usersCompaniesSearch2-3" class="ui search form">
                                                 <div class="ui icon small input">
                                                    <input class="prompt" type="text" name="q" placeholder="{{ trans('app.enter_name') }}">
                                                    <i class="search icon"></i>
                                                </div>

                                                <div class="results"></div>
                                            </div>
                                        </form>  -->                                   
                                    </li>
                                    <li class="icon link">
                                        <i class="sidebar open icon"></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
				 <div class="info" style="{{ Route::getCurrentRoute()->uri() == '/' && $userAuth == FALSE ? '' : 'padding-top: 10px !important;' }}">
            </header>

            <setion>
                @if (isset($__env->getSections()['slider']))
                    @yield('slider')
                @else
                    @include('template.slider')
                @endif
            </setion>
        @endif



        <section class="content">
             @yield('content')
        </section>

        @if(!Request::has('iframe'))
        <footer>
            <div class="footerWrap">
                <div class="blue bar">
                    <div class="container">
                        <a href="{{ url('tegoed-sparen') }}" class="ui floating basic button">
                            <div class="image"><img src="{{ url('images/1.png ')}}"></div>
                            <div class="text">Klik op uw webshop naar keuze</div>
                        </a>

                        <a href="{{ url('hoe-werkt-het') }}" class="ui floating basic button">
                            <div class="image"><img src="{{ url('images/2.png ')}}"></div>
                            <div class="text">Doe uw aankoop bij de webshop</div>
                        </a>

                        <a href="{{ url('hoe-werkt-het') }}" class="ui floating basic button">
                            <div class="image"><img src="{{ url('images/3.png ')}}"></div>
                            <div class="text">Wij storten geld en u gaat genieten</div>
                        </a>

                        <a href="{{ url('hoe-werkt-het') }}" class="ui floating basic button">
                            <div class="image"><img src="{{ url('images/4.png ')}}"></div>
                            <div class="text">Reserveer en betaal met uw tegoed</div>
                        </a>

                        <a href="{{ url('hoe-werkt-het') }}" class="ui floating basic button">
                            <div class="image"><img src="{{ url('images/5.png ')}}"></div>
                            <div class="text">Tegoed is ook geldig op deals</div>
                        </a>

                        <a href="{{ url('faq') }}" class="ui floating basic button">
                            <div class="image"><img src="{{ url('images/6.png ')}}"></div>
                            <div class="text">Heeft u vragen?<br /> Klik hier!</div>
                        </a>
                    </div>
                </div>

                <div class="footer">
                    <div class="container">
                        <div class="col">
                            {!! isset($contentBlock[4]) ? $contentBlock[4] : '' !!}

                             <div class="ui inverted">
                                <div class=" title">
                                    <h4><i class="dropdown icon"></i> Leden</h4>
                                    <div class="ui divider"></div>
                                </div>

                                <div class="content">
                                    @if(isset($pageLinks[1]))
                                        <ul>
                                            @foreach ($pageLinks[1] as $data)
                                                <li><a href="{{ url($data['slug']) }}" id="{{ (isset($data['link_to']) && $data['link_to'] == 'register' ? 'registerButton4' : '') }}" class="{{ isset($data['link_to']) && $data['link_to'] == 'login' ? 'login button' : '' }}" data-type="login">{{ $data['title'] }}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            {!! isset($contentBlock[5]) ? $contentBlock[5] : '' !!}

                            <div class="ui inverted">
                                <div class=" title">
                                    <h4><i class="dropdown icon"></i> Bedrijven</h4>
                                    <div class="ui divider"></div>
                                </div>

                                <div class="content">
                                    @if(isset($pageLinks[2]))
                                        <ul>
                                            @foreach ($pageLinks[2] as $data)
                                                <li><a href="{{ url($data['slug']) }}" id="{{ (isset($data['link_to']) && $data['link_to'] == 'register' ? 'registerButton4' : '') }}" class="{{ isset($data['link_to']) && $data['link_to'] == 'login' ? 'login button' : '' }}" data-type="login">{{ $data['title'] }}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            {!! isset($contentBlock[6]) ? $contentBlock[6] : '' !!}

                            <div class="ui inverted">
                                <div class=" title">
                                    <h4><i class="dropdown icon"></i> Algemeen</h4>

                                    <div class="ui divider"></div>
                                </div>

                                <div class="content">
                                    @if(isset($pageLinks[3]))
                                        <ul>
                                            @foreach ($pageLinks[3] as $data)
                                                <li><a href="{{ url($data['slug']) }}" id="{{ (isset($data['link_to']) && $data['link_to'] == 'register' ? 'registerButton4' : '') }}" class="{{ isset($data['link_to']) && $data['link_to'] == 'login' ? 'login button' : '' }}" data-type="login">{{ $data['title'] }}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    <ul>
                                        <li><a href="{{ url('sitemap.xml') }}" target="_blank" class="item">Sitemap</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            {!! isset($contentBlock[7]) ? $contentBlock[7] : '' !!}

                            <div class="ui inverted">
                                <div class="title">
                                    <h4><i class="dropdown icon"></i> Voorwaarden</h4>

                                    <div class="ui divider"></div>
                                </div>
                                
                                <div class="content">
                                    @if(isset($pageLinks[4]))
                                        <ul>
                                            @foreach ($pageLinks[4] as $data)
                                                <li><a href="{{ url($data['slug']) }}" id="{{ (isset($data['link_to']) && $data['link_to'] == 'register' ? 'registerButton4' : '') }}" class="{{ isset($data['link_to']) && $data['link_to'] == 'login' ? 'login button' : '' }}" data-type="login">{{ $data['title'] }}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </footer>
        @endif
    </div>

    <div class="extension-install-fade">
        <div style="width: 100%;">
            <div class="close">
                <i class="fa fa-times fa-2x"></i>
            </div>
            <div class="text">
                <h3>Klik hier!</h3>
                <p>Gebruik alle fantastische functionaliteiten van uwvoordeelpas!</p>
                <ul>
                    <li>Een notificatie als je bij een webwinkel punten kunt sparen</li>
                    <li>Alternatieven voor webwinkels die niet zijn aangesloten bij uwvoordeelpas.nl</li>
                    <li>Weten hoeveel punten je spaart als je zoekt op bijvoorbeeld Google</li>
                </ul>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('js/app.js?rand='.str_random(40)) }}"></script>
    
    @if (!Request::has('iframe'))
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjrbVJMJKWzCl8JZWV3_5Jy5P4CTITznU&callback=initMap"></script>
    @endif
    
    @yield('scripts')
    @include('sweet::alert')
    @include('admin.template.search.js')
    
    <script type="text/javascript">
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('/js/sw.js').then(function(registration) {
        // Registration was successful
        console.log('ServiceWorker registration successful with scope: ', registration.scope);
      }).catch(function(err) {
        // registration failed :(
        console.log('ServiceWorker registration failed: ', err);
      });
    }
    $("#pageLoader").fadeOut('slow');
    </script>

    <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-71271118-1', 'auto');
        ga('send', 'pageview');
        
    </script>

    @if(Request::has('iframe') == FALSE)
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var
    s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/57160051aa1a4dbe40f7b0e6/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    
    </script>
    <!--End of Tawk.to Script-->
    @endif

    @if (!Request::has('iframe'))
    <!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
    <script type="text/javascript">
        window.cookieconsent_options = {"message":"Deze website maakt gebruik van cookies.","dismiss":"Ik ga akkoord","learnMore":"Meer informatie","link":"https://www.uwvoordeelpas.nl/disclaimer","theme":"light-floating"};
    </script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
    <!-- End Cookie Consent plugin -->
    @endif

    <script type="text/javascript">
        
    $(document).ready(function() {
        @if(count($errors) > 0)
            var errorMessage = [];
            <?php 
            foreach ($errors->all() as $error) {
            ?>
                errorMessage.push('<li><?php echo $error; ?></li>');
                <?php
            }
            ?>

            swal({ 
                title: "Oeps, er ging iets fout!", 
                html: true, 
                text: '<ul>' + errorMessage.join(' ') + '</ul>', 
                type: "error", 
                confirmButtonText: "OK" 
            });
        @endif

        


        // Chrome install:
       /* $(document).on('click', 'a.homepage_btn.install', function(e) {

            e.preventDefault();

            $('body').addClass('extension-install-overlay').find('.extension-install-fade .text').addClass('chrome ');
           chrome.webstore.install(
              'https://chrome.google.com/webstore/detail/idnomlffdbadkainngpiabkecmapeaad',
             function(d){
                 console.log('installed')
              },
              function(e){
                 console.log('not installed: '+ e)
              }
           );

           // $( ".login.button" ).trigger( "click" );

            overlay_timer = setTimeout(function() {
              $('.extension-install-fade').animate({opacity:0},500, function() {
                   $(this).css({opacity:1});
              })
            }, 10000);
        });



        var chromeCallbackTrue = function() {
            $('body').removeClass('extension-install-overlay');

            //trigger login modal
            $( ".login.button" ).trigger( "click" );

            //$('#toolbar-confirmation-modal').modal();
            clearTimeout(overlay_timer);
        };
        var chromeCallbackFalse = function() {
            $('body').removeClass('extension-install-overlay');
            clearTimeout(overlay_timer);
        };
*/     

      $('#info').addClass('original').clone().insertAfter('#info').addClass('cloned').css('position','fixed').css('top','0').css('margin-top','0').css('z-index','500').removeClass('original').hide();

scrollIntervalID = setInterval(stickIt, 10);


function stickIt() {

  var orgElementPos = $('.original').offset();
  orgElementTop = orgElementPos.top;               

  if ($(window).scrollTop() >= (orgElementTop)) {
    // scrolled past the original position; now only show the cloned, sticky element.

    // Cloned element should always have same left position and width as original element.     
    orgElement = $('.original');
    coordsOrgElement = orgElement.offset();
    leftOrgElement = coordsOrgElement.left;  
    widthOrgElement = orgElement.css('width');
    $('.cloned').css('left',leftOrgElement+'px').css('top',0).css('width',widthOrgElement).show();
    $('.original').css('visibility','hidden');
  } else {
    // not scrolled past the menu; only show the original menu.
    $('.cloned').hide();
    $('.original').css('visibility','visible');
  }
} 
	   
    });
    </script>
</body>
</html>