
<div class="side_menus">

{{Form::open(array('url' => 'preferences', 'method' => 'post', 'class' => 'ui form'))}}

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
{{--  <div class="container">
 <div class="row"> 
<div class="col-md-10">  --}}

                    <div class="content">
                        <div class="static-menu row">
                        <div class="jsearch col-md-2 col-sm-2 col-xs-6">
                        <div class="drop-menu">
                            {{ Form::select('preference[]',
                               (isset($preference[1]) ? $preference[1] : array()),
                               (Request::has('preference') ? Request::get('preference') : ''),
                               array('class' => 'multipleSelect', 'data-placeholder' => 'Voorkeuren', 'multiple' => 'multiple')) }}
                        </div>
                        </div>
                        <div class="jsearch col-md-2 col-sm-2 col-xs-6">
                        <div class="drop-menu">
                            {{  Form::select('kitchen[]',
                                            (isset($preference[2]) ? $preference[2] : array()),
                                            (Request::has('kitchen') ? Request::get('kitchen') : ''),
                                            array('class' => 'multipleSelect', 'data-placeholder' => 'Keuken', 'multiple' => 'multiple')) }}
                        </div>
                        </div>
                        <div class="jsearch col-md-2 col-sm-2 col-xs-6">
                        <div class="drop-menu">
                            {{ Form::select('price[]',
                                                    (isset($preference[4]) ? $preference[4] : array()),
                                                    (Request::has('price') ? Request::get('price') : ''),
                                                    array('class' => 'multipleSelect', 'data-placeholder' => 'Soort', 'multiple' => 'multiple')) }}
                        </div>
                        </div>
                        <div class="jsearch col-md-2 col-sm-2 col-xs-6">
                        <div class="drop-menu">
                            {{ Form::select('discount[]',
                                                   (isset($preference[5]) ? $preference[5] : array()),
                                                   (Request::has('discount') ? Request::get('discount') : ''),
                                                   array('class' => 'multipleSelect', 'data-placeholder' => 'Korting', 'multiple' => 'multiple')) }}
                        </div>
                        </div>
                        <div class="jsearch col-md-2 col-sm-2 col-xs-6">
                        <div class="drop-menu">

                            {{ Form::select('allergies[]',
                                                            (isset($preference[3]) ? $preference[3] : array()),
                                                            (Request::has('allergies') ? Request::get('allergies') : ''),
                                                            array('class' => 'multipleSelect', 'data-placeholder' => 'Allergieen', 'multiple' => 'multiple')) }}
          
                        </div>
                        </div>
                        <div class="jsearch col-md-2 col-sm-2 col-xs-6">
                        <button class="btn btn-link btn-filter" style="background: transparent;">
                            <img src="images/filter_img.png" class="filter_img" alt="img">
                        </button>
                        </div>
                        </div>
                        {{ Form::close() }}
                         
                    </div>

                    
                    </div>

                    <div class="row">
                    <div class="col-lg-offset-9 col-lg-2 col-sm-offset-6 col-sm-6">

                    <style>
                            .display{
                                padding: 0px 5px;
                            }
                    </style>

                    <div class="filter-buttons static-menu pull-right" style="margin-top: -50px; margin-right: 15px; ">
                    
                        View

                                <a href="{{ url("search?regio=eindhoven&layout=grid") }}" class="display active">
                                    <img src="{{ url("images/one.png") }}" alt="one">
                                </a>

                                <a href="{{ url("search?regio=eindhoven") }}" class="display">
                                    <img src="{{ url("images/two.png") }}" alt="two">
                                </a>
                          
                   </div>


                    </div>
                    </div>


                    </div>
</div>
</div>

                    
                    
                        
                   
                   
</div>