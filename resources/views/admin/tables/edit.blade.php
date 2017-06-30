@extends('template.theme')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<div class='container'>
    <div class='row'>
        <div class='col-lg-12'>
            <div style='padding:15px 15px 15px 0px;'>
                <h4>UPDATE TABLE  <a  href="{{ url("admin/tables") }}" class="btn btn-info btn-sm" style='font-size: 16px;'>CANCEL</a></h4>
                <hr/>
            </div>
        </div>
    </div>

    @if($errors->any())
    <div class="alert alert-danger" style='margin:15px 0px;padding:15px;font-size:17px;color:red;background: #FFCDD2;'>
        @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif

    @if(Session::has('flash_message'))
    <div class="alert alert-success" style='margin:15px 0px;padding:8px;font-size:17px;color:green;background: #A5DC86;'>
        {{ Session::get('flash_message') }}
    </div>
    @endif

    {!! Form::model($model, [
    "method" => "POST", "url" => ["admin/tables/update", $model->id]]) !!}
    <div class='row'>
        <div class='col-lg-3'>

            {!! Form::hidden("id", null, ["class" => "form-control"]) !!}

            <div class="form-group">
                {!! Form::label("table_number", "TABLE NUMBER", ["class" => "control-label"]) !!}
                {!! Form::text("table_number", null, ["class" => "form-control"]) !!}
            </div>
        </div>
        <div class='col-lg-3'>
            <div class="form-group">
                {!! Form::label("seating", "SEATING ( No of persons )", ["class" => "control-label"]) !!}
                {!! Form::text("seating", null, ["class" => "form-control"]) !!}
            </div>
        </div>
        <div class='col-lg-3'>
            <div class="form-group">
                {!! Form::label("priority", "PRIORITY ( less number has high priority )", ["class" => "control-label"]) !!}
                {!! Form::text("priority", null, ["class" => "form-control"]) !!}
            </div>
        </div>
        <div class='col-lg-3'>
            <div class='form-group'>
                {!! Form::label('comp_id', 'COMPANY', ['class' => 'control-label']) !!}
                {!! Form::select('comp_id', $companies,0,array('class' => 'form-control')) !!}
            </div>
        </div>
        <div class='col-lg-4'>
            <div class="form-group">
                {!! Form::label("duration", "DURATION ( In Minutes )", ["class" => "control-label"]) !!}
                {!! Form::text("duration", null, ["class" => "form-control"]) !!}
            </div>
        </div>
        <div class='col-lg-8'>
            <div class="form-group">
                {!! Form::label("description", "DESCRIPTION", ["class" => "control-label"]) !!}
                {!! Form::text("description", null, ["class" => "form-control"]) !!}
            </div>
        </div>
        <div class='col-lg-12'>
            <div class="form-group">{!! Form::submit('Update Table', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>

    {!! Form::close() !!}
</div>
@stop