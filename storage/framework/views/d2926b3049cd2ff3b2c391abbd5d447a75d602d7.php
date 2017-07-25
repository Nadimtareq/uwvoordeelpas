<?php $preference = app('App\Models\Preference'); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
$(document).ready(function() {
	$("#barcode").barcode(
		$("#barcode").data('code'), // Value barcode (dependent on the type of barcode)
		"code128" // type (string)
	);
});
</script>
<?php $__env->stopSection(); ?>
<div class="shop">
	<div class="container">
        <div class="ui breadcrumb">
            <a href="<?php echo e(url('/')); ?>" class="section">Home</a>
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
                        <div class="wrap"><img src="<?php echo e(asset('images/l1.png')); ?>" alt="l" /></div>
                        <p>1: Klik op een webshop hieronder, log in en u gaat naar de gekozen webshop.</p>
                    </li>
                    <li>
                        <div class="wrap"><img src="<?php echo e(asset('images/l2.png')); ?>" alt="l" /></div>
                        <p>2: Doe daar uw aankoop en wij krijgen automatisch een signaal als de aankoop voltooid is</p>
                    </li>
                    <li>
                        <div class="wrap"><img src="<?php echo e(asset('images/l3.png')); ?>" alt="l" /></div>
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
        <label>Selecteer hier uw giftcard in:</label>
        <?php echo Form::select('code', $data, 0, array('class' => 'ui normal search dropdown')); ?>
    </div>

    <button class="ui green button" name="action" value="update" type="submit">
        <i class="check mark icon"></i> Kopen Giftcard
    </button>

    <?php echo Form::close(); ?>
</div>

<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>