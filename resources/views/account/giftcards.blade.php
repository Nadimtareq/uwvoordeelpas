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
<div class="shop">
	<div class="container">
        <div class="ui breadcrumb">
            <a href="{{ url('/') }}" class="section">Home</a>
            <i class="right chevron icon divider"></i>

            <a href="#" class="sidebar open" data-activates="slide-out">Menu</a>
            <i class="right chevron icon divider"></i>

            <div class="active section">Kopen Giftcard</div>
        </div>
        <div class="ui divider"></div>
        <div class="up">
            <div class="start">
                <h2>Verras uw partner of jarige met een cadeaubon van UWvoordeelpas!</h2>
                <ul class="list">
                    <li>
                        <div class="wrap"><img src="{{asset('images/l1.png')}}" alt="l" /></div>
                        <p>1: Iemand verrassen met een cadeaubon? Bestel hem nu direct, keuze vanaf €5.</p>
                    </li>
                    <li>
                        <div class="wrap"><img src="{{asset('images/l2.png')}}" alt="l" /></div>
                        <p>2: Kies hieronder uw gewenste bedrag en klik op de groene knop. U betaald snel en veilig online!</p>
                    </li>
                    <li>
                        <div class="wrap"><img src="{{asset('images/l3.png')}}" alt="l" /></div>
                        <p>3: U ontvangt de code in uw account en op uw mail uw ontvanger activeert deze simpel <a href="{{ url('payment/giftcode') }}">hier</a>.</p>
                    </li>
                </ul>
            </div>
        </div>
	</div>
</div>
<div class="container">
    <?php echo Form::open(array('url' => 'account/giftcards', 'method' => 'post', 'class' => 'ui form')) ?>

    <div class="field">
        <label>Selecteer de waarde van uw cadeaubon:</label>
        <?php echo Form::select('code', $data, 0, array('class' => 'ui normal search dropdown')); ?>
    </div>

    <button class="ui green button" name="action" value="update" type="submit">
        <i class="check mark icon"></i> Kopen Giftcard
    </button>

    <?php echo Form::close(); ?>
</div>
