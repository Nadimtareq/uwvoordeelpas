<div class="ui normal selection fluid dropdown item">
	<i class="list icon"></i>
		
	<div class="text">
		<?php echo e((isset($limit) ? $limit : 15)); ?> 
	</div>
	<i class="dropdown icon"></i>

	<?php if(isset($limit)): ?>
	<div class="menu">
		<a class="item" href="<?php echo e(url('admin/'.$slugController.'?'.http_build_query(array_add($queryString, 'limit', '15')))); ?>">15</a>
		<a class="item" href="<?php echo e(url('admin/'.$slugController.'?'.http_build_query(array_add($queryString, 'limit', '30')))); ?>">30</a>
		<a class="item" href="<?php echo e(url('admin/'.$slugController.'?'.http_build_query(array_add($queryString, 'limit', '45')))); ?>">45</a>
	</div>
	<?php endif; ?>
</div>