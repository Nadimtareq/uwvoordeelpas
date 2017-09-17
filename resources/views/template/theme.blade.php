<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->

<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->

<!--[if gt IE 8]><!-->

<html  class="no-js" lang="en">

<head>

    <title>{{ isset($pageTitle) ? $pageTitle : 'Reserveer in enkele stappen met uw spaartegoed!' }} - UwVoordeelpas</title>



    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/icons/favicon64.png') }}">

    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/icons/favicon64.png') }}">

    <link rel="shortcut icon" type="image/png" sizes="16x16" href="{{ asset('images/icons/favicon16.png') }}">



    



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





    <link rel="stylesheet" href="{{ captcha_layout_stylesheet_url() }}" >

<!-- <link rel="manifest" href="{{ asset('manifest.json') }}" > -->

<!--<script src="{{ asset('js/jsBarcode/dist/JsBarcode.all.js') }}"></script>-->




@yield('styles')



<!-- <link rel="shortcut icon" sizes="144x144" href="launcher-icon-3x.png"> -->

    <meta name="mobile-web-app-capable" content="yes">

    <link rel="chrome-webstore-item" href="https://chrome.google.com/webstore/detail/kfnndmokhnlhhblfedaeebnonfjbihpo">

    <meta name="robots" content="nofollow" />

    <meta name="_token" content="{!! csrf_token() !!}"/>

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">

    <meta name="msapplication-TileColor" content="#ffffff">

    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">

    <meta name="theme-color" content="#ffffff">

    <meta name="description" content="{{ isset($metaDescription) ? strip_tags($metaDescription) : 'Reserveer in enkele stappen met uw spaartegoed!' }}">

	<meta http-equiv="Cache-control" content="max-age=2592000, public">

<!-- 	<script src="{{ asset('js/jquery-2-2-4.js') }} "></script>

    <script src="{{ asset('js/jquery.cookie.min.js') }} "></script> -->






    @yield("after_styles")

</head>







<body {{ (Route::getCurrentRoute()->uri() == '/') ? 'class="index"' : '' }} id="app">



    {{--Language Converter--}}

    @include('template.google-translate')





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

            {{ Form::select(

                        'page',

                        array(

                            'restaurant' => 'Restaurants',

                            'saldo' => 'Tegoed sparen',

                            'faq' => 'Veelgestelde vragen'

                        ),

                        'saldo',

                        array('class' => 'ui normal dropdown searchRedirectCategories2')) }}

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

    @if (!Request::has('iframe'))



          @if(isset($search_header) && $search_header)

            @include('template.header-search')



        @else  

             @if(!Auth::guest() && Sentinel::inRole('admin') != FALSE)

                @include('template.header-search')

            @else

                @include('template.header')

            @endif 

             



             {{--  @include('template.header')  --}}

            <section>

                @if (isset($__env->getSections()['slider']))

                    @yield('slider')

                @else

                    @include('template.slider')

                @endif

            </section> 

          @endif  



    @endif



    <section class="content space-header">

  

     

        @yield('content')

    </section>



    @if(!Request::has('iframe'))

        @include('template.footer')

    @endif

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




<!-- <link rel="stylesheet" href="{{ asset('css/app.css?rand='.str_random(40)) }}"> -->
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">


    <!-- <link rel="stylesheet" href="{{ asset('css/normalize.css')}}"> -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/1.1.3/normalize.min.css">

    <!-- <link rel="stylesheet" href="{{ asset('css/jquery-ui.css')}}"> -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.min.css">

    <!-- <link rel="stylesheet" href="{{ asset('css/ui-lightness/jquery-ui-1.9.2.custom.min.css') }}"> -->

    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}" />



     <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.min.css" />

    {{--  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />  --}}

    <!-- <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}" /> -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />

    <!-- <link rel="stylesheet" href="{{ asset('css/main.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}"> -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.3/flexslider.min.css">

    <!-- <link rel="stylesheet" href="{{ asset('css/responsive.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">


    <link rel="stylesheet" href="{{ asset('css/stat-styles.css') }}">



<!--    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->

    <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <!-- <link rel="stylesheet" href="{{ asset('css/material.indigo-pink.min.css') }}"> -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.2.1/material.indigo-pink.min.css">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">







<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

    <script>

      var baseUrl = {!! json_encode(url('/')."/") !!};



        // Script to load fonts async



        (function() {

            var css = document.createElement('link'); css.href = '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css);

        })();



        window.onerror = function(message, url){

            console.log(message);

            return true;

        }  // IGNORE ALL ERROR JAVASCRIPT!

    </script>


