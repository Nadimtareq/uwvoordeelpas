@extends('template.theme')

@inject('preference', 'App\Models\Preference')

{{--*/ $pageTitle = 'Tegoed sparen' /*--}}

@section('slider')
<br>
@stop

@section('content')
	<div class="container">
	     <div class="ui breadcrumb">
	        <a href="{{ url('/') }}" class="sidebar open">Home</a>
	        <i class="right chevron icon divider"></i>

	        <span class="active section"><h1>Tegoed sparen</h1></span>
	    </div>

	    <div class="ui divider"></div>

	    {!! isset($contentBlock[9]) ? $contentBlock[9] : '' !!}
	</div>
	
	@include('pages/cashback/companies')
@stop