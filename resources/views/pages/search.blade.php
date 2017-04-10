@extends('template.theme')

{{--*/ $pageTitle = 'Zoeken' /*--}}

@section('content')
<script type="text/javascript">
    var searchPage = 1;
</script>
<div class="container">
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

        <div class="container">
            <div class="filter toolbar">
                <?php echo Form::open(array('url' => 'preferences', 'method' => 'post', 'class' => 'ui form')); ?>
                <div class="six fields">
                    <div class="field">
                        <?php echo Form::select('preference[]', 
                                            (isset($preference[1]) ? $preference[1] : array()),  
                                            (Request::has('preference') ? Request::get('preference') : ''), 
                                            array('class' => 'multipleSelect', 'data-placeholder' => 'Voorkeuren', 'multiple' => 'multiple')); ?>
                    </div>
                    <div class="field">
                        <?php echo Form::select('kitchen[]', 
                                        (isset($preference[2]) ? $preference[2] : array()),  
                                        (Request::has('kitchen') ? Request::get('kitchen') : ''),  
                                        array('class' => 'multipleSelect', 'data-placeholder' => 'Keuken', 'multiple' => 'multiple')); ?>
                    </div>
                    <div class="field">
                        <?php echo Form::select('price[]', 
                                        (isset($preference[4]) ? $preference[4] : array()),  
                                        (Request::has('price') ? Request::get('price') : ''), 
                                        array('class' => 'multipleSelect', 'data-placeholder' => 'Soort', 'multiple' => 'multiple')); ?>
                    </div>
                    <div class="field">           
                         <?php echo Form::select('discount[]', 
                                        (isset($preference[5]) ? $preference[5] : array()),  
                                        (Request::has('discount') ? Request::get('discount') : ''),  
                                        array('class' => 'multipleSelect', 'data-placeholder' => 'Korting', 'multiple' => 'multiple')); ?>
                    </div>
                    <div class="field">
                        <?php echo Form::select('allergies[]', 
                                                (isset($preference[3]) ? $preference[3] : array()),  
                                                (Request::has('allergies') ? Request::get('allergies') : ''), 
                                                array('class' => 'multipleSelect', 'data-placeholder' => 'Allergieen',  'multiple' => 'multiple')); ?>
                    </div>
                    <div class="field">
                        <input type="submit" class="ui blue fluid filter button" value="Filteren" />
                    </div>
                </div>
                <?php echo Form::close() ?>
            </div>
            <div class="clear"></div>
        </div>
</div>

<div id="companies" class="content">
    <div class="section">
        <div class="companies home">
            @if (count($companies) >= 1)
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
<div class="clear"></div>
@stop