@extends('template.theme')

@inject('preference', 'App\Models\Preference')

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
	$("#barcode").barcode(
		$("#barcode").data('code'), // Value barcode (dependent on the type of barcode)
		"code128" // type (string)
	);
});
</script>
@stop

@section('content')
<div class="container">
	<div class="ui breadcrumb">
		<a href="{{ url('/') }}" class="section">Home</a>
		<i class="right chevron icon divider"></i>

		<a href="#" class="sidebar open" data-activates="slide-out">Menu</a>
	    <i class="right chevron icon divider"></i>

		<div class="active section">Kopen Giftcard</div>
	</div>

	<div class="ui divider"></div>
	
	<?php echo Form::open(array('url' => 'account/giftcards', 'method' => 'post', 'class' => 'ui form')) ?>		
		
		<div class="field">
		 	<label>Selecteer hier uw giftcard in:</label>
			<?php echo Form::select('code', $data, 0, array('class' => 'ui normal search dropdown')); ?>
		</div>

		<button class="ui green button" name="action" value="update" type="submit">
			<i class="check mark icon"></i> Kopen Giftcard
		</button>
		
	<?php echo Form::close(); ?>
	</div>
</div>
@stop