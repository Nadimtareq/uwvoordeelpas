<?php $companyReservation = app('App\Models\CompanyReservation'); ?>

<?php if(count($userCompanies) >= 1): ?>
	<?php foreach($userCompanies as $company): ?>
		<li><a href="<?php echo e(url('admin/companies/update/'.$company->id.'/'.$company->slug)); ?>" class="item"><strong><?php echo e($company->name); ?></strong></a></li>

	    <li><a class="item fixed-row "> Reserveringen</a></li>
		<li><a href="<?php echo e(url('admin/reservations/clients/'.$company->id)); ?>" ><i class="material-icons">check_box_outline_blank</i> Reserveringen</a></li>
	    <li><a href="<?php echo e(url('admin/reservations-options/'.$company->slug)); ?>" ><i class="material-icons">check_box_outline_blank</i> Aanbiedingen</a></li>
		<li><a href="<?php echo e(url('admin/reservations/saldo/'.$company->slug)); ?>" ><i class="material-icons">check_box_outline_blank</i> Financieel</a></li>
		<li><a href="<?php echo e(url('admin/reservations/update/'.$company->id)); ?>" ><i class="material-icons">check_box_outline_blank</i> Instellingen</a></li>

		<li><a href="<?php echo e(url('admin/companies/update/'.$company->id.'/'.$company->slug)); ?>" ><i class="material-icons">check_box_outline_blank</i> Bedrijfsgegevens</a></li>
		<li><a href="<?php echo e($userAdmin ? url('admin/users') : url('admin/guests/'.$company->slug)); ?>" ><i class="material-icons">check_box_outline_blank</i> Gasten</a></li>

		<li><a href="<?php echo e(url('admin/invoices/overview/'.$company->slug)); ?>" ><i class="material-icons">check_box_outline_blank</i> Facturen</a></li>
		<li><a href="<?php echo e(url('admin/barcodes/'.$company->slug)); ?>" ><i class="material-icons">check_box_outline_blank</i> Barcodes</a></li>
		<li><a href="<?php echo e(url('admin/reviews/'.$company->slug)); ?>" ><i class="material-icons">check_box_outline_blank</i> Recensies</a></li>
		<li><a href="<?php echo e(url('admin/news/'.$company->slug)); ?>" ><i class="material-icons">check_box_outline_blank</i> Nieuwsberichten</a></li>
		<li><a href="<?php echo e(url('admin/mailtemplates/'.$company->slug)); ?>" class="item"><i class="material-icons">check_box_outline_blank</i> Meldingen</a></li>
		<li><a href="<?php echo e(url('admin/widgets/'.$company->slug)); ?>" ><i class="material-icons">check_box_outline_blank</i> Widgets</a></li>
		
		<li><a href="<?php echo e(url('admin/companies/contract/'.$company->id.'/'.$company->slug)); ?>" target="_blank" class="item"><i class="material-icons">check_box_outline_blank</i> Contract</a></li>
	<?php endforeach; ?>
<?php endif; ?>

<?php if(isset($userCompaniesWaiter) && count($userCompaniesWaiter) >= 1): ?>
	<?php foreach($userCompaniesWaiter as $company): ?>
		<li><a href="<?php echo e(url('admin/companies/update/'.$company->slug)); ?>" ><strong><?php echo e($company->name); ?></strong></a></li>

		<li><a href="<?php echo e(url('admin/reservations/clients/'.$company->id)); ?>" ><i class="material-icons">check_box_outline_blank</i> Reserveringen</a></li>
		<li><a href="<?php echo e(url('admin/reviews/'.$company->slug)); ?>" class="item"><i class="material-icons">check_box_outline_blank</i> Recensies</a></li>
	<?php endforeach; ?>
<?php endif; ?>