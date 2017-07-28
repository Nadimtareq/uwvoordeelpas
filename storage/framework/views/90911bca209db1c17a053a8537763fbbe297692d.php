<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('admin.template.editor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script type="text/javascript">
	$(document).ready(function() {
		closeBrowser();
	});
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content">
	<?php echo $__env->make('admin.template.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<?php echo Form::open(array('method' => 'post', 'class' => 'ui edit-changes form', 'files' => TRUE)) ?>
	<div class="ui grid">
		<div class="sixteen wide column">
			<div class="field">
				<label>Naam</label>
				<?php echo Form::text('name'); ?>
			</div>

			<?php if($userAdmin): ?>
			<div class="two fields">
				<div class="field">
					<label>Image</label>
					<?php echo e(Form::file('image',['class'=>'btn btn-file'])); ?>

				</div>
				<div class="field">
					<label for="newsletter"><?php echo e(trans('app.newsletter')); ?></label>
					<?php echo e(Form::select("newsletter", array('' => 'Not selected', '0' => 'niet toevoegen', '1' => 'toevoegen'), null, ['class' => 'ui normal icon search selection fluid dropdown margin-0','required' => 'required'])); ?>

				</div>
			</div>
			<?php endif; ?>

			<?php if($userAdmin): ?>
			<div class="field">
				<label>Bedrijf</label>
				<?php echo Form::select('company_id', $companies, ($slug != NULL ? $company['id'] : NULL), array('class' => 'ui normal search dropdown'));?>
			</div>
			<?php endif; ?>

			<br /> <br />

			<div class="two fields">
				<div class="field">
					<label>Datum van</label>

					<div class="ui icon input">
						<?php
						echo Form::text(
							'date_from',
							'',
							array(
								'class' => 'datepicker',
								'placeholder' => 'Selecteer een datum'
								)
							);
							?>
							<i class="calendar icon"></i>
						</div>
					</div>

					<div class="field">
						<label>Datum tot</label>

						<div class="ui icon input">
							<?php
							echo Form::text(
								'date_to',
								'',
								array(
									'class' => 'datepicker',
									'placeholder' => 'Selecteer een datum'
									)
								);
								?>
								<i class="calendar icon"></i>
							</div>
						</div>
					</div>

					<div class="two fields">
						<div class="field">
							<label>Tijd van</label>

							<div class="ui icon input">
								<?php
								echo Form::text(
									'time_from',
									'',
									array(
										'class' => 'timepicker',
										'placeholder' => 'Selecteer een tijd'
										)
									);
									?>
									<i class="clock icon"></i>
								</div>
							</div>

							<div class="field">
								<label>Tijd tot</label>

								<div class="ui icon input">
									<?php
									echo Form::text(
										'time_to',
										'',
										array(
											'class' => 'timepicker',
											'placeholder' => 'Selecteer een tijd'
											)
										);
										?>
										<i class="clock icon"></i>
									</div>
								</div>
							</div>

							<div class="two fields">
								<div class="field">
									<label>Aantal beschikbaar</label>
									<?php echo Form::number('total_amount', 1, array('min' => 1)); ?>
								</div>

								<div class="field">
									<label>Prijs van</label>
									<?php echo Form::text('price_from'); ?>
								</div>

								<div class="field">
									<label>Dealprijs</label>
									<?php echo Form::text('price'); ?>
								</div>
								<div class="field">
									<label>Prijs per persoon</label>
									<?php echo Form::text('price_per_guest'); ?>
								</div>
							</div>

							<div class="field">
								<label>Korte omschrijving</label>
								<?php echo Form::textarea('content', null, ['class' => 'editor']); ?>
							</div>

							<div class="field">
								<label>Uitgebreide omschrijving</label>
								<?php echo Form::textarea('short_content', null, ['class' => 'editor']); ?>
							</div>

							<button class="ui button" type="submit"><i class="plus icon"></i> Aanmaken</button>
						</div>
					</div>
					<?php echo Form::close(); ?>
				</div>
				<div class="clear"></div>
				<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>