<!-- Load Javscript Section -->

<!-- <script  src="{{ asset('js/app.js?rand='.str_random(40)) }}"></script> 		 -->

<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjrbVJMJKWzCl8JZWV3_5Jy5P4CTITznU"></script>    -->



<!-- <script src="{{ asset('js/jquery.serialize-object.js') }} "></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-serialize-object/2.5.0/jquery.serialize-object.min.js"></script>

<!-- <script src="{{ asset('js/app.js?version=1') }}"></script> -->
<script src="{{ asset('js/app.min.js?version=1') }}"></script>

<!-- <script src="{{ asset('js/jquery-1.11.3.min.js') }} "></script> -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- <script src="{{ asset('js/bootstrap.min.js') }} "></script>  -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- <script src="{{ asset('js/jquery.serialize-object.js') }} "></script> -->



@if (!Request::has('iframe') )

    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyAjrbVJMJKWzCl8JZWV3_5Jy5P4CTITznU&callback=initMap&force=lite" ></script>

    <script  src="//cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.min.js"></script>

@endif



<!-- <script  src="{{ asset('js/jquery-ui.min.js') }}"></script> -->

<script  src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

<!-- <script  src="{{ asset('js/jquery.flexslider.js') }}"></script> -->
<script  src="//cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.3/jquery.flexslider-min.js"></script>

<!-- <script  src="{{ asset('js/jquery.bxslider.min.js') }}"></script> -->
<script  src="//cdnjs.cloudflare.com/ajax/libs/bxslider/4.1.2/jquery.bxslider.min.js"></script>

<!-- <script  src="{{ asset('js/jquery-ui-1.11.3.custom.min.js') }}"></script> -->

<!-- <script  src="{{ asset('js/i18n/datepicker-nl.js') }}"></script> -->
<script>
!function(e){"function"==typeof define&&define.amd?define(["../widgets/datepicker"],e):e(jQuery.datepicker)}(function(e){return e.regional.nl={closeText:"Sluiten",prevText:"â†",nextText:"â†’",currentText:"Vandaag",monthNames:["januari","februari","maart","april","mei","juni","juli","augustus","september","oktober","november","december"],monthNamesShort:["jan","feb","mrt","apr","mei","jun","jul","aug","sep","okt","nov","dec"],dayNames:["zondag","maandag","dinsdag","woensdag","donderdag","vrijdag","zaterdag"],dayNamesShort:["zon","maa","din","woe","don","vri","zat"],dayNamesMin:["zo","ma","di","wo","do","vr","za"],weekHeader:"Wk",dateFormat:"dd-mm-yy",firstDay:1,isRTL:!1,showMonthAfterYear:!1,yearSuffix:""},e.setDefaults(e.regional.nl),e.regional.nl});
</script>
<script>
/**
 * jQuery.browser.mobile (http://detectmobilebrowser.com/)
 *
 * jQuery.browser.mobile will be true if the browser is a mobile device
 *
 **/
