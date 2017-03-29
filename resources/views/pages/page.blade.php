@extends('template.theme')

{{--*/ $pageTitle = $page->title /*--}}
{{--*/ $metaDescription = $page->meta_description /*--}}

@section('content')
<div class="container">
	<div class="ui breadcrumb">
		<a href="{{ url('/') }}" class="section">Home</a>
		<i class="right chevron icon divider"></i>

		<span class="active section"><h1>{{ $page->title }}</h1></span>
	</div>

	<div class="ui divider"></div>

	{!! $page->content !!}
</div>
@stop