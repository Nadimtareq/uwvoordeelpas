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
            .stats-table{
                height: 400px;
            }
    </style>
    <div class="side_menus">
        {{Form::open(array('url' => 'preferences', 'method' => 'post', 'class' => 'ui form'))}}
        <div class="content">
            <div class="row">
                <div class="jsearch col-md-3 col-sm-3 col-xs-6">
                    <div class="ui normal floating basic search selection dropdown">
                        <input name="source" type="hidden" value="{{ Request::input('source') }}">
                            <div class="text">
                                Partij
                            </div>
                            <i class="dropdown icon">
                            </i>
                            <div class="menu">
                                <a class="item" data-value="seatme" href="{{ url('admin/statistics/reservations?'.http_build_query(array_add($queryString, 'source', 'seatme'))) }}">
                                    SeatMe
                                </a>
                                <a class="item" data-value="eetnu" href="{{ url('admin/statistics/reservations?'.http_build_query(array_add($queryString, 'source', 'eetnu'))) }}">
                                    EetNU
                                </a>
                                <a class="item" data-value="couverts" href="{{ url('admin/statistics/reservations?'.http_build_query(array_add($queryString, 'source', 'couverts'))) }}">
                                    Couverts
                                </a>
                                <a class="item" data-value="wifi" href="{{ url('admin/statistics/reservations?'.http_build_query(array_add($queryString, 'source', 'wifi'))) }}">
                                    Wi-Fi
                                </a>
                                @if (count($sources) >= 1)
                            @foreach ($sources as $source)
                                <a class="item" data-value="{{ $source }}" href="{{ url('admin/statistics/reservations?'.http_build_query(array_add($queryString, 'source', str_slug($source)))) }}">
                                    {{ $source }}
                                </a>
                                @endforeach
                        @endif
                            </div>
                        </input>
                    </div>
                </div>
                <div class="jsearch col-md-3 col-sm-3 col-xs-6">
                    <?php echo Form::open(array('method' =>
                    'get')) ?>
                    <div class="ui input">
                        <?php
                    echo Form::text(
                        'from',
                        '',
                        array(
                            'class' =>
                        'datepicker_no_min_date',
                            'placeholder' => 'Startdatum'
                        )
                    );
                    ?>
                    </div>
                </div>
                <div class="jsearch col-md-3 col-sm-3 col-xs-6">
                    <div class="ui input">
                        <?php
                    echo Form::text(
                        'to',
                        '',
                        array(
                            'class' =>
                        'datepicker_no_min_date',
                            'placeholder' => 'Einddatum'
                        )
                    );
                    ?>
                    </div>
                </div>
                <div class="jsearch col-md-2 col-sm-2 col-xs-6">
                    <button class="ui button btn-primary" type="submit">
                        <i class="search icon">
                        </i>
                    </button>
                </div>
            </div>
        </div>
        <?php echo Form::close(); ?>
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
    <div class="panel panel-default">
        <div class="panel-body">
            <?php
// echo count($topDays);
if (count($topDays) >= 1):
    $topDaysList=[];
    foreach ($topDays as $index=>$topDay):
        $topDaysList[] = [$dayName[$topDay->nameRow + 1], $topDay->countRow];
        if($index >= 6) { break;}
    endforeach;

endif;


$topDaysData = Lava::DataTable();
$topDaysData->addStringColumn('Most reserved days in the week')
        ->addNumberColumn('Percent')
        ->addRows($topDaysList);

Lava::PieChart('topDays', $topDaysData, [
    'is3D'   => true,
    'slices' => [
        ['offset' => 0.2],
        ['offset' => 0.25],
        ['offset' => 0.3]
    ]
]);


// Top times chart
if (count($topTimes) >= 1):
    $topTimesList=[];
    foreach ($topTimes as $index=>$topTime):
        $topTimesList[] = [date('H:i', strtotime($topTime->nameRow)), $topTime->countRow];
        if($index >= 6) { break;}
    endforeach;

endif;


$topTimesData = Lava::DataTable();
$topTimesData->addStringColumn('Most reserved days in the week')
        ->addNumberColumn('Percent')
        ->addRows($topTimesList);

Lava::PieChart('topTimes', $topTimesData, [
    'is3D'   => true,
    'slices' => [
        ['offset' => 0.2],
        ['offset' => 0.25],
        ['offset' => 0.3]
    ]
]);

