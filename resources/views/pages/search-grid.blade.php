@extends('template.theme')


@inject('discountHelper', 'App\Helpers\DiscountHelper')
@inject('companyReservation', 'App\Models\companyReservation')
@inject('FileHelper', 'App\Helpers\FileHelper')
<?php use App\Http\Controllers\HomeController; $i = 0; ?>

@section("header_picture")
    <div class="back_slideer_mnu">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="wow bounceInDown">
                        <h1>Activeer de spaarhulp en ontvang direct €5.-</h1>
                        <p>Spaar nu automatisch bij wel 2000+ webshops.
                            Deze betalen u tot wel 10% dinertegoed bij iedere aankoop!</p>
                        <button type="button" class="want_to_save">Ja ik wil ook sparen!</button>
                    </div>
                    <div class="drop_icon_show">
                        <a href=""><i class="fa fa-chevron-down"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('content')
    <section>
        <div class="filter_sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="filter_main_inner">
                            <?php echo Form::open(array('url' => 'preferences', 'method' => 'post', 'class' => 'ui form')); ?>

                            @if(Request::has('date'))
                                <input type="hidden" name="date" value="<?php echo Request::get('date'); ?>" />
                            @endif

                            @if(Request::has('time'))
                                <input type="hidden" name="time" value="<?php echo Request::get('time'); ?>" />
                            @endif

                            @if(Request::has('time'))
                                <input type="hidden" name="time_format" value="<?php echo date('Hi', strtotime(Request::get('time'))); ?>" />
                            @endif
                            <input type="hidden" id="typePage" name="typePage" value="1" />
                            <input type="hidden" name="q" value="<?php echo Request::get('q'); ?>" />
                            @if(Request::has('persons'))
                                <input type="hidden" name="persons" value="<?php echo Request::get('persons'); ?>" />
                            @endif


                            <div class="drop-menu">
                                {{ Form::select('preference[]',
                                   (isset($preference[1]) ? $preference[1] : array()),
                                   (Request::has('preference') ? Request::get('preference') : ''),
                                   array('class' => 'multipleSelect', 'data-placeholder' => 'Voorkeuren', 'multiple' => 'multiple')) }}
                            </div>
                            <div class="drop-menu">
                                {{  Form::select('kitchen[]',
                                                (isset($preference[2]) ? $preference[2] : array()),
                                                (Request::has('kitchen') ? Request::get('kitchen') : ''),
                                                array('class' => 'multipleSelect', 'data-placeholder' => 'Keuken', 'multiple' => 'multiple')) }}
                            </div>
                            <div class="drop-menu">
                                {{ Form::select('price[]',
                                                        (isset($preference[4]) ? $preference[4] : array()),
                                                        (Request::has('price') ? Request::get('price') : ''),
                                                        array('class' => 'multipleSelect', 'data-placeholder' => 'Soort', 'multiple' => 'multiple')) }}
                            </div>
                            <div class="drop-menu">
                                {{ Form::select('discount[]',
                                                       (isset($preference[5]) ? $preference[5] : array()),
                                                       (Request::has('discount') ? Request::get('discount') : ''),
                                                       array('class' => 'multipleSelect', 'data-placeholder' => 'Korting', 'multiple' => 'multiple')) }}
                            </div>
                            <div class="drop-menu">

                                {{ Form::select('allergies[]',
                                                                (isset($preference[3]) ? $preference[3] : array()),
                                                                (Request::has('allergies') ? Request::get('allergies') : ''),
                                                                array('class' => 'multipleSelect', 'data-placeholder' => 'Allergieen', 'multiple' => 'multiple')) }}
                                {{--<div class="select">--}}
                                    {{--<span>Allergies</span>--}}
                                    {{--<i class="fa fa-chevron-down"></i>--}}
                                {{--</div>--}}
                                {{--<input type="hidden" name="gender">--}}
                                {{--<ul class="dropeddown">--}}
                                    {{--<li id="male">1 Allergies</li>--}}
                                    {{--<li id="female">2 Allergies</li>--}}
                                {{--</ul>--}}
                            </div>
                            <button class="btn btn-link btn-filter">
                                <img src="images/filter_img.png" class="filter_img" alt="img">
                            </button>

                            <?php echo Form::close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="clearfix"></div>
    <section>
        <div class="booking_posting">
            <div class="container">
                <div class="row">
                    @foreach ($companies as $data)
                        @foreach ($data->ReservationOptions2()->get() as $index => $deal)

                            <?php
                            $media = $data->getMedia('default');
                            $getRec = HomeController::getPersons($deal->id);
                            $count_persons = $getRec[0]->total_persons;
                            /** 270717 **/
                            if($count_persons >= $deal->total_amount)
                                continue;
                            ?>

                            @if($index + 1 % 3 == 0 || $index == 0)
                                <div class="col-md-12">
                                    @endif

                                    <div class="col-md-4 wow fadeInLeft">
                                        <div class="back_pric_ground company"
                                             data-kitchen="{{ is_array(json_decode($data->kitchens)) ? str_slug(json_decode($data->kitchens)[0]) : '' }}"
                                             data-url="{{ url('restaurant/'.$data->slug) }}"
                                             data-name="{{ $data->name }}"
                                             data-address="{{ $data->address }}"
                                             data-city="{{ $data->city }}"
                                             data-zipcode="{{ $data->zipcode }}">

                                            <div class="price_img_sec">

                                                {{--<img src="images/img_1.jpg" class="img-responsive" alt="img">--}}


                                                @if (isset($media[0]) && isset($media[0]->file_name) && file_exists(public_path($media[0]->disk. DIRECTORY_SEPARATOR . $media[0]->id . DIRECTORY_SEPARATOR . $media[0]->file_name)) )
                                                    @if($count_persons >= $deal->total_amount)
                                                        <img src="{{ url('media/'.$media[0]->id.'/'.$media[0]->file_name) }}"
                                                             alt="{{ $data->name }}" class="img-responsive"/>
                                                    @else
                                                        <a href="{{ url('restaurant/'.$data->slug).'?deal='.$deal->id }}"
                                                           title="{{ $data->name }}" style="position: relative;">
                                                            <img src="{{ url('media/'.$media[0]->id.'/'.$media[0]->file_name) }}"
                                                                 alt="{{ $data->name }}" class="img-responsive" style="opacity: .7;"/>
                                                        </a>
                                                    @endif
                                                @else

                                                    @if($deal->image != null  &&  file_exists(public_path('images/deals/'  . $deal->image)))
                                                        <a href="{{ url('restaurant/'.$data->slug).'?deal='.$deal->id }}"
                                                           title="{{ $data->name }}" data-url="" style="position: relative;">
                                                            <img src="{{ url('images/deals/' . $deal->image) }}" alt="{{ $data->name }}" class="img-responsive" />

                                                        </a>
                                                    @else
                                                        <a href="{{ url('restaurant/'.$data->slug).'?deal='.$deal->id }}"
                                                           title="{{ $data->name }}" data-url="" style="position: relative;">
                                                            <img src="{{ url('images/placeholdimagerest.png') }}" alt="{{ $data->name }}"
                                                                 class="img-responsive"/>
                                                        </a>
                                                    @endif
                                                @endif
                                                {{--<div class="offer_present_iiner">--}}
                                                {{--<img src="images/offer_persent.png" class="offer_pric" alt="img">--}}
                                                {{--<span>50%</span>--}}
                                                {{--</div>--}}

                                                {!! $discountHelper->replaceKeys(
                                                        $data,
                                                        $data->days,
                                                        (isset($contentBlock[44]) ? $contentBlock[44] : ''),
                                                        'ui green label'
                                                    )
                                                !!}

                                                <div class="button_ptice_loc">
                                                    <button type="button" class="price_rate">

                                                        @if($deal->price_from >= 1)
                                                            <del class="price">
                                                                &euro; {{ $deal->price_from }}
                                                            </del> &nbsp; &nbsp;
                                                        @else
                                                            <span class="price price_min_box"></span>
                                                        @endif

                                                        <span class="price2">
                                                            &euro; {{ $deal->price }}
                                                        </span>
                                                    </button>
                                                    <div class="loc_sec_main">
                                                        {{--<a href="">Bodega Maxima</a> | <a href=""><i class="fa fa-map-marker" aria-hidden="true"></i>--}}
                                                        {{--Eindhoven</a> | <a href=""><i class="fa fa-floppy-o" aria-hidden="true"></i>--}}
                                                        {{--Save</a>--}}

                                                        {{--<span class="stars"><img src="{{ asset('images/stars.png') }}" alt="stars" style="width: initial;">5.00</span>--}}
                                                        {{ $data->name }}
                                                        <?php
                                                        if ($data->kitchens != 'null' && $data->kitchens != NULL && $data->kitchens != '[""]') {
                                                            $kitchens = json_decode($data->kitchens);
                                                            echo '<a href="' . url('search?q=' . $kitchens[0]) . '"><i class="food icon"></i> ' . ucfirst($kitchens[0]) . '</a>';
                                                        }
                                                        ?>

                                                        @if(isset($onFavoritePage))
                                                            <a href="{{ url('account/favorite/companies/remove/'.$data->id.'/'.$data->slug) }}">
                                                                <span><i class="empty star red icon"></i> Verwijder van favorieten</span>
                                                            </a>
                                                        @else
                                                            @if($userAuth == TRUE)
                                                                <a class="save button"
                                                                   href="{{ url('account/favorite/companies/add/'.$data->id.'/'.$data->slug) }}">
                                                                    <span><i class="save icon"></i> Bewaren</span>
                                                                </a>
                                                            @else
                                                                <a class="login save button"
                                                                   href="{{ url('account/favorite/companies/add/'.$data->id.'/'.$data->slug) }}"
                                                                   data-type-redirect="1"
                                                                   data-type="login"
                                                                   data-redirect="{{ url('account/favorite/companies/add/'.$data->id.'/'.$data->slug) }}">
                                                                    <span><i class="save icon"></i> Bewaren</span>
                                                                </a>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="heading_price_sec">
                                                <h1>@if($count_persons >= $deal->total_amount)
                                                        {{ $deal->name }}
                                                    @else
                                                        <a href="{{ url('restaurant/'.$data->slug).'?deal='.$deal->id }}"
                                                           title="{{ $data->name }}">{{ $deal->name }}</a>

                                                    @endif</h1>

                                                <p class="hidden-xs0"><b>{!! substr(strip_tags($deal->description), 0, 107) !!}</b></p>

                                                {{--<div class="avilable_to_people">--}}
                                                {{--<i class="fa fa-caret-left" aria-hidden="true"></i>--}}
                                                {{--<button type="button" class="timing_buton gey_btn">08:00</button>--}}
                                                {{--<button type="button" class="timing_buton gey_btn">08:00</button>--}}
                                                {{--<button type="button" class="timing_buton">08:00</button>--}}
                                                {{--<button type="button" class="timing_buton">08:00</button>--}}
                                                {{--<button type="button" class="timing_buton">08:00</button>--}}
                                                {{--<i class="fa fa-caret-right" aria-hidden="true"></i>--}}
                                                {{--</div>--}}
                                                <a href="{{ url('restaurant/'.$data->slug).'?deal='.$deal->id }}" class="more_info_buton"><strong>Meer info</strong></a>
                                                <a href="{{ url('future-deal/'.$data->slug).'?deal='.$deal->id }}" class="more_info_buton"><strong>Koop deal </strong></a>
                                            </div>
                                        </div>
                                    </div>

                                    @if($index + 1 % 3 === 0)
                                </div>
                            @endif

                        @endforeach
                    @endforeach

                    {{--<div class="col-md-4 wow fadeIn">--}}
                    {{--<div class="back_pric_ground">--}}
                    {{--<div class="price_img_sec">--}}
                    {{--<img src="images/img_2.jpg" class="img-responsive" alt="img">--}}
                    {{--<div class="offer_present_iiner">--}}
                    {{--<img src="images/offer_persent.png" class="offer_pric" alt="img">--}}
                    {{--<span>50%</span>--}}
                    {{--</div>--}}
                    {{--<div class="button_ptice_loc">--}}
                    {{--<button type="button" class="price_rate">€ 16.99</button>--}}
                    {{--<div class="loc_sec_main">--}}
                    {{--<a href="">Cafe Restaurant Het Swaard</a> | <a href=""><i class="fa fa-map-marker" aria-hidden="true"></i>--}}
                    {{--Valkenswaard</a> | <a href=""><i class="fa fa-floppy-o" aria-hidden="true"></i>--}}
                    {{--Save</a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="heading_price_sec">--}}
                    {{--<h1>Dinner voucher € 20.- Free choice of--}}
                    {{--card at Cafe-Restaurant de Swaard--}}
                    {{--(Hotel de Valk).  </h1>--}}
                    {{--<p>This gift voucher is valid for 1 person and has a value of € 20.- with a free choice of card at...</p>--}}
                    {{--<div class="avilable_to_people">--}}
                    {{--<i class="fa fa-caret-left" aria-hidden="true"></i>--}}
                    {{--<button type="button" class="timing_buton gey_btn">08:00</button>--}}
                    {{--<button type="button" class="timing_buton gey_btn">08:00</button>--}}
                    {{--<button type="button" class="timing_buton">08:00</button>--}}
                    {{--<button type="button" class="timing_buton">08:00</button>--}}
                    {{--<button type="button" class="timing_buton">08:00</button>--}}
                    {{--<i class="fa fa-caret-right" aria-hidden="true"></i>--}}
                    {{--</div>--}}
                    {{--<button type="button" class="more_info_buton">MORE INFO</button>--}}
                    {{--<button type="button" class="more_info_buton">BUY DEAL</button>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 wow fadeInRight">--}}
                    {{--<div class="back_pric_ground">--}}
                    {{--<div class="price_img_sec">--}}
                    {{--<img src="images/img_3.jpg" class="img-responsive" alt="img">--}}
                    {{--<div class="offer_present_iiner">--}}
                    {{--<img src="images/offer_persent.png" class="offer_pric" alt="img">--}}
                    {{--<span>50%</span>--}}
                    {{--</div>--}}
                    {{--<div class="button_ptice_loc">--}}
                    {{--<button type="button" class="price_rate"><del style="font-size: 13px; margin-right: 3px">€ 29.75 </del>€ 16.99</button>--}}
                    {{--<div class="loc_sec_main">--}}
                    {{--<a href="">Javaans Eetcafe</a> | <a href=""><i class="fa fa-map-marker" aria-hidden="true"></i>--}}
                    {{--Eindhoven</a> | <a href=""><i class="fa fa-floppy-o" aria-hidden="true"></i>--}}
                    {{--Save</a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="heading_price_sec">--}}
                    {{--<h1>Indonesian 3 course menu with--}}
                    {{--choice of meat or fish!  </h1>--}}
                    {{--<p>As you can already find out, the Javaans Eetcafé is a place where you can enjoy Indonesian... </p>--}}
                    {{--<div class="avilable_to_people">--}}
                    {{--<i class="fa fa-caret-left" aria-hidden="true"></i>--}}
                    {{--<button type="button" class="timing_buton gey_btn">08:00</button>--}}
                    {{--<button type="button" class="timing_buton gey_btn">08:00</button>--}}
                    {{--<button type="button" class="timing_buton">08:00</button>--}}
                    {{--<button type="button" class="timing_buton">08:00</button>--}}
                    {{--<button type="button" class="timing_buton">08:00</button>--}}
                    {{--<i class="fa fa-caret-right" aria-hidden="true"></i>--}}
                    {{--</div>--}}
                    {{--<button type="button" class="more_info_buton">MORE INFO</button>--}}
                    {{--<button type="button" class="more_info_buton">BUY DEAL</button>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </section>
@endsection

@section("after_styles")
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/custom.css") }}" rel="stylesheet">
    <link href="{{ asset("css/animate-min.css") }}" rel="stylesheet">

    <style>
        .header {
            top: 0;
        }
        .back_slideer_mnu {
            margin-top: 40px;
        }
    </style>
@endsection

@section("after_scripts")
    <script src="{{ asset('js/bootstrap.min.js') }} "></script>
    <script src="{{ asset("js/wow.js") }}"></script>
    <script src="{{ asset("js/script.js") }}"></script>

    <script>
        $(function() {
            hideandshow($("#searchbox"), $("#search-bar"), 300);
        });

        function hideandshow(e, n, a) {
            var c = !1;
            e.click(function(e) {
                c ? n.slideUp(a) : n.slideDown(a);
                c = !c;
                e.preventDefault();
            });
        }
    </script>
@endsection