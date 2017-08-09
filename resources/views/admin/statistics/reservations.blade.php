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
                    <div class="col-md-3 col-xs-6">
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
                    <div class="col-md-3 col-xs-6">
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
                    <div class="col-md-3 col-xs-6">
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
                    <div class="col-md-3 col-xs-6">
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

                     <div class="chart-panel">
            <div class="containe">
                <div class="row">
                    <div class="col-lg-3 chart-blog">
                        <div class="chart-box">
                            <div class="chart-text">
                                <h5>
                                    Most Browser Used
                                </h5>
                                <p>
                                    Duis autem vel eum iriure dolor in hendrerit in vulputate...
                                </p>
                            </div>
                            <div id="donut-example" style="height: 250px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 chart-blog">
                        <div class="chart-box">
                            <div class="chart-text">
                                <h5>
                                    Most Browser Used
                                </h5>
                                <p>
                                    Duis autem vel eum iriure dolor in hendrerit in vulputate...
                                </p>
                            </div>
                            <div id="donut-example1" style="height: 250px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 chart-blog">
                        <div class="chart-box">
                            <div class="chart-text">
                                <h5>
                                    Most Browser Used
                                </h5>
                                <p>
                                    Duis autem vel eum iriure dolor in hendrerit in vulputate...
                                </p>
                            </div>
                            <div id="donut-example2" style="height: 250px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 chart-blog">
                        <div class="chart-box">
                            <div class="chart-text">
                                <h5>
                                    Most Browser Used
                                </h5>
                                <p>
                                    Duis autem vel eum iriure dolor in hendrerit in vulputate...
                                </p>
                            </div>
                            <div id="donut-example3" style="height: 250px;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 chart-button">
                        <button>
                            more info
                        </button>
                        <button>
                            active
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="chart-skill-panel">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 chart-skill-panel-blog">
                        <div class="chart-skill-panel-chart">
                            <div class="chart-skill-panel-text">
                                <h4>
                                    Overchart Report
                                </h4>
                            </div>
                            <div id="area-example" style="height: 300px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 chart-skill-panel-blog">
                        <div class="chart-skill-panel-box">
                            <div class="chart-skill-panel-text">
                                <h4>
                                    Edit
                                </h4>
                            </div>
                            <div class="chart-skill-panel-inner">
                                <ul>
                                    <li>
                                        <h3>
                                            <i class="fa fa-comment">
                                            </i>
                                            New Comment
                                        </h3>
                                        <h4>
                                            Dec 10
                                        </h4>
                                    </li>
                                    <li>
                                        <h3>
                                            <i class="fa fa-twitter">
                                            </i>
                                            I Followers
                                        </h3>
                                        <h4>
                                            Dec 10
                                        </h4>
                                    </li>
                                    <li>
                                        <h3>
                                            <i class="fa fa-envelope">
                                            </i>
                                            Massage Sent
                                        </h3>
                                        <h4>
                                            Dec 10
                                        </h4>
                                    </li>
                                    <li>
                                        <h3>
                                            <i class="fa fa-credit-card-alt">
                                            </i>
                                            New Comment
                                        </h3>
                                        <h4>
                                            Dec 10
                                        </h4>
                                    </li>
                                    <li>
                                        <h3>
                                            <i class="fa fa-download">
                                            </i>
                                            New Task
                                        </h3>
                                        <h4>
                                            Dec 10
                                        </h4>
                                    </li>
                                    <li>
                                        <h3>
                                            <i class="fa fa-pie-chart">
                                            </i>
                                            Service Password
                                        </h3>
                                        <h4>
                                            Dec 10
                                        </h4>
                                    </li>
                                    <li>
                                        <h3>
                                            <i class="fa fa-shopping-cart">
                                            </i>
                                            service not available
                                        </h3>
                                        <h4>
                                            Dec 10
                                        </h4>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
       <div class="" style="background: #fff; padding: 20px; border-radius: 10px;">
                            <table class="table table-striped">
                                <thead>
                        
                                    <th>
                                        <input id="checkall" type="checkbox"/>
                                    </th>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Designation
                                    </th>
                                    <th>
                                        Mobile Numberl
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                    <th>
                                        Delete
                                    </th>
                        
                                </thead>
                                <tbody>
                                    <tr class="checkbox-inner">
                                        <td>
                                            <input class="checkthis" type="checkbox"/>
                                        </td>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            Irshad
                                        </td>
                                        <td>
                                            CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan
                                        </td>
                                        <td>
                                            isometric.mohsin@gmail.com
                                        </td>
                                        <td>
                                            +923335586757
                                        </td>
                                        <td class="table-icon">
                                            <p data-placement="top" data-toggle="tooltip" title="Edit">
                                                <button class="btn btn-primary btn-xs" data-target="#edit" data-title="Edit" data-toggle="modal">
                                                    <span class="fa fa-pencil">
                                                    </span>
                                                </button>
                                            </p>
                                        </td>
                                        <td class="table-icon">
                                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                <button class="btn btn-danger btn-xs" data-target="#delete" data-title="Delete" data-toggle="modal">
                                                    <span class="fa fa-trash">
                                                    </span>
                                                </button>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr class="checkbox-inner">
                                        <td>
                                            <input class="checkthis" type="checkbox"/>
                                        </td>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            Irshad
                                        </td>
                                        <td>
                                            CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan
                                        </td>
                                        <td>
                                            isometric.mohsin@gmail.com
                                        </td>
                                        <td>
                                            +923335586757
                                        </td>
                                        <td class="table-icon">
                                            <p data-placement="top" data-toggle="tooltip" title="Edit">
                                                <button class="btn btn-primary btn-xs" data-target="#edit" data-title="Edit" data-toggle="modal">
                                                    <span class="fa fa-pencil">
                                                    </span>
                                                </button>
                                            </p>
                                        </td>
                                        <td class="table-icon">
                                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                <button class="btn btn-danger btn-xs" data-target="#delete" data-title="Delete" data-toggle="modal">
                                                    <span class="fa fa-trash">
                                                    </span>
                                                </button>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr class="checkbox-inner">
                                        <td>
                                            <input class="checkthis" type="checkbox"/>
                                        </td>
                                        <td>
                                            3
                                        </td>
                                        <td>
                                            Irshad
                                        </td>
                                        <td>
                                            CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan
                                        </td>
                                        <td>
                                            isometric.mohsin@gmail.com
                                        </td>
                                        <td>
                                            +923335586757
                                        </td>
                                        <td class="table-icon">
                                            <p data-placement="top" data-toggle="tooltip" title="Edit">
                                                <button class="btn btn-primary btn-xs" data-target="#edit" data-title="Edit" data-toggle="modal">
                                                    <span class="fa fa-pencil">
                                                    </span>
                                                </button>
                                            </p>
                                        </td>
                                        <td class="table-icon">
                                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                <button class="btn btn-danger btn-xs" data-target="#delete" data-title="Delete" data-toggle="modal">
                                                    <span class="fa fa-trash">
                                                    </span>
                                                </button>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr class="checkbox-inner">
                                        <td>
                                            <input class="checkthis" type="checkbox"/>
                                        </td>
                                        <td>
                                            4
                                        </td>
                                        <td>
                                            Irshad
                                        </td>
                                        <td>
                                            CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan
                                        </td>
                                        <td>
                                            isometric.mohsin@gmail.com
                                        </td>
                                        <td>
                                            +923335586757
                                        </td>
                                        <td class="table-icon">
                                            <p data-placement="top" data-toggle="tooltip" title="Edit">
                                                <button class="btn btn-primary btn-xs" data-target="#edit" data-title="Edit" data-toggle="modal">
                                                    <span class="fa fa-pencil">
                                                    </span>
                                                </button>
                                            </p>
                                        </td>
                                        <td class="table-icon">
                                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                <button class="btn btn-danger btn-xs" data-target="#delete" data-title="Delete" data-toggle="modal">
                                                    <span class="fa fa-trash">
                                                    </span>
                                                </button>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr class="checkbox-inner">
                                        <td>
                                            <input class="checkthis" type="checkbox"/>
                                        </td>
                                        <td>
                                            5
                                        </td>
                                        <td>
                                            Irshad
                                        </td>
                                        <td>
                                            CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan
                                        </td>
                                        <td>
                                            isometric.mohsin@gmail.com
                                        </td>
                                        <td>
                                            +923335586757
                                        </td>
                                        <td class="table-icon">
                                            <p data-placement="top" data-toggle="tooltip" title="Edit">
                                                <button class="btn btn-primary btn-xs" data-target="#edit" data-title="Edit" data-toggle="modal">
                                                    <span class="fa fa-pencil">
                                                    </span>
                                                </button>
                                            </p>
                                        </td>
                                        <td class="table-icon">
                                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                <button class="btn btn-danger btn-xs" data-target="#delete" data-title="Delete" data-toggle="modal">
                                                    <span class="fa fa-trash">
                                                    </span>
                                                </button>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr class="checkbox-inner">
                                        <td>
                                            <input class="checkthis" type="checkbox"/>
                                        </td>
                                        <td>
                                            6
                                        </td>
                                        <td>
                                            Irshad
                                        </td>
                                        <td>
                                            CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan
                                        </td>
                                        <td>
                                            isometric.mohsin@gmail.com
                                        </td>
                                        <td>
                                            +923335586757
                                        </td>
                                        <td class="table-icon">
                                            <p data-placement="top" data-toggle="tooltip" title="Edit">
                                                <button class="btn btn-primary btn-xs" data-target="#edit" data-title="Edit" data-toggle="modal">
                                                    <span class="fa fa-pencil">
                                                    </span>
                                                </button>
                                            </p>
                                        </td>
                                        <td class="table-icon">
                                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                <button class="btn btn-danger btn-xs" data-target="#delete" data-title="Delete" data-toggle="modal">
                                                    <span class="fa fa-trash">
                                                    </span>
                                                </button>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr class="checkbox-inner">
                                        <td>
                                            <input class="checkthis" type="checkbox"/>
                                        </td>
                                        <td>
                                            7
                                        </td>
                                        <td>
                                            Irshad
                                        </td>
                                        <td>
                                            CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan
                                        </td>
                                        <td>
                                            isometric.mohsin@gmail.com
                                        </td>
                                        <td>
                                            +923335586757
                                        </td>
                                        <td class="table-icon">
                                            <p data-placement="top" data-toggle="tooltip" title="Edit">
                                                <button class="btn btn-primary btn-xs" data-target="#edit" data-title="Edit" data-toggle="modal">
                                                    <span class="fa fa-pencil">
                                                    </span>
                                                </button>
                                            </p>
                                        </td>
                                        <td class="table-icon">
                                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                <button class="btn btn-danger btn-xs" data-target="#delete" data-title="Delete" data-toggle="modal">
                                                    <span class="fa fa-trash">
                                                    </span>
                                                </button>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr class="checkbox-inner">
                                        <td>
                                            <input class="checkthis" type="checkbox"/>
                                        </td>
                                        <td>
                                            8
                                        </td>
                                        <td>
                                            Irshad
                                        </td>
                                        <td>
                                            CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan
                                        </td>
                                        <td>
                                            isometric.mohsin@gmail.com
                                        </td>
                                        <td>
                                            +923335586757
                                        </td>
                                        <td class="table-icon">
                                            <p data-placement="top" data-toggle="tooltip" title="Edit">
                                                <button class="btn btn-primary btn-xs" data-target="#edit" data-title="Edit" data-toggle="modal">
                                                    <span class="fa fa-pencil">
                                                    </span>
                                                </button>
                                            </p>
                                        </td>
                                        <td class="table-icon">
                                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                <button class="btn btn-danger btn-xs" data-target="#delete" data-title="Delete" data-toggle="modal">
                                                    <span class="fa fa-trash">
                                                    </span>
                                                </button>
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
               </div>

    </div>

    </div>


@endsection