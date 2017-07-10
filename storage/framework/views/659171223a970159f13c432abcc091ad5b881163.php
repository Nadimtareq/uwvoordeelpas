<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('admin.template.remove_alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <?php echo $__env->make('admin.template.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="buttonToolbar">  
        <div class="ui grid">
            <div class="left floated sixteen wide mobile six wide computer column">
                <a href="<?php echo e(url('admin/'.$slugController.'/create')); ?>" class="ui icon blue button"><i class="plus icon"></i> Nieuw</a>
                        
                <button id="removeButton" type="submit" name="action" value="remove" class="ui disabled icon grey button">
                    <i class="trash icon"></i> Verwijderen
                </button>
            </div>

            <div class="right floated seven wide computer sixteen wide mobile column">
                 <div class="ui grid">
                    <div class="row">
                        <div class="five wide computer sixteen wide mobile column">
                            <?php echo $__env->make('admin.template.limit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>          

                        <div class="five wide computer sixteen wide mobile column">
                            <?php echo Form::select('filter', Config::get('preferences.options'), '', array('class' => 'ui fluid normal dropdown', 'id' => 'filteRedirect')); ?>
                        </div>

                        <div class="five wide computer sixteen wide mobile column">
                            <?php echo $__env->make('admin.template.search.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br />

    <?php echo Form::open(array('id' => 'formList', 'url' => 'admin/'.$slugController.'/delete', 'method' => 'post')) ?>
        <table id="tableClients" class="ui sortable very basic collapsing celled unstackable table" style="width: 100%;">
            <thead>
                <tr>
                    <th class="disabled one wide">
                        <div class="ui master checkbox">
                           <input type="checkbox" name="example">
                            <label></label>
                        </div>
                    </th>
                    <th class="three wide" data-slug="name">Naam</th>
                    <th data-slug="category_id">Categorie</th>
                    <th data-slug="clicks">Kliks</th>
                    <th data-slug="disabled"></th>
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