// Top Persons chart
if (count($topPersons) >= 1):
    $topPersonsList=[];
    foreach ($topPersons as $index=>$topPerson):
        $topPersonsList[] = [ $topPerson->nameRow.' '.$topPerson->nameRow == 1 ? 'persoon' : 'personen', $topPerson->countRow];
        if($index >= 6) { break;}
    endforeach;

endif;


$topPersonsData = Lava::DataTable();
$topPersonsData->addStringColumn('Most reserved days in the week')
        ->addNumberColumn('Percent')
        ->addRows($topPersonsList);

Lava::PieChart('topPersons', $topPersonsData, [
    'is3D'   => true,
    'slices' => [
        ['offset' => 0.2],
        ['offset' => 0.25],
        ['offset' => 0.3]
    ]
]);
?>
        </div>
    </div>
    <style>
        .chart-box{
            min-height: 300px;
        }
    </style>
    <div class="chart-panel">
        <div class="container">
            <div class="row">
                <div class="col-md-4 chart-blog">
                    <div class="chart-box">
                        <div class="chart-text text-center">
                            <h5>
                                Top reservering: dagen
                            </h5>
                        </div>
                        <div id="donut-example" style="height: 250px;">
                            <div id="topDaysChart-div">
                            </div>
                            <?= Lava::render('PieChart', 'topDays', 'topDaysChart-div') ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 chart-blog">
                    <div class="chart-box">
                        <div class="chart-text text-center">
                            <h5>
                               Top reservering: tijden
                            </h5>
                            
                        </div>
                        <div id="donut-example1">
                         <div id="donut-example" style="height: 250px;">
                            <div id="topTimesChart-div">
                            </div>
                            <?= Lava::render('PieChart', 'topTimes', 'topTimesChart-div') ?>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 chart-blog">
                    <div class="chart-box">
                        <div class="chart-text text-center">
                            <h5>
                               Top reservering: personen
                            </h5>
                            
                        </div>
                        <div id="donut-example2">
                        <div id="topPersonsChart-div">
                            </div>
                            <?= Lava::render('PieChart', 'topPersons', 'topPersonsChart-div') ?>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="row">
                   
                    <div class="col-md-4">
                        <div class="stats-table ui red segment bg-success">
                            
                               <h5>Top kliks: bedrijven</h5>                         
                          
                                <div class="ui divider">
                                </div>
                                <table class="table table-striped">
                                   <tbody>
                                        @if (count($topClicksCompanies) >= 1)
                                @foreach ($topClicksCompanies as $index =>$topClicksCompany)
                                        <tr>
                                            <td>
                                                {{ $topClicksCompany->nameRow }}
                                            </td>   
                                            <td>
                                                {{ $topClicksCompany->countRow }}x
                                            </td>                                         
                                        </tr>
                                          <?php if($index >=6){ break;} ?>
                                        @endforeach
                            @endif
                            </tbody>
                                  
                                </table>
                            </br>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stats-table ui green segment">
                            <h5 class="">
                                Top kliks: FAQ
                            </h5>
                            
                                <div class="ui divider">
                                </div>
                                <table class="table table-striped">
                                  <tbody>
                                        @if (count($topClicksFaqs) >= 1)
                                @foreach ($topClicksFaqs as $index=> $topClicksFaq)
                                        <tr>
                                            <td>
                                                {{ $topClicksFaq->nameRow }}
                                            </td>
                                            <td>
                                                {{ $topClicksFaq->countRow }}x
                                            </td>
                                        </tr>
                                          <?php if($index >=6){ break;} ?>
                                        @endforeach
                            @endif
                                    </tbody>
                                </table>
                            </br>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stats-table ui red segment">
                            <h5 class="">
                                Top kliks: affiliaties
                            </h5>
                       
                                <div class="ui divider">
                                </div>
                                <table class="table table-striped">
                                    
                                    <tbody>
                                        @if (count($topClicksAffiliates) >= 1)
                                @foreach ($topClicksAffiliates as $index=>$topClicksAffiliate)
                                        <tr>
                                            <td>
                                                {{ $topClicksAffiliate->nameRow }}
                                            </td>
                                            <td>
                                                {{ $topClicksAffiliate->countRow }}x
                                            </td>
                                        </tr>
                                        <?php if($index >=6){ break;} ?>
                                        @endforeach
                            @endif
                                    </tbody>
                                </table>
                            </br>
                        </div>
                    </div>
                </div>
            

    @endsection
</div>
