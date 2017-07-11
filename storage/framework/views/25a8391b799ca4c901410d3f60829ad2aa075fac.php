<?php $__env->startSection('content'); ?>
<div class="content">
    <?php echo $__env->make('admin.template.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php if($userAdmin): ?>
	<div class="ui normal icon search selection fluid dropdown">
       	<div class="text">Filter op bedrijf</div>
        <i class="dropdown icon"></i>

		<div class="menu">
            <?php foreach($companies as $data): ?>
            <a class="item" href="<?php echo e(url('admin/widgets/'.$data->slug)); ?>"><?php echo e($data->name); ?></a>
            <?php endforeach; ?>
       </div>
    </div>
    <?php endif; ?>

    <h3>Reserveer kalender</h3>
    <div class="ui form">
	    <div class="two fields">
		    <div class="field">
			  	<textarea><iframe src="<?php echo e(url('widget/calendar/restaurant/'.$company->slug)); ?>" width="500" height="550" frameborder="0"></iframe></textarea><br />
			  	<h5>Voorbeel</h5>

				<iframe src="<?php echo e(url('widget/calendar/restaurant/'.$company->slug)); ?>"
						width="100%"
						height="650"
						frameborder="0">
				</iframe>




               </div>
		    <div class="field">
		    	<table class="ui table">
		    		<tr>
			    		<td><strong>Width:</strong></td>
			    		<td>Bepaal de breedte van de widget</td>
			    	</tr>
			    	<tr>
			    		<td><strong>Height:</strong></td>
			    		<td>Bepaal de hoogte van de widget</td>
			    	</td>
			    	<tr>
			    		<td><strong>Frameborder:</strong></td>
			    		<td>1 = Rand weergeven om de widget, 0 = Geen rand weergeven om de widget</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="clear"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>