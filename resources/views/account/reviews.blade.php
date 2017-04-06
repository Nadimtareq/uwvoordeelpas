<?php
use App\Models\Company;
?>
@extends('template.theme')

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
  $('#removeButton').click(function() {
		swal({   
			title: "Weet u het zeker?",   
			text: "Weet u zeker dat u uw recensie(s) wil verwijderen?",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#DD6B55",  
			confirmButtonText: "Ja, ik weet het zeker!",   
			closeOnConfirm: false 
		}, function(){ $('.ui.form').submit(); });
	});
});
</script>
@stop

@section('content')
<div class="content">
	<div class="ui breadcrumb">
		<a href="{{ url('/') }}" class="section">Home</a>
		<i class="right chevron icon divider"></i>

		<a href="#" class="sidebar open">Menu</a>
	    <i class="right chevron icon divider"></i>

		<div class="active section">Mijn recencies</div>
	</div>

    <div class="ui divider"></div>

    @if(isset($data) && count($data) >= 1)
    <?php echo Form::open(array('class' => 'ui form', 'method' => 'post')) ?>
        <div class="ui grid">
            <div class="left floated six wide column">
                <button id="removeButton" type="button" name="action" value="remove" class="ui icon grey button">
                    <i class="trash icon"></i>
                </button>
            </div>
        </div>

        <table class="ui very basic collapsing celled table list">
            <thead>
            	<tr>
            		<th class="disabled one wide">
            			<div class="ui master checkbox">
    					  	<input type="checkbox">
    					  	<label></label>
    					</div>
    				</th>
                    <th class="two wide">Bedrijf</th>
                    <th class="four wide">Recensie</th>
                    <th class="one wide">Eten</th>
                    <th class="one wide">Service</th>
                    <th class="one wide">Decor</th>
                    <th class="one wide"></th>
            	</tr>
            </thead>
            <tbody class="list search">
                @if(isset($data))
                	@foreach($data as $data)
					<tr>
					    <td>
					        <div class="ui child checkbox">
					        	<input type="checkbox" name="id[]" value="{{ $data->id }}">
					        	<label></label>
					        </div>
					    </td>
					    <td><a href="{{ url('restaurant/'.$data->companySlug) }}">{{ $data->companyName }}</a></td>
					    <td>{{ $data->content }}</td>
					    <td><div class="ui star medium orange rating no-rating" data-rating="{{ $data->food }}"></div></td>
					    <td><div class="ui star medium orange rating no-rating" data-rating="{{ $data->service }}"></div></td>
					    <td><div class="ui star medium orange rating no-rating" data-rating="{{ $data->decor }}"></div></td>
					    <td>
							<a href="{{ url('account/reviews/edit/'.$data->id) }}" class="ui label">Wijzig</a><br /><br />
							<a href="{{ url('review/'.$data->id) }}" class="ui label">Delen</a>
					    </td>
					 </tr>
					@endforeach
                @endif
            </tbody>
   		</table>
	<?php echo Form::close(); ?>
	@else
		<div class="ui grid three columns">
			<div class="sixteen wide mobile column">
				<a href="{{ url('/') }}">
					<h4 class="ui big header">
				  		<i class="huge icons">
					    <i class="search icon icon"></i>
					  </i>
					  Zoek een restaurant naar keuze
					</h4>
				</a>
			</div>
			
			<div class="column">
				<h4 class="ui big header">
				  	<i class="huge icons">
				    	<i class="thumbs up  small icon"></i>
				    	<i class="thumbs down red corner big icon"></i>
				  	</i>
				  	Tevreden of ontevreden?
				</h4>
			</div>

			<div class="column">
				<h4 class="ui big header">
				  	<i class="huge icons">
				    	<i class="comment icon"></i>
				  	</i>
				  	Schrijf een beoordeling
				</h4>
			</div>
		</div>
	@endif
</div>
<div class="clear"></div>
@stop