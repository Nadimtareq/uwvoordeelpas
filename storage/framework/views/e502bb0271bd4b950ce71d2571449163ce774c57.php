<?php /**/ $pageTitle = 'Veelgestelde vragen' /**/ ?>

<?php $__env->startSection('slider'); ?>
<br>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="ui breadcrumb">
		<a href="<?php echo e(url('/')); ?>" class="section">Home</a>
		<i class="right chevron icon divider"></i>

		<span class="active section"><h1>Veelgestelde vragen</h1></span>
	</div>

	<div class="ui divider"></div>

	<?php if(Request::has('step')): ?>
	<div class="ui three mini steps">
		<a href="<?php echo e(url('admin/companies/update/'.Request::input('slug').'?step=1')); ?>" class="link step">
			<i class="building icon"></i>
			<div class="content">
				<div class="title">Bedrijf</div>
			</div>
		</a>

		<a href="<?php echo e(url('admin/reservations/create/'.Request::input('slug').'?step=2')); ?>" class="link step">
			<i class="calendar icon"></i>
			<div class="content">
				<div class="title">Reserveringen</div>
			</div>
		</a>

		<div class="active step">
			<i class="question mark icon"></i>
			<div class="content">
				<div class="title">Veelgestelde vragen</div>
			</div>
		</div>
	</div><br /><br />
	<?php endif; ?>
	<div class="ui grid">
		<div class="row">
			<div class="sixteen wide mobile five wide tablet ten wide computer column">
				<?php if(count($categories) >= 1): ?>
				<div class="ui normal dropdown button basic">
					<input type="hidden" name="category" value="<?php echo e(trim($categoryId) != '' ? $categoryId : ''); ?>">

					<div class="text">Kies een rubriek</div>
					<i class="dropdown icon"></i>

					<div class="menu">
						<?php foreach($categories as $category): ?>
						<a class="item" data-value="<?php echo e($category->id); ?>" href="<?php echo e(url('faq/'.$category->id.'/'.$category->slug)); ?>"><?php echo e($category->name); ?></a>
						<?php endforeach; ?>
					</div>
				</div>
				<?php endif; ?>

				<?php if(isset($subcategories) && count($subcategories) >= 1): ?>
				<div class="ui normal dropdown button basic">
					<input type="hidden" name="subcategory" value="<?php echo e(trim($slug) != '' ? $slug : ''); ?>">

					<div class="text">Kies een subrubriek</div>
					<i class="dropdown icon"></i>

					<div class="menu">
						<?php foreach($subcategories as $subcategory): ?>
						<a class="item" data-value="<?php echo e($subcategory->slug); ?>" href="<?php echo e(url('faq/'.$subcategory->id.'/'.$subcategory->slug)); ?>"><?php echo e($subcategory->name); ?></a>
						<?php endforeach; ?>
					</div>
				</div>
				<?php endif; ?>
			</div>

			<div class="sixteen wide mobile three wide tablet three wide computer right floated column">
				<?php echo Form::open(array('method' => 'GET')) ?>
				<div class="ui action fluid input">
					<input type="text" class="admin search input" name="q" placeholder="Zoeken...">
				    <button class="ui basic icon button admin-search"><i class="search icon"></i></button>
				</div>
				<?php echo Form::close(); ?>
			</div>
		</div>
	</div>


		<?php if(trim(Request::segment(2) != '' OR Request::has('q'))): ?>
			<div id="faq" class="ui styled fluid accordion">
				<?php foreach($questions as $question): ?>
			  	<div id="<?php echo e($question->id); ?>" class="title">
				    <i class="dropdown icon"></i>
				    <?php echo e($question->title); ?>

				</div>

				<div class="content">
				    <p><?php echo e($question->answer); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
		<?php else: ?>
			<div class="ui grid two columns">
				<div class="column">
					<a href="<?php echo e(url('faq/1/gasten')); ?>">
						<h2 class="ui center aligned icon header">
						  	<i class="circular users icon"></i>
						  	Consumenten
						</h2>
					</a>
				</div>

				<div class="column">
					<a href="<?php echo e(url('faq/3/restaurateurs')); ?>">
						<h2 class="ui center aligned icon header">
						  	<i class="home circular icon"></i>
						  	Restaurants
						</h2>
					</a>
				</div>
			</div>
		<?php endif; ?>

	<?php if(trim(Request::segment(2) != '' OR Request::has('q'))): ?>
	    <?php if(count($questions) >= 1): ?>
	        <?php echo $questions->render(); ?><br />
	    <?php else: ?>
	    Er zijn geen resultaten gevonden.
	    <?php endif; ?>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>