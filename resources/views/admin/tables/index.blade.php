@extends('template.theme')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<div class='container'>
    <div class='row'>
        <div class='col-lg-12'>
            <div  style='padding:15px 15px 15px 0px;'>
                <h4>Tables Management <a  href="{{ url("admin/tables/create") }}" class="btn btn-info btn-sm" style='font-size: 16px;'>Add New</a></h4>
                <hr/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="" name="searchform" id="searchform" method="GET" >
                <table class="table table-bordered" >
                    <tr><th><a href="{{request()->fullUrlWithQuery(["orderby"=>(request()->input('orderby')=="table_number asc")?"table_number desc":"table_number asc"])}}">TABLE NUMBER</th><th><a href="{{request()->fullUrlWithQuery(["orderby"=>(request()->input('orderby')=="seating asc")?"seating desc":"seating asc"])}}">SEATING</th><th><a href="{{request()->fullUrlWithQuery(["orderby"=>(request()->input('orderby')=="description asc")?"description desc":"description asc"])}}">DESCRIPTION</th><th><a href="{{request()->fullUrlWithQuery(["orderby"=>(request()->input('orderby')=="priority asc")?"priority desc":"priority asc"])}}">PRIORITY</th><th><a href="{{request()->fullUrlWithQuery(["orderby"=>(request()->input('orderby')=="duration asc")?"duration desc":"duration asc"])}}">DURATION</th><th>acties</th>
                    </tr><tr><th><input class="form-control" type="text" name="table_number" value="{{request()->input('table_number')}}" ></th><th><input class="form-control" type="text" name="seating" value="{{request()->input('seating')}}" ></th><th><input class="form-control" type="text" name="description" value="{{request()->input('description')}}" ></th><th><input class="form-control" type="text" name="priority" value="{{request()->input('priority')}}" ></th><th><input class="form-control" type="text" name="duration" value="{{request()->input('duration')}}" ></th><th><input type="submit" value='Toevoegen'  class="btn btn-primary"></th></tr>@foreach($model as $key=>$val)
                    <tr><td>{{$val->table_number}}</td><td>{{$val->seating}}</td><td>{{$val->description}}</td><td>{{$val->priority}}</td><td>{{$val->duration}}</td><td>
                            <a href="{{ url("admin/tables/edit",$val->id) }}" class="btn btn-warning btn-sm">wijzigen</a>
                            <a href="{{ url("admin/tables/show",$val->id) }}" class="btn btn-info btn-sm">tonen</a>
                            <a onclick="return confirm('Do you really want to delete this record?');" href="{{ url("admin/tables/destroy",$val->id) }}" class="btn btn-danger btn-sm">verwijderen</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </form>
            {{ $model->appends(request()->input())->links() }}
        </div>
    </div>
</div>
@stop