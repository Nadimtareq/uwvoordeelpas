<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('admin.template.remove_alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <?php echo $__env->make('admin.template.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="buttonToolbar">  
        <div class="ui grid">
            <div class="left floated sixteen wide mobile seven wide computer column">
                <a href="<?php echo e(url('admin/'.$slugController.'/create')); ?>" class="ui icon blue button"><i class="plus icon"></i> Nieuw</a>
            </div>

            <div class="right floated sixteen wide mobile six wide computer column">
                 <div class="ui grid">
                    <div class="two column row">
                        <div class="column">
                        <?php echo $__env->make('admin.template.limit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>

                        <div class="column">
                        <?php echo $__env->make('admin.template.search.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo Form::open(array('id' => 'formList', 'url' => 'admin/'.$slugController.'/delete', 'method' => 'post')) ?>
    	<table class="ui very basic collapsing sortable celled table list" style="width: 100%;">
            <thead>
            	<tr>
            		<th class="one wide">
            			<div class="ui master checkbox">
    					  	<input type="checkbox">
    					  	<label></label>
    					</div>
    				</th>
            		<th data-slug="name">Naam</th>
            	</tr>
            </thead>
            <tbody class="list">
                <?php if(count($data) >= 1): ?>
                	<?php foreach($data as $result): ?>
                	<tr>
                		<td>
                			<div class="ui child checkbox">
        					  	<input type="checkbox" name="id[]" value="<?php echo e($result->id); ?>">
        					  	<label></label>
        					</div>
        				</td>
                        <td><?php echo e($result->name); ?></td>
                		<td><a href="<?php echo e(url('admin/'.$slugController.'/update/'.$result->id)); ?>" class="ui label"><i class="pencil icon"></i> Bewerk</a></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2"><div class="ui error message">Er is geen data gevonden.</div></td>
                    </tr>
            	<?php endif; ?>
        </tbody>
    </table>
    <?php echo Form::close(); ?>

    <?php echo with(new \App\Presenter\Pagination($data->appends($paginationQueryString)))->render(); ?>


</div>
<div class="clear"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>