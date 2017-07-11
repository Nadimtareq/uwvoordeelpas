<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('admin.template.remove_alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <?php echo $__env->make('admin.template.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="buttonToolbar">  
        <div class="ui grid">
            <div class="sixteen wide mobile five wide computer column">
                <a href="<?php echo e(url('admin/'.$slugController.'/create')); ?>" class="ui icon blue button"><i class="plus icon"></i> Nieuw</a>
                        
                <button id="removeButton" type="submit" name="action" value="remove" class="ui disabled icon grey button">
                    <i class="trash icon"></i> Verwijderen
                </button>
            </div>

            <div class="sixteen wide mobile eleven wide computer column">
                <div class="ui grid">
                    <div class="four column row">
                        <div class="column">
                            <div class="ui normal icon search selection fluid dropdown">
                                <i class="filter icon"></i>

                                <div class="text">Status</div>

                                <i class="dropdown icon"></i>

                                <div class="menu">
                                    <a class="item" href="<?php echo e(url('admin/barcodes?status=1')); ?>">Geactiveerd</a>
                                    <a class="item" href="<?php echo e(url('admin/barcodes?status=0')); ?>">Niet geactiveerd</a>
                                </div>
                            </div>
                        </div>

                        <div class="column">
                            <?php if($userAdmin): ?>
                            <div class="ui normal icon search selection fluid dropdown">
                                <i class="filter icon"></i>

                                <div class="text">Bedrijf</div>

                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <?php if(count($companies) >= 1): ?>
                                        <?php foreach($companies as $company): ?>
                                        <a class="item" href="<?php echo e(url('admin/barcodes/'.$company->slug)); ?>"><?php echo e($company->name); ?></a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>

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
    
<!--     <div id="barcodesCompaniesSearch" class="ui search">
        <div class="ui icon small input">
            <input class="prompt" type="text" name="q" placeholder="Typ een naam in..">
            <i class="search icon"></i>
        </div>

        <div class="results"></div>
    </div> -->

    <?php echo Form::open(array('id' => 'formList', 'url' => 'admin/'.$slugController.'/delete', 'method' => 'post')) ?>
        <table class="ui sortable very basic collapsing celled table list" style="width: 100%;">
            <thead>
            	<tr>
            		<th data-slug="disabled" class="disabled one wide">
            			<div class="ui master checkbox">
    					  	<input type="checkbox">
    					  	<label></label>
    					</div>
    				</th>
                    <th data-slug="is_active">Status</th>
                    <th data-slug="code">Code</th>
                    <th data-slug="name">Gebruiker</th>
                    <th data-slug="companyName">Bedrijf</th>
                    <th data-slug="created_at">Geactiveerd op</th>
                    <th data-slug="created_at">Verloopt op</th>
                    <th data-slug="disabled" class="disabled"></th>
            	</tr>
            </thead>
            <tbody class="list search">
                <?php if(count($data) >= 1): ?>
                	<?php echo $__env->make('admin/'.$slugController.'.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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