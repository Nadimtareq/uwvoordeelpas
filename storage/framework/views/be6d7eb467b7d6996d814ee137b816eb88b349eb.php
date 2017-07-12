<?php $cityPref = app('App\Models\Preference'); ?>

<?php $__env->startSection('content'); ?>
<div class="content">

    <?php if(isset($data)): ?>
    <?php echo $__env->make('admin.template.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo Form::open(array('url' => 'admin/'.$slugController.'/update/'.$data->id, 'method' => 'post', 'class' => 'ui edit-changes form')) ?>
		<div class="field">
			<label>Rol</label>
			<?php 
			echo Form::select(
				'role',
				array(
					1 => 'Lid', 
					2 => 'Bedrijf',
					3 => 'Admin',
					4 => 'Bediening',
					5 => 'Callcenter'				
				), 
				$data->default_role_id, 
				array('class' => 'multipleSelect')
			); 
			?>
		</div>
		<div class="fields">
			<div class="four wide field">
			   	<label>Aanhef</label>
				<?php echo Form::select('gender',  array(1 => 'Dhr', 2 => 'Mvr'), $data->gender, array('class' => 'multipleSelect')); ?>
			</div>

			<div class="twelve wide field">
			    <label>Naam</label>
			    <?php echo Form::text('name', $data->name) ?>
			</div>
		</div>

		<div class="field">
			<label>E-mailadres</label>
			<?php echo Form::text('email', $data->email) ?>
		</div>

		<div class="field">
			<label>Telefoonnummer</label>
			<?php echo Form::text('phone', $data->phone) ?>
		</div>
		
		<div class="field">
			<label>Geboortedatum</label>
			<?php echo Form::text('birthday_at', '', array('class' => 'bdy-datepicker', 'data-value' => $data->birthday_at)); ?>
		</div>

		<div class="field">
			<label>Saldo</label>
			<div class="ui left labeled input">
			  	<div class="ui label">&euro;</div>
				<?php echo Form::text('saldo', $data->saldo) ?>
			</div>
		</div>

		<h4 class="ui dividing header no_blue">Voorkeuren</h4>

		<div class="field">
			<label>Nieuwsbrief</label>
			<?php
			$city = array();

			foreach($cityPref->where('category_id', 9)->get() as $result) {
				$city[$result->id] = $result->name;
			}
			//dd($city, $data->city);
			//echo Form::select('city[]', $city, json_decode($data->city), array('multiple' => true, 'class' => 'ui normal fluid search dropdown'));
			?>
			<select name="city[]" id="city" class="ui normal fluid search dropdown" multiple>
				<?php foreach($city as $city_key => $item): ?>
					<?php if(!is_null(json_decode($data->city))): ?>
						<?php foreach(json_decode($data->city) as $sel_key => $selected): ?>
							<option value="<?php echo e($city_key); ?>" <?php if($city_key == $selected): ?>selected="selected"<?php endif; ?>><?php echo e($item); ?></option>
						<?php endforeach; ?>
					<?php else: ?>
						<option value="<?php echo e($city_key); ?>"><?php echo e($item); ?></option>
					<?php endif; ?>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="two fields">
			<div class="field">
				<label>Voorkeuren</label>
				<?php
				echo Form::select('preferences[]', (isset($preference[1]) ? $preference[1] : array()), json_decode($data->preferences), array('multiple' => true, 'class' => 'multipleSelect')); 
				?>
			</div>

			<div class="field">
				<label>Duurzaamheid</label>
				<?php
				echo Form::select('sustainability[]', (isset($preference[8]) ? $preference[8] : array()), json_decode($data->sustainability), array('multiple' => true, 'class' => 'multipleSelect')); 
				?>
			</div>
		</div>

		<div class="two fields">
			<div class="field">
				<label>Keuken</label>
				<?php
				echo Form::select('kitchens[]',  (isset($preference[2]) ? $preference[2] : array()), json_decode($data->kitchens), array('multiple' => true, 'class' => 'multipleSelect')); 
				?>
			</div>		  		  

			<div class="field">
				<label>Allergie&euml;n</label>
				<?php
				echo Form::select('allergies[]', (isset($preference[3]) ? $preference[3] : array()), json_decode($data->allergies), array('multiple' => true, 'class' => 'multipleSelect')); 
				?>
			</div>		  		  	
		</div>

		<div class="two fields">
			<div class="field">
				<label>Faciliteiten</label>
				<?php
				echo Form::select('facilities[]', (isset($preference[7]) ? $preference[7] : array()), json_decode($data->facilities), array('multiple' => true, 'class' => 'multipleSelect')); 
				?>
			</div>		  		  

			<div class="field">
				<label>Kinderen</label>
				<?php
				echo Form::select('kids[]', (isset($preference[6]) ? $preference[6] : array()), json_decode($data->kids), array('multiple' => true, 'class' => 'multipleSelect')); 
				?>
			</div>		  		  	
		</div>
	  	
		<div class="two fields">
			<div class="field">
				<label>Korting</label>
				<?php
				echo Form::select('discount[]', (isset($preference[5]) ? $preference[5] : array()), json_decode($data->discount), array('multiple' => true, 'class' => 'multipleSelect')); 
				?>
			</div>		  		  

			<div class="field">
				<label>Soort</label>
				<?php
				echo Form::select('price[]', (isset($preference[4]) ? $preference[4] : array()), json_decode($data->price), array('multiple' => true, 'class' => 'multipleSelect')); 
				?>
			</div>		  		  	
		</div>

		<h4 class="ui dividing header no_blue">Wachtwoord <small>(optioneel)</small></h4>

		<div class="field">
		    <label>Wachtwoord</label>
		    <?php echo Form::password('password') ?>
		</div>

		<div class="field">
		  <label>Wachtwoord controle</label>
		  <?php echo Form::password('password_confirmation') ?>
		</div>

		 <button class="ui tiny button" type="submit"><i class="pencil icon"></i> Wijzigen</button>
		 <a href="<?php echo e(url('admin/ban/create/'.$data->id)); ?>" class="ui tiny red button" type="submit"><i class="ban icon"></i> Verbannen</a>
	<?php echo Form::close(); ?>
	<?php endif; ?>
</div>
<div class="clear"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>