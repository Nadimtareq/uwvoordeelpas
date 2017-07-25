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
                <h2>Spaart u mee voor een gratis 3 gangenmenu?</h2>
                <ul class="list">
                    <li>
                        <div class="wrap"><img src="{{asset('images/l1.png')}}" alt="l" /></div>
                        <p>1: Klik op een webshop hieronder, log in en u gaat naar de gekozen webshop.</p>
                    </li>
                    <li>
                        <div class="wrap"><img src="{{asset('images/l2.png')}}" alt="l" /></div>
                        <p>2: Doe daar uw aankoop en wij krijgen automatisch een signaal als de aankoop voltooid is</p>
                    </li>
                    <li>
                        <div class="wrap"><img src="{{asset('images/l3.png')}}" alt="l" /></div>
                        <p>3: Voldoet u aan de voorwaarden? Dan wordt het saldo z.s.m. op uw account gestort.</p>
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
