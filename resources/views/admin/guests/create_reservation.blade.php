@extends('template.theme')

@inject('preference', 'App\Models\Preference')

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
		    closeBrowser();
		});

		$('.timepicker').pickatime({
			format: 'H:i',
			formatLabel: 'H:i',
			formatSubmit: 'H:i',
			interval: 15,
			clear: 'verwijderen'
		});
	</script>
@stop

@section('content')
<div class="content">

	<script type="text/javascript">
		var activateAjax = 'reservation';
	</script>

    @include('admin.template.breadcrumb')
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
							@for($i = 1; $i <= 10; $i++)
								<div class="item" data-value="<?php echo $i; ?>"><?php echo $i; ?> <?php echo $i == 1 ? 'persoon' : 'personen'; ?></div>
							@endfor
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
				<label>Wilt u de nieuwsbrief van Uwvoordeelpas en {{ $company->name }} ontvangen?</label>
			</div>
		</div>

		<div id="dateAppend" class="four fields">
			<div class="field">
				<label>Tafelnummer</label>
				<select name="table_number">
					@foreach($tables as $table)
						<option class="item" value="<?php echo $table->id; ?>"><?php echo $table->table_number; ?></option>
					@endforeach
				</select>
			</div>

			<div class="field">
				<label>Begin tijd</label>
				<div class="ui icon input">
					<?php echo Form::text('start_time', '', array('class' => 'timepicker', 'placeholder' => 'Selecteer een tijd', 'data-pattern-name' => 'start_time[++]','data-pattern-id' => 'start_time++')); ?>
					<i class="clock icon"></i>
				</div>
			</div>

			<div class="field">
				<label>Duur in minuten</label>
				<input class="duration" disabled>
				<input class="duration" name="end_time" type="hidden">
<!--				--><?php //echo Form::text('duration');  ?>
			</div>

			<div class="field">
				<label>Eind Tijd</label>
				<div class="ui icon input">
					<input class="endtime" disabled>
					<input class="endtime" name="end_time" type="hidden">
<!--					--><?php //echo Form::text('end_time', '', array('class' => 'timepicker', 'placeholder' => 'Selecteer een tijd', 'data-pattern-name' => 'end_time[++]','data-pattern-id' => 'end_time++')); ?>
					<i class="clock icon"></i>
				</div>
			</div>
		</div>

		<div class="four fields">
			<div class="field">
				<label>Description</label>
				<?php echo Form::text('description');  ?>
			</div>

			<div class="field">
				<label>Status</label>
				<select type="hidden" name="status">
					<option class="item" value="0">Vrij</option>
					<option class="item" value="1">Gast onderweg</option>
					<option class="item" value="2">Gereserveerd</option>
					<option class="item" value="3">Handmatig toegevoegd</option>
					<option class="item" value="4">In option</option>
				</select>
			</div>
		</div>

		<button class="ui tiny button" type="submit"><i class="plus icon"></i> Aanmaken</button>
	<?php echo Form::close(); ?>
</div>
<div class="clear"></div>
@stop