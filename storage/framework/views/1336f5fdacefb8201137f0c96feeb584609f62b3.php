<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
$(document).ready(function() {
	$('tbody.list.search tr').each(function() {
		var trElement = $(this);

		trElement.find('.removeButton').click(function() {
			trElement.find('.checkbox').checkbox('set checked');
		});
	});

  	$('.removeButton').click(function() {
  		if ($('[name="id[]"]:checked').length == 0) {
  			swal({   
				title: "Er is een fout opgetreden",   
				text: "U bent vergeten om een optie te selecteren.",   
				type: "warning"
			});
		} else {
			swal({   
				title: "Weet u het zeker?",   
				text: "Weet u zeker dat u uw reservering(en) wil annuleren?",   
				type: "warning",   
				showCancelButton: true,   
				confirmButtonColor: "#DD6B55",  
				cancelButtonText: "Nee",   
				confirmButtonText: "Ja, ik weet het zeker!",   
				closeOnConfirm: false 
			}, 
			function() { 
				$('.ui.form').submit(); 
			});
		}
	});
});
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content">
	<div class="ui breadcrumb">
		<a href="<?php echo e(url('/')); ?>" class="section">Home</a>
		<i class="right chevron icon divider"></i>

		<a href="#" class="sidebar open" data-activates="slide-out">Menu</a>
	    <i class="right chevron icon divider"></i>

		<div class="active section">Mijn reserveringen</div>
	</div>

    <div class="ui divider"></div>

    <?php if(isset($reservationDate) && count($reservationDate) >= 1): ?>
	    <?php echo Form::open(array('id' => 'formList', 'class' => 'ui form', 'method' => 'post')) ?>
	        <div class="ui grid">
	            <div class="left floated six wide column">
	                <button class="removeButton ui icon grey button" type="button" name="action" value="remove">
	                    <i class="minus circle icon"></i> Annuleren
	                </button>
	            </div>
	        </div>

	    	<table id="account_reservations" class="ui very basic collapsing sortable celled table list" style="width: 100%;">
	            <thead>
	            	<tr>
	            		<th data-slug="disabled" class="one wide">
	            			<div class="ui master checkbox">
	    					  	<input type="checkbox">
	    					  	<label></label>
	    					</div>
	    				</th>
	                    <th data-slug="company" class="four wide">Bedrijf</th>
                            <th data-slug="dealname" class="four wide">Gereserveerd Deal</th>
	                    <th data-slug="created_at" class="four wide">Datum en tijd</th>
	                    <th data-slug="persons" class="two wide">Personen</th>
	                    <th data-slug="disabled" class="four wide">Persoonsgegevens</th>
	                    <th data-slug="saldo" class="eight wide">Saldo</th>
	                    <th data-slug="disabled" class="eight wide">Korting</th>
	                    <th data-slug="allergies" class="one wide">Allergie&euml;n</th>
	                    <th data-slug="preferences" class="one wide">Voorkeuren</th>
	                    <th data-slug="disabled" class="three wide">Opmerking</th>
	                    <th data-slug="disabled" class="one wide"></th>
	            	</tr>
	            </thead>
	            <tbody class="list search">
	                <?php if(isset($reservationDate)): ?>
	                	<?php foreach($reservationDate as $data): ?>
		                <?php
		                $date = \Carbon\Carbon::create(
		                	date('Y', strtotime($data->date)), 
		                	date('m', strtotime($data->date)), 
		                	date('d', strtotime($data->date)), 
		                	date('H', strtotime($data->time)), 
		                	date('i', strtotime($data->time)), 
		                	date('s', strtotime($data->time))
		                );
		                ?>
						<tr>
							<td <?php echo $data->is_cancelled ? 'class="disabled"' : ''; ?>>
								<?php if(new DateTime() < new DateTime($data->cancelBeforeTime) && $data->is_cancelled == 0): ?> 
								<div class="ui child checkbox">
									<input type="checkbox" name="id[]" value="<?php echo e($data->id); ?>">
									<label></label>
								</div>
								<?php endif; ?>
							</td>
							<td><a href="<?php echo e(url('restaurant/'.$data->slug)); ?>"><?php echo e($data->company); ?></a></td>
                                                        <td><?php echo e($data->dealname); ?></td>
							<td <?php echo $data->is_cancelled ? 'class="disabled"' : ''; ?>>
								<i class="calendar icon"></i> <?php echo e($date->formatLocalized('%d %B %Y')); ?><br />
								<i class="clock icon"></i> <?php echo e(date('H:i', strtotime($data->time))); ?>

							</td>
							<td <?php echo $data->is_cancelled ? 'class="disabled"' : ''; ?>>
								<?php echo e($data->persons); ?> personen
							</td>
							<td <?php echo $data->is_cancelled ? 'class="disabled"' : ''; ?>>
								<i class="user icon"></i> <?php echo e($data->name); ?><br />
								<i class="envelope icon"></i> <?php echo e($data->email); ?><br />
								<i class="phone icon"></i> <?php echo e($data->phone); ?>

							</td>
							<td <?php echo $data->is_cancelled ? 'class="disabled"' : ''; ?>>
								<i class="euro icon"></i><?php echo e($data->saldo); ?> betaald
							</td>
							<td <?php echo $data->is_cancelled ? 'class="disabled"' : ''; ?>>
								<?php if($data->barcode == 1): ?> 
									<?php if($data->discount != 'null' && $data->discount != NULL && $data->discount != '[""]'): ?>
										<?php echo e(urldecode(json_decode($data->discount)[0])); ?>

									<?php endif; ?>
								<?php endif; ?>
        					</td>
							<td <?php echo $data->is_cancelled ? 'class="disabled"' : ''; ?>>
								<?php if($data->allergies != 'null' && $data->allergies != NULL && $data->allergies != '[""]'): ?>   
									<?php foreach(json_decode($data->allergies) as $allergies): ?>
										<span class="ui label"><?php echo e($allergies); ?></span>
									<?php endforeach; ?>
								<?php endif; ?>
							</td>
							<td <?php echo $data->is_cancelled ? 'class="disabled"' : ''; ?>>
								<?php if($data->preferences != 'null' && $data->preferences != NULL && $data->preferences != '[""]'): ?>
									<?php foreach(json_decode($data->preferences) as $pref): ?>
										<?php echo e($pref); ?>

									<?php endforeach; ?>
								<?php endif; ?>
							</td>
							<td <?php echo $data->is_cancelled ? 'class="disabled"' : ''; ?>>
								<div style="width: 80px; word-wrap: break-word;"><?php echo e($data->comment); ?></div>
							</td>
							<td>
								<?php if(new DateTime() < new DateTime($data->updateBeforeTime)): ?> 
									<?php if(!$date->isPast() && $data->is_cancelled == 0): ?>
										<a href="<?php echo e(url('reservation/edit/'.$data->id)); ?>" class="ui fluid tiny button">Wijzigen</a><br />
											
										<button class="ui fluid grey button tiny removeButton" type="button" name="action" value="remove">
											Annuleren
										</button>
									<?php endif; ?>
								<?php endif; ?>

								<?php if($data->is_cancelled == 1): ?>
									<span class="ui red label">Geannuleerd</span>
								<?php endif; ?>

								<?php if($data->status == 'refused'): ?>
									<span class="ui red label">Geweigerd</span>
								<?php endif; ?>

								<?php if($data->status == 'iframe-pending' OR $data->status == 'reserved-pending' && $data->is_cancelled == 0): ?>
									<span class="ui orange label">Aanvraag</span>
								<?php endif; ?>
							</td>
						</tr>
	                	<?php endforeach; ?>
	           		<?php endif; ?>
	        	</tbody>
	    	</table>
		<?php echo Form::close(); ?>
	    <?php echo with(new \App\Presenter\Pagination($reservationDate->appends($paginationQueryString)))->render(); ?>



	<?php else: ?>
	Er zijn nog geen reserveringen door u geplaatst.
	<?php endif; ?>
</div>
<div class="clear"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>