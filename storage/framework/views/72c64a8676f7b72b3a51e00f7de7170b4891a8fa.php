<?php $__env->startSection('scripts'); ?>
	<?php echo $__env->make('admin.template.editor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <?php echo $__env->make('admin.template.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	<div class="ui three mini steps">
		<a href="<?php echo e(url('admin/newsletter'.Request::has('id') ? '?id='.Request::input('id') : '')); ?>" class="link active step">
			<i class="paint brush icon"></i>
			<div class="content">
				<div class="title">Lay-out</div>
			</div>
		</a>

		<a href="<?php echo e(url('admin/newsletter/guests'.(Request::has('id') ? '?id='.Request::input('id') : ''))); ?>" class="<?php echo e(Request::has('id') ? 'link' : 'disabled'); ?> step">
			<i class="users icon"></i>
			<div class="content">
				<div class="title">Gasten</div>
			</div>
		</a>

		<a href="<?php echo e(url('admin/newsletter/example'.(Request::has('id') ? '?id='.Request::input('id') : ''))); ?>" class="<?php echo e(Request::has('id') ? 'link' : 'disabled'); ?> step">
			<i class="image icon"></i>
			<div class="content">
				<div class="title">Voorbeeld</div>
			</div>
		</a>
	</div>

    <?php echo Form::open(array('method' => 'post', 'class' => 'ui form')) ?>

    <?php echo Form::hidden('id', (Request::has('id') ? Request::input('id')  : '')); ?>

	<div class="field">
		<label>Bedrijven</label>
		<?php 
		echo Form::select(
			'companies[]', 
			$companies,
			(isset($newsletter->companies_ids) ? json_decode($newsletter->companies_ids) : ''),
			array(
				'multiple' => true, 
				'class' => 'ui companies normal fluid search dropdown'
			)
		);
		?>
	</div>	

	<div class="field">
		<label>Titel</label>
		<?php echo Form::text('title', (isset($newsletter->subject) ? $newsletter->subject : '')); ?>
	</div>

	<div class="preview-mode">
		<div class="preview-content">

		</div>
	</div>

	<div class="field text-mode">
		<label>Tekst</label>
		<?php echo Form::textarea('content', (isset($newsletter->content) ? $newsletter->content : ''), array('id' => 'text-editor', 'class' => 'editor')); ?>
	</div><br />

	<button class="ui button" name="send" value="send" type="submit">
		<i class="arrow right icon"></i> Volgende
	</button>
	
	<button type="button" class="ui icon button" id="previewButton"><i class="eye icon"></i> Voorbeeld</button>
	<button type="button" class="ui icon button" id="editButton" style="display: none;"><i class="pencil icon"></i> Wijzig</button><br /><br />
	<?php echo Form::close(); ?>
</div>
<div class="clear"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>