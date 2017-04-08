<?php $i = 0; ?>

@inject('discountHelper', 'App\Helpers\DiscountHelper')
@inject('companyReservation', 'App\Models\companyReservation')

@foreach ($companies as $data)


    @foreach ($data->ReservationOptions()->get() as $deal)

        <?php
        $media = $data->getMedia('default');
        ?>
        <div class="company hidden"
             data-kitchen="{{ is_array(json_decode($data->kitchens)) ? str_slug(json_decode($data->kitchens)[0]) : '' }}"
             data-url="{{ url('restaurant/'.$data->slug) }}"
             data-name="{{ $data->name }}"
             data-address="{{ $data->address }}"
             data-city="{{ $data->city }}"
             data-zipcode="{{ $data->zipcode }}">
            <div class="image" style="width: auto !important;">
                <div title="{{ $data->name }}" class="computerImage">
                    @if (isset($media[0]))
                        <a href="{{ url('restaurant/'.$data->slug) }}" title="{{ $data->name }}">
                            <img src="{{ url($media[0]->getUrl('175Thumb')) }}" alt="{{ $data->name }}" style="width: 275px; height: 235px;" />
                        </a>
                    @else
                        <a href="{{ url('restaurant/'.$data->slug) }}" title="{{ $data->name }}">
                            <img src="{{ url('images/placeholdimage.png') }}" alt="{{ $data->name }}" style="width: 275px; height: 235px;" />
                        </a>
                    @endif

                    {!! $discountHelper->replaceKeys(
                            $data,
                            $data->days,
                            (isset($contentBlock[44]) ? $contentBlock[44] : ''),
                            'ui green label'
                        )
                    !!}
                </div>

                <!-- Mobile -->
                <div class="mobileImage">
                    <a href="{{ url('restaurant/'.$data->slug) }}" title="{{ $data->name }}">
                        @if(isset($media[0]))
                            <img src="{{ url($media[0]->getUrl('mobileThumb')) }}"  style="width: 275px; height: 235px;"/>
                        @else
                            <img src="{{ url('images/placeholdimage.png') }}" style="width: 275px; height: 235px;" />
                        @endif
                    </a>

                    {!! $discountHelper->replaceKeys(
                            $data,
                            $data->days,
                            (isset($contentBlock[44]) ? $contentBlock[44] : ''),
                            'ribbon-wrapper thumb-discount-label'
                        )
                    !!}
                </div>

                <div class="mobileInfo">
                    <div class="right">
                        <a href="{{ url('restaurant/'.$data->slug) }}" title="{{ $data->name }}">
                            <h2>{{ $deal->name }}</h2>
                        </a>

                        <a href="{{ url('search?q='.$data->city) }}">
                            <span>{{ $data->name }} | <i class="marker icon"></i> {{ $data->city }}&nbsp;</span>
                        </a>

                        <?php
                        if(
                            $data->kitchens != 'null'
                            && $data->kitchens != NULL
                            && $data->kitchens != '[""]'
                        ) {
                            $kitchens = json_decode($data->kitchens);
                            echo '<a href="'.url('search?q='.$kitchens[0]).'"><i class="food icon"></i> '.ucfirst($kitchens[0]).'</a>';
                        }
                        ?>

                        @if(isset($onFavoritePage))
                            <a href="{{ url('account/favorite/companies/remove/'.$data->id.'/'.$data->slug) }}">
                                <span><i class="save red icon"></i> Verwijder van favorieten</span>
                            </a>
                        @else
                            @if($userAuth == TRUE)
                                <a href="{{ url('account/favorite/companies/add/'.$data->id.'/'.$data->slug) }}">
                                    <span><i class="save icon"></i> Bewaren</span>
                                </a>
                            @else
                                <a class="login button"
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
                <!-- Mobile -->
            </div>

            <div class="text">
                <a href="{{ url('restaurant/'.$data->slug) }}" title="{{ $data->name }}">
                    <h2>{{ $deal->name }}</h2>
                </a>
                {{--<span> Van: <strike>{{ $data->price_from }}</strike> | Voor: {{ $data->price }}</span>--}}
                <div class="info">
                    <a href="{{ url('search?q='.$data->city) }}">{{ $data->name }} | <span><i class="marker icon"></i> {{ $data->city }}&nbsp;</span></a>

                    <?php
                    if(
                        $data->kitchens != 'null'
                        && $data->kitchens != NULL
                        && $data->kitchens != '[""]'
                    ) {
                        $kitchens = json_decode($data->kitchens);
                        echo '<a href="'.url('search?q='.$kitchens[0]).'"><i class="food icon"></i> '.ucfirst($kitchens[0]).'</a>';
                    }
                    ?>

                    @if(isset($onFavoritePage))
                        <a href="{{ url('account/favorite/companies/remove/'.$data->id.'/'.$data->slug) }}">
                            <span><i class="empty star red icon"></i> Verwijder van favorieten</span>
                        </a>
                    @else
                        @if($userAuth == TRUE)
                            <a class="save button" href="{{ url('account/favorite/companies/add/'.$data->id.'/'.$data->slug) }}">
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
              
                <p>{{ str_limit($deal->description, (isset($limitChar) ? $limitChar : 210)) }}</p>

                {!!
                    $companyReservation->getTimeCarousel(
                        isset($reservationDate) ? $reservationDate : NULL,
                        $data,
                        Request::input('persons', 2),
                        $reservationTimesArray,
                        $tomorrowArray,
                        Request::input('date')
                    )
                !!}

                <div style="display: inline; float: right; font-size: 20px; color: #5e80b2;">
                   <span style="position: relative; font-weight: normal;  ">
                        <s>&euro; {{ $deal->price_from }}</s>
                    </span>
                    <span style="position: relative;  font-weight: bold; margin-top:10px; margin-left: 10px;">
                        &euro; {{ $deal->price }}
                    </span>
                </div>
                
              <br><br>
                <div style="display: block;">
                <div style="display: inline;">
                    {{--<span style="position: relative; font-weight: bold; ">--}}
                        {{--<s>{{ $deal->price_from }}</s>--}}
                    {{--</span>--}}
                    {{--<span style="position: relative;  font-weight: bold; margin-top:10px; margin-left: 10px;">--}}
                        {{--{{ $deal->price }}--}}
                    {{--</span>--}}
                </div>

                <div style="display: inline;">
                    <a class="deal_btn" style="float: right;" href="{{ url('restaurant/'.$data->slug).'?deal='.$data->id }}">NAAR DE DEAL</a>
                    {{--<img src="{{ url('images/pricetag.png') }}" style="width: 90px">--}}
                </div>
                </div>

            </div>
            <div class="clear"></div>
        </div>
    @endforeach

@endforeach