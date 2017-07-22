@extends('template.theme')
@inject('affiliate', 'App\Models\Affiliate')
@inject('strHelper', 'App\Helpers\StrHelper')
@section('content')
    <div class="container">
        <div class="ui grid container">
            <div class="center floated sixteen wide mobile ten wide computer column">
                Reference Url&nbsp;
                <div class="ui label">
                    <a href="{{url("source?reference={$reference->reference_code}")}}">{{ url("source?reference={$reference->reference_code}") }}</a>
                </div>
            </div>
        </div>
    </div>
@stop