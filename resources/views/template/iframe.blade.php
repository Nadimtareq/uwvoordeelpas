<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html  class="no-js" lang="en">
<head>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Reserveer in enkele stappen met uw spaartegoed!' }} - UwVoordeelpas</title>	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
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


    <link rel="stylesheet" href="{{ captcha_layout_stylesheet_url() }}" >

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

    @yield("after_styles")
</head>



<body {{ (Route::getCurrentRoute()->uri() == '/') ? 'class="index"' : '' }} id="app">

        @yield('content')


</body>
</html>