<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html  class="no-js" lang="nl">
<head>
    <title><?php echo e(isset($pageTitle) ? $pageTitle : 'Reserveer in enkele stappen met uw spaartegoed!'); ?> - UwVoordeelpas</title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('images/icons/favicon64.png')); ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo e(asset('images/icons/favicon64.png')); ?>">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="<?php echo e(asset('images/icons/favicon16.png')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/app.css?rand='.str_random(40))); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/normalize.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery-ui.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/ui-lightness/jquery-ui-1.9.2.custom.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/materialize.min.css')); ?>" />

	<link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.css')); ?>" />
	<link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>" />
	<link rel="stylesheet" href="<?php echo e(asset('css/animate.min.css')); ?>" />
	<link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/flexslider.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/responsive.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/stat-styles.css')); ?>">

<!--	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
	<link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="<?php echo e(asset('css/material.indigo-pink.min.css')); ?>">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <style>
        /*Google translator*/
        .goog-te-banner-frame.skiptranslate{display:none!important;}
        .goog-tooltip {
            display: none !important;
        }
        .goog-tooltip:hover {
            display: none !important;
        }
        .goog-text-highlight {
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
        }
    </style>


    <link rel="stylesheet" href="<?php echo e(captcha_layout_stylesheet_url()); ?>" >
<!-- <link rel="manifest" href="<?php echo e(asset('manifest.json')); ?>" > -->
<!--<script src="<?php echo e(asset('js/jsBarcode/dist/JsBarcode.all.js')); ?>"></script>-->
<?php echo $__env->yieldContent('styles'); ?>

<!-- <link rel="shortcut icon" sizes="144x144" href="launcher-icon-3x.png"> -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="chrome-webstore-item" href="https://chrome.google.com/webstore/detail/kfnndmokhnlhhblfedaeebnonfjbihpo">
    <meta name="robots" content="nofollow" />
    <meta name="_token" content="<?php echo csrf_token(); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="<?php echo e(isset($metaDescription) ? strip_tags($metaDescription) : 'Reserveer in enkele stappen met uw spaartegoed!'); ?>">
	<meta http-equiv="Cache-control" content="max-age=2592000, public">
	<script src="<?php echo e(asset('js/jquery-2-2-4.js')); ?> "></script>
    <script src="<?php echo e(asset('js/jquery.cookie.min.js')); ?> "></script>
	<script>
	  var baseUrl = <?php echo json_encode(url('/')."/"); ?>;

        // Script to load fonts async

        (function() {
            var css = document.createElement('link'); css.href = '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css);
        })();

        window.onerror = function(message, url){
            console.log(message);
            return true;
        }  // IGNORE ALL ERROR JAVASCRIPT!
    </script>

    <?php echo $__env->yieldContent("after_styles"); ?>
</head>



