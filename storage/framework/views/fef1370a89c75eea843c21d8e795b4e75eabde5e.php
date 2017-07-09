<?php $preference = app('App\Models\Preference'); ?>

<?php /**/ $pageTitle = 'Tegoed sparen' /**/ ?>

<?php $__env->startSection('slider'); ?>
<br>
<?php $__env->stopSection(); ?>

<div class="shop">
    <div class="container">
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
    <?php echo $__env->make('pages/cashback/companies', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>


<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>