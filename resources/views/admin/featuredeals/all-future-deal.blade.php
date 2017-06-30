@extends('template.theme')

@section('scripts')
@include('admin.template.remove_alert')
@stop

@section('content')

<div class="content">
    @include('admin.template.breadcrumb')
<?php echo Form::open(array('id' => 'formList', 'method' => 'post')) ?>
<button id="removeButton" type="submit" name="action" value="remove" class="ui disabled icon grey button">
    <i class="trash icon"></i> Verwijderen
</button>   

<table class="ui sortable very basic collapsing celled unstackable table" style="width: 100%;">
    <thead>
        <tr>
            <th data-slug="disabled" class="disabled">
                <div class="ui master checkbox"><input type="checkbox"></div>
            </th>
            <th data-slug="created_at" class="four wide">Gebruikersnaam</th>
            <th data-slug="amount" class="two wide">Deal naam</th>
            <th data-slug="name" class="three wide">Bedrijfsnaam</th>
            <th data-slug="name" class="three wide">Deal bedrag</th>
            <th data-slug="mollie_id" class="two wide">Vervaldatum</th>
            <th data-slug="mollie_id" class="two wide">Totaal persoon</th>
            <th data-slug="payment_type" class="two wide">Blijf persoon</th>
        </tr>
    </thead>
    <tbody class="list search">
        @if(count($futureDeals) >= 1)
        @foreach($futureDeals as $futureDeal)
        <tr>
         <td>
            <div class="ui child checkbox">
                <input type="checkbox" name="id[]" value="{{ $futureDeal->future_deal_id }}">
                <label></label>
            </div>
        </td>
        <td>{{ $futureDeal->user_name }}</td>
        <td>{{ ucfirst($futureDeal->deal_name) }}</td>       
        <td>{{ ucfirst($futureDeal->company_name) }}</td>        
        <td>&euro; {{ $futureDeal->future_deal_price }}</td>
        <td>{{ date('d-m-Y', strtotime($futureDeal->expired_at)) }}</td>
        <td>{{ $futureDeal->total_persons }}</td>
        <td>{{ $futureDeal->remain_persons }}</td>        
    </tr>
    @endforeach
    @else
    <tr>
        <td colspan="2"><div class="ui error message">Er is geen data gevonden.</div></td>
    </tr>
    @endif
</tbody>
</table>
<?php echo Form::close(); ?>
</div>
@stop