<body <?php echo e((Route::getCurrentRoute()->uri() == '/') ? 'class="index"' : ''); ?> id="app">

    <?php /*Language Converter*/ ?>
    <?php echo $__env->make('template.google-translate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


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
            <?php echo e(Form::select(
                        'page',
                        array(
                            'restaurant' => 'Restaurants',
                            'saldo' => 'Tegoed sparen',
                            'faq' => 'Veelgestelde vragen'
                        ),
                        'saldo',
                        array('class' => 'ui normal dropdown searchRedirectCategories2'))); ?>

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

<!-- Preloader -->
<div id="preloader">
    <div class="loader">
        <svg class="circle-loader" height="50" width="50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="6" stroke-miterlimit="10" />
        </svg>
    </div>
</div>



<!-- Main Content -->
<div class="pusher">
    <?php if(!Request::has('iframe')): ?>

         <?php if(isset($search_header) && $search_header): ?>
            <?php echo $__env->make('template.header-search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php /*  <?php echo $__env->make('template.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  */ ?>
        <?php else: ?> 
            <?php if(!Auth::guest() && Sentinel::inRole('admin') != FALSE): ?>
                <?php echo $__env->make('template.header-search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('template.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>
             
            <section>
                <?php if(isset($__env->getSections()['slider'])): ?>
                    <?php echo $__env->yieldContent('slider'); ?>
                <?php else: ?>
                    <?php echo $__env->make('template.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
            </section> 
         <?php endif; ?> 

    <?php endif; ?>

    <section class="content space-header">
  
     
        <?php echo $__env->yieldContent('content'); ?>
    </section>

    <?php if(!Request::has('iframe')): ?>
        <?php echo $__env->make('template.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
</div>
<!-- End - Main Content -->

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

<!-- Load Javscript Section -->
<!-- <script  src="<?php echo e(asset('js/app.js?rand='.str_random(40))); ?>"></script> 		 -->
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjrbVJMJKWzCl8JZWV3_5Jy5P4CTITznU"></script>    -->

<script src="<?php echo e(asset('js/jquery.serialize-object.js')); ?> "></script>
<script src="<?php echo e(asset('js/app.js?version=1')); ?>"></script>
<script src="<?php echo e(asset('js/jquery-1.11.3.min.js')); ?> "></script>
<?php /*<script src="<?php echo e(asset('js/bootstrap.min.js')); ?> "></script>*/ ?>
<script src="<?php echo e(asset('js/jquery.serialize-object.js')); ?> "></script>

<?php if(!Request::has('iframe') ): ?>
    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyAjrbVJMJKWzCl8JZWV3_5Jy5P4CTITznU&callback=initMap&force=lite" ></script>
    <script  src="//cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.min.js"></script>
<?php endif; ?>

<script  src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
<script  src="<?php echo e(asset('js/jquery.flexslider.js')); ?>"></script>
<script  src="<?php echo e(asset('js/jquery.bxslider.min.js')); ?>"></script>
<script  src="<?php echo e(asset('js/jquery-ui-1.11.3.custom.min.js')); ?>"></script>
<script  src="<?php echo e(asset('js/i18n/datepicker-nl.js')); ?>"></script>

<script  src="<?php echo e(asset('js/detectmobilebrowser.js')); ?>"></script>
<script  src="<?php echo e(asset('js/wow.min.js')); ?>"></script>
<script  src="<?php echo e(asset('js/waypoints.js')); ?>"></script>
<script  src="<?php echo e(asset('js/materialize.min.js')); ?>"></script>
<script  src="<?php echo e(asset('js/common.js')); ?>"></script>
<script  src="<?php echo e(asset('js/main.js')); ?>"></script>
<script src="<?php echo e(asset('js/clipboard/dist/clipboard.js')); ?>"></script>

<?php echo $__env->yieldContent('scripts'); ?>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.template.search.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<!-- Google Analytics -->
<script>
    window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
    ga('create', 'UA-71271118-1', 'auto');
    ga('send', 'pageview');
</script>
<script async src='https://www.google-analytics.com/analytics.js'></script>
<!-- End Google Analytics -->

<script>

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

    /*(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-71271118-1', 'auto');
    ga('send', 'pageview');

    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('/js/sw.js').then(function(registration) {
        // Registration was successful
        console.log('ServiceWorker registration successful with scope: ', registration.scope);
      }).catch(function(err) {
        // registration failed :(
        console.log('ServiceWorker registration failed: ', err);
      });
    }
    */


</script>

<?php if(Request::has('iframe') == FALSE): ?>

    <script>

        <!--Start of Tawk.to Script-->
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
        <!--End of Tawk.to Script-->

        <!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
        window.cookieconsent_options = {"message":"Deze website maakt gebruik van cookies.","dismiss":"Ik ga akkoord","learnMore":"Meer informatie","link":"https://www.uwvoordeelpas.nl/disclaimer","theme":"light-floating"};

    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>

    <!-- End Cookie Consent plugin -->

<?php endif; ?>



<script>

    $(document).ready(function() {
                <?php if(count($errors) > 0): ?>
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
        <?php endif; ?>


        function chromeInstallFunction() {
            chrome.webstore.install('https://chrome.google.com/webstore/detail/kfnndmokhnlhhblfedaeebnonfjbihpo', function () {
//                    alert('success');
            }, function(error, errorCode) {
//                    alert(errorCode + "-----------" + error);
            })
            return false;
        };

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

//scrollIntervalID = setInterval(stickIt, 10);


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
    <script>
        $('.change-login-user-language').click(function(e){
            e.preventDefault();
            var link = $(this).attr('href');

            swal({
                    title: "",
                    text: "Wil je deze taal als je standaardtaal?",
                    type: "info",
                    showCancelButton: true,
                    cancelButtonText: 'Nee',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ja'
                },
                function(){
                    window.location.href = link;
                });
        });
    </script>

<?php echo $__env->yieldContent("after_scripts"); ?>

<?php echo $__env->yieldPushContent('inner_scripts'); ?>
</body>
</html>