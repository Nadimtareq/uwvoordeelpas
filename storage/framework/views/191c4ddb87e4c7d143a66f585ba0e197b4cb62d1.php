<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('admin.template.remove_alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="content">
    <?php echo $__env->make('admin.template.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="buttonToolbar">  
        <div class="ui grid">
            <div class="left floated nine wide computer sixteen wide mobile column">
                <?php echo Form::open(array('method' => 'GET', 'class' => 'ui form')); ?>
                <div class="three fields">
                    <div class="field">
                        <?php 
                        echo Form::select(
                            'month', 
                            array_unique($months), 
                            Request::has('month') ? Request::has('month') : date('m'), 
                            array(
                                'class' => 'multipleSelect', 
                                'data-placeholder' => 'Maand'
                                )
                            ); 
                            ?>
                        </div>

                        <div class="field">
                           <?php echo Form::select('year', array_unique($years), (Request::has('year') ? Request::get('year') : date('Y')), array('class' => 'multipleSelect', 'data-placeholder' => 'Jaar')); ?>
                       </div>

                       <div class="field">
                        <input type="submit" class="ui blue fluid filter button" value="Filteren" />
                    </div>
                </div>
                <?php echo Form::close(); ?>
            </div>
            <div class="right floated sixteen wide mobile seven wide computer column">
               <div class="ui grid">
                <div class="three column row">
                    <div class="sixteen wide mobile five wide computer column">
                        <?php echo $__env->make('admin.template.limit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php echo Form::open(array('id' => 'formList', 'method' => 'post')) ?>
<button id="removeButton" type="submit" name="action" value="remove" class="ui disabled icon grey button">
    <i class="trash icon"></i> Verwijderen
</button>   

<table class="ui sortable very basic collapsing celled unstackable table" style="width: 100%;">
    <thead>
        <tr>
            <th data-slug="disabled" class="disabled">
                <div class="ui master checkbox"><input type="checkbox"></div>
            </th>
            <th data-slug="created_at" class="four wide">Gebruikersnaam</th>
            <th data-slug="amount" class="two wide">Deal naam</th>
            <th data-slug="name" class="three wide">Bedrijfsnaam</th>
            <th data-slug="name" class="three wide">Deal bedrag</th>
            <th data-slug="mollie_id" class="two wide">Vervaldatum</th>
            <th data-slug="mollie_id" class="two wide">Totaal persoon</th>
            <th data-slug="payment_type" class="two wide">Blijf persoon</th>
        </tr>
    </thead>
    <tbody class="list search">
        <?php if(count($futureDeals) >= 1): ?>
        <?php foreach($futureDeals as $futureDeal): ?>
        <tr>
         <td>
            <div class="ui child checkbox">
                <input type="checkbox" name="id[]" value="<?php echo e($futureDeal->future_deal_id); ?>">
                <label></label>
            </div>
        </td>
        <td><?php echo e($futureDeal->user_name); ?></td>
        <td><?php echo e(ucfirst($futureDeal->deal_name)); ?></td>       
        <td><?php echo e(ucfirst($futureDeal->company_name)); ?></td>        
        <td>&euro; <?php echo e($futureDeal->future_deal_price); ?></td>
        <td><?php echo e(date('d-m-Y', strtotime($futureDeal->expired_at))); ?></td>
        <td><?php echo e($futureDeal->total_persons); ?></td>
        <td><?php echo e($futureDeal->remain_persons); ?></td>        
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
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>