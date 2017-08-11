
                   <div class="col-sm-12">
                    <div class="col-sm-12 filter_main_inner">
                     <div class="col-sm-11">
                    
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
                        <button class="btn btn-link btn-filter" style="background: transparent;">
                            <img src="images/filter_img.png" class="filter_img" alt="img">
                        </button>

                        <?php echo Form::close() ?>
                        </div>
                        <div class="col-sm-1">
                        <div class="pull-right">
                        <style>
                            .display{
                                padding: 0px 5px;
                            }
                        </style>

                                 <span class="text-center">&nbsp;&nbsp; View</span> 
                                 <br>

                                <a href="{{ url("search?regio=eindhoven&layout=grid") }}" class="display active">
                                    <img src="{{ url("images/one.png") }}" alt="one">
                                </a>

                                <a href="{{ url("search?regio=eindhoven") }}" class="display">
                                    <img src="{{ url("images/two.png") }}" alt="two">
                                </a>

                        </div>
                        </div>
</div>