(function(a){(jQuery.browser=jQuery.browser||{}).mobile=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))})(navigator.userAgent||navigator.vendor||window.opera);
</script>
<script>
/*! WOW - v1.0.1 - 2014-09-03
* Copyright (c) 2014 Matthieu Aussaguel; Licensed MIT */(function(){var a,b,c,d,e,f=function(a,b){return function(){return a.apply(b,arguments)}},g=[].indexOf||function(a){for(var b=0,c=this.length;c>b;b++)if(b in this&&this[b]===a)return b;return-1};b=function(){function a(){}return a.prototype.extend=function(a,b){var c,d;for(c in b)d=b[c],null==a[c]&&(a[c]=d);return a},a.prototype.isMobile=function(a){return/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(a)},a.prototype.addEvent=function(a,b,c){return null!=a.addEventListener?a.addEventListener(b,c,!1):null!=a.attachEvent?a.attachEvent("on"+b,c):a[b]=c},a.prototype.removeEvent=function(a,b,c){return null!=a.removeEventListener?a.removeEventListener(b,c,!1):null!=a.detachEvent?a.detachEvent("on"+b,c):delete a[b]},a.prototype.innerHeight=function(){return"innerHeight"in window?window.innerHeight:document.documentElement.clientHeight},a}(),c=this.WeakMap||this.MozWeakMap||(c=function(){function a(){this.keys=[],this.values=[]}return a.prototype.get=function(a){var b,c,d,e,f;for(f=this.keys,b=d=0,e=f.length;e>d;b=++d)if(c=f[b],c===a)return this.values[b]},a.prototype.set=function(a,b){var c,d,e,f,g;for(g=this.keys,c=e=0,f=g.length;f>e;c=++e)if(d=g[c],d===a)return void(this.values[c]=b);return this.keys.push(a),this.values.push(b)},a}()),a=this.MutationObserver||this.WebkitMutationObserver||this.MozMutationObserver||(a=function(){function a(){"undefined"!=typeof console&&null!==console&&console.warn("MutationObserver is not supported by your browser."),"undefined"!=typeof console&&null!==console&&console.warn("WOW.js cannot detect dom mutations, please call .sync() after loading new content.")}return a.notSupported=!0,a.prototype.observe=function(){},a}()),d=this.getComputedStyle||function(a){return this.getPropertyValue=function(b){var c;return"float"===b&&(b="styleFloat"),e.test(b)&&b.replace(e,function(a,b){return b.toUpperCase()}),(null!=(c=a.currentStyle)?c[b]:void 0)||null},this},e=/(\-([a-z]){1})/g,this.WOW=function(){function e(a){null==a&&(a={}),this.scrollCallback=f(this.scrollCallback,this),this.scrollHandler=f(this.scrollHandler,this),this.start=f(this.start,this),this.scrolled=!0,this.config=this.util().extend(a,this.defaults),this.animationNameCache=new c}return e.prototype.defaults={boxClass:"wow",animateClass:"animated",offset:0,mobile:!0,live:!0},e.prototype.init=function(){var a;return this.element=window.document.documentElement,"interactive"===(a=document.readyState)||"complete"===a?this.start():this.util().addEvent(document,"DOMContentLoaded",this.start),this.finished=[]},e.prototype.start=function(){var b,c,d,e;if(this.stopped=!1,this.boxes=function(){var a,c,d,e;for(d=this.element.querySelectorAll("."+this.config.boxClass),e=[],a=0,c=d.length;c>a;a++)b=d[a],e.push(b);return e}.call(this),this.all=function(){var a,c,d,e;for(d=this.boxes,e=[],a=0,c=d.length;c>a;a++)b=d[a],e.push(b);return e}.call(this),this.boxes.length)if(this.disabled())this.resetStyle();else{for(e=this.boxes,c=0,d=e.length;d>c;c++)b=e[c],this.applyStyle(b,!0);this.util().addEvent(window,"scroll",this.scrollHandler),this.util().addEvent(window,"resize",this.scrollHandler),this.interval=setInterval(this.scrollCallback,50)}return this.config.live?new a(function(a){return function(b){var c,d,e,f,g;for(g=[],e=0,f=b.length;f>e;e++)d=b[e],g.push(function(){var a,b,e,f;for(e=d.addedNodes||[],f=[],a=0,b=e.length;b>a;a++)c=e[a],f.push(this.doSync(c));return f}.call(a));return g}}(this)).observe(document.body,{childList:!0,subtree:!0}):void 0},e.prototype.stop=function(){return this.stopped=!0,this.util().removeEvent(window,"scroll",this.scrollHandler),this.util().removeEvent(window,"resize",this.scrollHandler),null!=this.interval?clearInterval(this.interval):void 0},e.prototype.sync=function(){return a.notSupported?this.doSync(this.element):void 0},e.prototype.doSync=function(a){var b,c,d,e,f;if(!this.stopped){if(null==a&&(a=this.element),1!==a.nodeType)return;for(a=a.parentNode||a,e=a.querySelectorAll("."+this.config.boxClass),f=[],c=0,d=e.length;d>c;c++)b=e[c],g.call(this.all,b)<0?(this.applyStyle(b,!0),this.boxes.push(b),this.all.push(b),f.push(this.scrolled=!0)):f.push(void 0);return f}},e.prototype.show=function(a){return this.applyStyle(a),a.className=""+a.className+" "+this.config.animateClass},e.prototype.applyStyle=function(a,b){var c,d,e;return d=a.getAttribute("data-wow-duration"),c=a.getAttribute("data-wow-delay"),e=a.getAttribute("data-wow-iteration"),this.animate(function(f){return function(){return f.customStyle(a,b,d,c,e)}}(this))},e.prototype.animate=function(){return"requestAnimationFrame"in window?function(a){return window.requestAnimationFrame(a)}:function(a){return a()}}(),e.prototype.resetStyle=function(){var a,b,c,d,e;for(d=this.boxes,e=[],b=0,c=d.length;c>b;b++)a=d[b],e.push(a.setAttribute("style","visibility: visible;"));return e},e.prototype.customStyle=function(a,b,c,d,e){return b&&this.cacheAnimationName(a),a.style.visibility=b?"hidden":"visible",c&&this.vendorSet(a.style,{animationDuration:c}),d&&this.vendorSet(a.style,{animationDelay:d}),e&&this.vendorSet(a.style,{animationIterationCount:e}),this.vendorSet(a.style,{animationName:b?"none":this.cachedAnimationName(a)}),a},e.prototype.vendors=["moz","webkit"],e.prototype.vendorSet=function(a,b){var c,d,e,f;f=[];for(c in b)d=b[c],a[""+c]=d,f.push(function(){var b,f,g,h;for(g=this.vendors,h=[],b=0,f=g.length;f>b;b++)e=g[b],h.push(a[""+e+c.charAt(0).toUpperCase()+c.substr(1)]=d);return h}.call(this));return f},e.prototype.vendorCSS=function(a,b){var c,e,f,g,h,i;for(e=d(a),c=e.getPropertyCSSValue(b),i=this.vendors,g=0,h=i.length;h>g;g++)f=i[g],c=c||e.getPropertyCSSValue("-"+f+"-"+b);return c},e.prototype.animationName=function(a){var b;try{b=this.vendorCSS(a,"animation-name").cssText}catch(c){b=d(a).getPropertyValue("animation-name")}return"none"===b?"":b},e.prototype.cacheAnimationName=function(a){return this.animationNameCache.set(a,this.animationName(a))},e.prototype.cachedAnimationName=function(a){return this.animationNameCache.get(a)},e.prototype.scrollHandler=function(){return this.scrolled=!0},e.prototype.scrollCallback=function(){var a;return!this.scrolled||(this.scrolled=!1,this.boxes=function(){var b,c,d,e;for(d=this.boxes,e=[],b=0,c=d.length;c>b;b++)a=d[b],a&&(this.isVisible(a)?this.show(a):e.push(a));return e}.call(this),this.boxes.length||this.config.live)?void 0:this.stop()},e.prototype.offsetTop=function(a){for(var b;void 0===a.offsetTop;)a=a.parentNode;for(b=a.offsetTop;a=a.offsetParent;)b+=a.offsetTop;return b},e.prototype.isVisible=function(a){var b,c,d,e,f;return c=a.getAttribute("data-wow-offset")||this.config.offset,f=window.pageYOffset,e=f+Math.min(this.element.clientHeight,this.util().innerHeight())-c,d=this.offsetTop(a),b=d+a.clientHeight,e>=d&&b>=f},e.prototype.util=function(){return null!=this._util?this._util:this._util=new b},e.prototype.disabled=function(){return!this.config.mobile&&this.util().isMobile(navigator.userAgent)},e}()}).call(this);
</script>
<script>
/*
jQuery Waypoints - v1.1.7
Copyright (c) 2011-2012 Caleb Troughton
Dual licensed under the MIT license and GPL license.
https://github.com/imakewebthings/jquery-waypoints/blob/master/MIT-license.txt
https://github.com/imakewebthings/jquery-waypoints/blob/master/GPL-license.txt
*/
(function($,k,m,i,d){var e=$(i),g="waypoint.reached",b=function(o,n){o.element.trigger(g,n);if(o.options.triggerOnce){o.element[k]("destroy")}},h=function(p,o){if(!o){return -1}var n=o.waypoints.length-1;while(n>=0&&o.waypoints[n].element[0]!==p[0]){n-=1}return n},f=[],l=function(n){$.extend(this,{element:$(n),oldScroll:0,waypoints:[],didScroll:false,didResize:false,doScroll:$.proxy(function(){var q=this.element.scrollTop(),p=q>this.oldScroll,s=this,r=$.grep(this.waypoints,function(u,t){return p?(u.offset>s.oldScroll&&u.offset<=q):(u.offset<=s.oldScroll&&u.offset>q)}),o=r.length;if(!this.oldScroll||!q){$[m]("refresh")}this.oldScroll=q;if(!o){return}if(!p){r.reverse()}$.each(r,function(u,t){if(t.options.continuous||u===o-1){b(t,[p?"down":"up"])}})},this)});$(n).bind("scroll.waypoints",$.proxy(function(){if(!this.didScroll){this.didScroll=true;i.setTimeout($.proxy(function(){this.doScroll();this.didScroll=false},this),$[m].settings.scrollThrottle)}},this)).bind("resize.waypoints",$.proxy(function(){if(!this.didResize){this.didResize=true;i.setTimeout($.proxy(function(){$[m]("refresh");this.didResize=false},this),$[m].settings.resizeThrottle)}},this));e.load($.proxy(function(){this.doScroll()},this))},j=function(n){var o=null;$.each(f,function(p,q){if(q.element[0]===n){o=q;return false}});return o},c={init:function(o,n){this.each(function(){var u=$.fn[k].defaults.context,q,t=$(this);if(n&&n.context){u=n.context}if(!$.isWindow(u)){u=t.closest(u)[0]}q=j(u);if(!q){q=new l(u);f.push(q)}var p=h(t,q),s=p<0?$.fn[k].defaults:q.waypoints[p].options,r=$.extend({},s,n);r.offset=r.offset==="bottom-in-view"?function(){var v=$.isWindow(u)?$[m]("viewportHeight"):$(u).height();return v-$(this).outerHeight()}:r.offset;if(p<0){q.waypoints.push({element:t,offset:null,options:r})}else{q.waypoints[p].options=r}if(o){t.bind(g,o)}if(n&&n.handler){t.bind(g,n.handler)}});$[m]("refresh");return this},remove:function(){return this.each(function(o,p){var n=$(p);$.each(f,function(r,s){var q=h(n,s);if(q>=0){s.waypoints.splice(q,1);if(!s.waypoints.length){s.element.unbind("scroll.waypoints resize.waypoints");f.splice(r,1)}}})})},destroy:function(){return this.unbind(g)[k]("remove")}},a={refresh:function(){$.each(f,function(r,s){var q=$.isWindow(s.element[0]),n=q?0:s.element.offset().top,p=q?$[m]("viewportHeight"):s.element.height(),o=q?0:s.element.scrollTop();$.each(s.waypoints,function(u,x){if(!x){return}var t=x.options.offset,w=x.offset;if(typeof x.options.offset==="function"){t=x.options.offset.apply(x.element)}else{if(typeof x.options.offset==="string"){var v=parseFloat(x.options.offset);t=x.options.offset.indexOf("%")?Math.ceil(p*(v/100)):v}}x.offset=x.element.offset().top-n+o-t;if(x.options.onlyOnScroll){return}if(w!==null&&s.oldScroll>w&&s.oldScroll<=x.offset){b(x,["up"])}else{if(w!==null&&s.oldScroll<w&&s.oldScroll>=x.offset){b(x,["down"])}else{if(!w&&s.element.scrollTop()>x.offset){b(x,["down"])}}}});s.waypoints.sort(function(u,t){return u.offset-t.offset})})},viewportHeight:function(){return(i.innerHeight?i.innerHeight:e.height())},aggregate:function(){var n=$();$.each(f,function(o,p){$.each(p.waypoints,function(q,r){n=n.add(r.element)})});return n}};$.fn[k]=function(n){if(c[n]){return c[n].apply(this,Array.prototype.slice.call(arguments,1))}else{if(typeof n==="function"||!n){return c.init.apply(this,arguments)}else{if(typeof n==="object"){return c.init.apply(this,[null,n])}else{$.error("Method "+n+" does not exist on jQuery "+k)}}}};$.fn[k].defaults={continuous:true,offset:0,triggerOnce:false,context:i};$[m]=function(n){if(a[n]){return a[n].apply(this)}else{return a.aggregate()}};$[m].settings={resizeThrottle:200,scrollThrottle:100};e.load(function(){$[m]("refresh")})})(jQuery,"waypoint","waypoints",window);
</script>
<!-- <script  src="{{ asset('js/detectmobilebrowser.js') }}"></script> -->

<!-- <script  src="{{ asset('js/wow.min.js') }}"></script> -->

<!-- <script  src="{{ asset('js/waypoints.js') }}"></script> -->

<!-- <script  src="{{ asset('js/materialize.min.js') }}"></script> -->
<script  src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.95.1/js/materialize.min.js"></script>

<!-- <script  src="{{ asset('js/common.js') }}"></script> -->
<script  src="{{ asset('js/common.min.js') }}"></script>

<!-- <script  src="{{ asset('js/main.js') }}"></script> -->
<script  src="{{ asset('js/main.min.js') }}"></script>

<!-- <script src="{{ asset('js/clipboard/dist/clipboard.js') }}"></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.7.1/clipboard.min.js"></script>

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5751e9a264890504"></script>



@yield('scripts')

@include('sweet::alert')

@include('admin.template.search.js')





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



@if(Request::has('iframe') == FALSE)



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



@endif







<script>



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



@yield("after_scripts")



@stack('inner_scripts')

</body>

</html>