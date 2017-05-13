@extends('template.theme')
@section('content')
<div class="clear" style="height: 80px;">&nbsp;</div>
<div class="container" style="min-height: 500px">
    <div class="col-sm-12 col-ms1">
        <div class="col-sm-3 col5">
            <ul>
                @foreach($futureDeals as $futureDeal)
                <li>
                    <div class="ob">
                        @if (isset($futureDeal->file_name) && file_exists(public_path($futureDeal->disk. DIRECTORY_SEPARATOR . $futureDeal->media_id . DIRECTORY_SEPARATOR . $futureDeal->file_name)) )
                        <a href="{{ url('restaurant/'.$futureDeal->company_slug)}}" title="{{ $futureDeal->company_name }}">
                            <img width="420" src="{{ url('media/'.$futureDeal->media_id.'/'.$futureDeal->file_name) }}" alt="{{ $futureDeal->company_name }}"  />
                        </a>
                        @else
                        <a href="{{ url('restaurant/'.$futureDeal->company_slug)}}" title="{{ $futureDeal->company_name }}">
                            <img src="{{ url('images/placeholdimagerest.png') }}" alt="{{ $futureDeal->company_name }}" class="thumbnails"  />
                        </a>
                        @endif                        
                    </div>
                    <div class="text3" style="min-height: 280px;">
                        <strong>{{$futureDeal->deal_name}}</strong>
                        <span class="city">
                            
                            <a href="{{ url('search?q='.$futureDeal->city) }}">
                                <span>
                                    {{ $futureDeal->company_name }}
                                </span>
                                 | 
                                <span>                                    
                                    <i class="marker icon"></i> {{ $futureDeal->city }}&nbsp;
                                </span>
                            </a>
                        </span>

                        <span class="stars"><img src="{{ asset('images/stars.png') }}" alt="stars">5.00</span>                        
                        <p>{{ $futureDeal->company_disc }}</p>
                        <div><b>Beschikbar voor {{$futureDeal->remain_persons}} personen</b></div>
                        <br />
                        <a href="#" class="more">Reserveer nu</a>
                    </div>
                </li>
                @endforeach
            </ul>                
        </div>
    </div>
</div>

@stop