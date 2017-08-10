@extends('template.theme')

@section('content')


    <div class="container">
        @include('admin.template.breadcrumb')

        <style>
            .skill-panel-text{
                color: white;
            }
            .skill-title{
                
                font-size: 3em;
                font-weight: bold;
                padding-bottom: 30px;
            }

            .skill-sub{
                font-size: 1.2em;
                font-weight: bold;
            }
            .chart-box{
                background: #fff;
                border: 1px solid #eee;
            }
            li h3, li h4{
                padding: 0;
                margin: 0;
                line-height: 11px;
            }
            thead tr{
                background: #2BBBAD;
            }
            .btn-danger{
                background: #C64333;
            }
            .btn-danger:hover{
                background: #DD4B39;
            }
            .btn-primary{
                background: #0650A2;
            }
            .btn-primary:hover{
                background: #146ABC;
            }

            .skill-panel-box, .chart-blog{
                margin-bottom: 10px;
            }
        </style>

        <div class="ui grid well">
            <div class="sixteen wide mobile four wide computer column">
                <div class="ui normal floating basic search selection dropdown">
                    <input type="hidden" name="source" value="{{ Request::input('source') }}">

                    <div class="text">Partij</div>
                    <i class="dropdown icon"></i>

                    <div class="menu">
                        <a href="{{ url('admin/statistics/reservations?'.http_build_query(array_add($queryString, 'source', 'seatme'))) }}" data-value="seatme" class="item">SeatMe</a>
                        <a href="{{ url('admin/statistics/reservations?'.http_build_query(array_add($queryString, 'source', 'eetnu'))) }}" data-value="eetnu" class="item">EetNU</a>
                        <a href="{{ url('admin/statistics/reservations?'.http_build_query(array_add($queryString, 'source', 'couverts'))) }}" data-value="couverts" class="item">Couverts</a>
                        <a href="{{ url('admin/statistics/reservations?'.http_build_query(array_add($queryString, 'source', 'wifi'))) }}" data-value="wifi" class="item">Wi-Fi</a>

                        @if (count($sources) >= 1)
                            @foreach ($sources as $source)
                                <a href="{{ url('admin/statistics/reservations?'.http_build_query(array_add($queryString, 'source', str_slug($source)))) }}" data-value="{{ $source }}" class="item">{{ $source }}</a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="sixteen wide mobile ten wide computer column">
                <?php echo Form::open(array('method' => 'get')) ?>

                <div class="ui input">
                    <?php
                    echo Form::text(
                        'from',
                        '',
                        array(
                            'class' => 'datepicker_no_min_date',
                            'placeholder' => 'Startdatum'
                        )
                    );
                    ?>
                </div>

                <div class="ui input">
                    <?php
                    echo Form::text(
                        'to',
                        '',
                        array(
                            'class' => 'datepicker_no_min_date',
                            'placeholder' => 'Einddatum'
                        )
                    );
                    ?>
                </div>

                <button class="ui button" type="submit"><i class="search icon"></i></button>
                <?php echo Form::close(); ?>

            </div>
        </div>

       

         <div class="skill-blog" style="background: transparent !important;">
        <div class="skill-panel">
                <div class="row">
                    <div class="col-md-3 col-xs-12">
                        <div class="skill-panel-box massage">
                            <div class="skill-panel-inner-icon">
                                <i class="fa fa-comments">
                                </i>
                            </div>
                            <div class="skill-panel-text">
                                <div class="skill-title">
                                    {{ count(\App\User::all()) }}
                                </div>
                                <div class="skill-sub"> 
                                gebruikers
                                </div>
                                
                            </div>
                            <div class="skill-panel-icon">
                                <i class="fa fa-angle-right">
                                </i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="skill-panel-box usar">
                            <div class="skill-panel-inner-icon">
                                <i class="fa fa-user">
                                </i>
                            </div>
                            <div class="skill-panel-text">
                                <div class="skill-title">
                                    {{--{{ $topStatistics->topCompanies }}--}}
                                    {{ count(\App\Models\Company::all()) }}
                                </div>
                                <div class="skill-sub">                                        
                                    bedrijven
                                </div>
                              
                            </div>
                            <div class="skill-panel-icon">
                                <i class="fa fa-angle-right">
                                </i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="skill-panel-box email">
                            <div class="skill-panel-inner-icon">
                                <i class="fa fa-envelope-o">
                                </i>
                            </div>
                            <div class="skill-panel-text">
                                <div class="skill-title">
                                    {{--{{ $topStatistics->topAffiliate }}--}}
                                    {{ count(\App\Models\Affiliate::all()) }}
                                </div>
                                <div class="skill-sub">
                                    affiliaties
                                </div>
                               
                            </div>
                            <div class="skill-panel-icon">
                                <i class="fa fa-angle-right">
                                </i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="skill-panel-box note">
                            <div class="skill-panel-inner-icon">
                                <i class="fa fa-pencil-square-o">
                                </i>
                            </div>
                            <div class="skill-panel-text">
                                <div class="skill-title">
                                    {{--{{ $topStatistics->topReservations }}--}}
                                    {{ $totalReservation }}
                                </div>
                                <div class="skill-sub">
                                    reserveringens
                                </div>
                            </div>
                            <div class="skill-panel-icon">
                                <i class="fa fa-angle-right">
                                </i>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>

            

    </div>

    </div>
    


@endsection