@extends('template.theme', ['search_header' => 'true'])

{{--*/ $pageTitle = 'Zoeken' /*--}}
@section("header_picture")
   @include('pages._search-slider')
@endsection 
@section('content')
    
    <script type="javascript">
        var searchPage = 1;
    </script>
    <div class="clearfix"></div>
     @include('pages.search-filter')
   
    <div class="clearfix"></div>
    <!--
    <section id="prices">
            <div class="container">
                <div class="col-sm-12 col-ms1">
                    <div class="col-sm-3 col5">
                        <ul>
                            <li>
                                <div class="ob"><img src="images/g1.jpg" alt="g1"><i>50%</i></div>
                                <div class="text3">
                                    <strong>3 gangen keuzemenu met vlees / vis</strong>
                                    <span class="city"><i class="material-icons">place</i>New York, USA</span>
                                    <span class="stars"><img src="images/stars.png" alt="stars">5.00</span>
                                    <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
                                    <div class="wr">
                                        <b>Vandaag beschikbar voor 2 personen</b>
                                        <div class="calendar">
                                            <a href="#" class="prev"><img src="images/prev2.png" alt="prev2"></a>
                                            <ul>
                                                <li><a href="#">18:00</a></li>
                                                <li><a href="#">18:15</a></li>
                                                <li><a href="#">18:30</a></li>
                                                <li><a href="#">18:45</a></li>
                                                <li><a href="#">19:00</a></li>
                                            </ul>
                                            <a href="#" class="next"><img src="images/next2.png" alt="next2"></a>
                                        </div>
                                    </div>
                                    <span class="price">€ 12.95</span>
                                    <span class="price2">€ 12.95</span>
                                    <a href="#" class="more">Reserveer nu</a>
                                </div>
                            </li>

                        </ul>
                        <div class="pages">
                            <a href="#" class="prev2">&lt;</a>
                            <ul>
                                <li><a href="#">1</a></li>
                                <li><a href="#" class="active">2</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">8</a></li>
                            </ul>
                            <a href="#" class="next2">&gt;</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    -->

    <section  id="search-list" >
        <div class="container">
            <div class="col-sm-12 col-ms1">
                <div class="col-sm-3 col5">
                    @if (count($companies) >= 1)
{{--  
                        <div class="search-layout">
                            <div class="pull-right">

                                <span class="rs">View</span>

                                <a href="{{ url("search?regio=eindhoven&layout=grid") }}" class="active">
                                    <img src="{{ url("images/one.png") }}" alt="one">
                                </a>

                                <a href="{{ url("search?regio=eindhoven") }}">
                                    <img src="{{ url("images/two.png") }}" alt="two">
                                </a>

                            </div>
                        </div>  --}}

                        @include('company-list')

                        @if (count($recommended) >= 1)
                            <h3 class="ui header">Zie ook</h3>

                            @include('company-list-more', ['viewType' => 'more'])
                        @endif

                        @if($countCompanies >= 16)
                            <div id="limitSelect" class="ui basic segment">
                                <div class="ui normal floating icon selection dropdown">
                                    <i class="dropdown right floated icon"></i>
                                    <div class="text">{{ $limit }} resultaten weergeven</div>

                                    <div class="menu">
                                        <a class="item" href="{{ url('search?'.http_build_query(array_add($queryString, 'limit', '15'))) }}">15</a>
                                        <a class="item" href="{{ url('search?'.http_build_query(array_add($queryString, 'limit', '30'))) }}">30</a>
                                        <a class="item" href="{{ url('search?'.http_build_query(array_add($queryString, 'limit', '45'))) }}">45</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {!! $companies->appends($paginationQueryString)->render() !!}
                    @else
                        Er zijn geen restaurants gevonden met uw selectiecreteria.
                    @endif
                </div>
            </div>

            {{--   <div class="right section">
               @include('template.sidebar')
             </div>  --}}
        </div>
    </section>

    <div class="clear"></div>
@stop

@section("after_styles")
    <link href="{{ asset("css/custom.css") }}" rel="stylesheet">
@endsection