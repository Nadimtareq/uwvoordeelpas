<?php $preference = app('App\Models\Preference'); ?>

<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript">
		$(document).ready(function() {
		    closeBrowser();
		});
	</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content">

	<script type="text/javascript">
		var activateAjax = 'reservation';
	</script>

    <?php echo $__env->make('admin.template.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo Form::open(array( 'id' => 'reservationForm', 'url' => URL::full(), 'method' => 'post', 'class' => 'ui edit-changes form')) ?>
		<?php echo Form::hidden('date_hidden', date('Y-m-d'));  ?>
		<?php echo Form::hidden('company_id', $company->id);  ?>
		<?php echo Form::hidden('setTimeBack', 0);  ?>

	 	<div class="three fields">
				<div class="field">
				    <label>Datum</label>
<?php echo Form::text('date', '', array('class' => 'reservationDatepicker'));  ?>
				</div>	

				<div class="field">
				    <label>Tijd</label>
					<div id="timeField" class="ui normal selection dropdown time timeRefresh">
					  	<input id="timeInput" name="time" type="hidden">
					  	
					  	<i class="time icon"></i>
					  	<div class="default text">Tijd</div>
					  	<i class="dropdown icon"></i>

					  	<div class="menu">

					  	</div>
					</div>
				</div>

				<div class="field">
				    <label>Personen</label>
				    <div id="personsField" class="ui normal compact selection dropdown persons searchReservation">
						<input type="hidden" name="persons" value="2">
						<i class="male icon"></i>
									
						<div class="default text">Personen</div>
						<i class="dropdown icon"></i>
						<div class="menu">
							<?php for($i = 1; $i <= 10; $i++): ?>
								<div class="item" data-value="<?php echo $i; ?>"><?php echo $i; ?> <?php echo $i == 1 ? 'persoon' : 'personen'; ?></div>
							<?php endfor; ?>
						</div>
					</div>
			</div>	
		</div>

		<div class="two fields">
			<div class="field">
				<label>Voorkeuren</label>
				<?php echo Form::select('preferences[]', array_combine(json_decode($company->preferences), array_map('ucfirst', json_decode($company->preferences))), '', array('class' => 'multipleSelect', 'data-placeholder' => 'Voorkeuren',  'multiple' => 'multiple')); ?>
			</div>	
			
			<div class="field">
				<label>Allergie&euml;n</label>
				<?php echo Form::select('allergies[]',  array_combine(json_decode($company->allergies), array_map('ucfirst', json_decode($company->allergies))), '', array('class' => 'multipleSelect', 'data-placeholder' => 'Allergieen',  'multiple' => 'multiple')); ?>
			</div>	
		</div>

		<div class="three fields">
			<div class="field">
				<label>Bestaande gast</label>

				<div id="guestsSearch" style="width: auto" class="ui guests search">
				  	<div class="ui icon input">
				    	<input class="prompt" type="text" placeholder="Typ een naam in..">
				    	<i class="search icon"></i>
				  	</div>

				  	<div class="results"></div>
				</div>
			</div>	

			<div class="field">
				<label>Naam</label>
				<?php echo Form::text('name');  ?>
			</div>	

			<div class="field">
				<label>Telefoonnummer</label>
				<?php echo Form::text('phone');  ?>
			</div>	

			<div class="field">
				<label>E-mailadres</label>
				<?php echo Form::text('email');  ?>
			</div>
		</div>

		<div class="field">
			<label>Opmerking</label>
			<?php echo Form::textarea('comment');  ?>
		</div>

			
		<div class="field">
			<div class="ui checkbox">
				<?php echo Form::checkbox('newsletter', 1);  ?>
				<label>Wilt u de nieuwsbrief van Uwvoordeelpas en <?php echo e($company->name); ?> ontvangen?</label>
			</div>
		</div>
	
		<button class="ui tiny button" type="submit"><i class="plus icon"></i> Aanmaken</button>
	<?php echo Form::close(); ?>
</div>
<div class="clear"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>