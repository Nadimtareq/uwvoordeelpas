 <?php if($userCallcenter): ?>
    <li class="fixed-row"><a class="item">Callcenter paneel</a></li>
	<li class="fixed-row"><a class="item">Algemeen</a></li>
    <li><a href="<?php echo e(url('admin/appointments')); ?>" ><i class="material-icons">event_available</i> Afspraken</a></li>
    <li><a href="<?php echo e(url('admin/companies/callcenter')); ?>" ><i class="material-icons">contact_phone</i> Bellijst</a></li>
    <li><a href="<?php echo e(url('admin/reservations/saldo')); ?>" ><i class="material-icons">radio_button_unchecked</i> Financieel</a></li>
<?php endif; ?>