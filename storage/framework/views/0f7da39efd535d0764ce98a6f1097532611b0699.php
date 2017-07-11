

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

                    <div class="sixteen wide mobile seven wide computer column">
                        <div class="ui normal icon fluid selection dropdown">
                            <input type="hidden" name="filters">
                            <i class="filter icon"></i>

                            <span class="text">Filter</span>
                            <i class="dropdown icon"></i>

                            <div class="menu">
                                <div class="header">
                                    <i class="tags icon"></i>
                                    Status
                                </div>

                                <div class="scrolling menu">
                                    <a class="item" 
                                    href="<?php echo e(url('admin/'.$slugController.'?'.http_build_query(array_add($queryString, 'status', 'paid')))); ?>" 
                                    data-value="Betaald">
                                    <div class="ui green empty circular label"></div>
                                    Betaald
                                </a>

                                <a class="item" 
                                href="<?php echo e(url('admin/'.$slugController.'?'.http_build_query(array_add($queryString, 'status', 'pending')))); ?>" 
                                data-value="In behandeling">
                                <div class="ui orange empty circular label"></div>
                                In behandeling
                            </a>

                            <a class="item" 
                            href="<?php echo e(url('admin/'.$slugController.'?'.http_build_query(array_add($queryString, 'status', 'open')))); ?>" 
                            data-value="Open">
                            <div class="ui blue empty circular label"></div>
                            Open
                        </a>
                        <a class="item" 
                        href="<?php echo e(url('admin/'.$slugController.'?'.http_build_query(array_add($queryString, 'status', 'cancelled')))); ?>" 
                        data-value="Cancelled">
                        <div class="ui red empty circular label"></div>
                        Cancelled
                    </a>
                    <a class="item" 
                    href="<?php echo e(url('admin/'.$slugController.'?'.http_build_query(array_add($queryString, 'status', 'expired')))); ?>" 
                    data-value="Expired">
                    <div class="ui light-red empty circular label"></div>
                    Expired
                </a>
            </div>
        </div>
    </div>
</div>

<div class="sixteen wide mobile four wide computer column">
    <?php echo $__env->make('admin.template.search.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
</div>
</div>
</div>
</div>

<div class="ui grid">
    <div class="five wide column">
        <div class="ui normal icon selection fluid dropdown">
            <input type="hidden" name="source" value="<?php echo e(Request::input('source')); ?>">

            <div class="text">Partij</div>
            <i class="dropdown icon"></i>

            <div class="menu">
                <a href="<?php echo e(url('admin/payments?'.http_build_query(array_add($queryString, 'source', 'seatme')))); ?>" data-value="seatme" class="item">SeatMe</a>
                <a href="<?php echo e(url('admin/payments?'.http_build_query(array_add($queryString, 'source', 'eetnu')))); ?>" data-value="eetnu" class="item">EetNU</a>
                <a href="<?php echo e(url('admin/payments?'.http_build_query(array_add($queryString, 'source', 'couverts')))); ?>" data-value="couverts" class="item">Couverts</a>
                <a href="<?php echo e(url('admin/payments?'.http_build_query(array_add($queryString, 'source', 'wifi')))); ?>" data-value="wifi" class="item">Wi-Fi</a>
            </div>
        </div>
    </div>

    <div class="five wide column">
        <?php echo Form::select('city', (isset($preference[9]) ? $preference[9] : array()), Request::input('city'), array('id' => 'cityRedirect', 'class' => 'ui normal search fluid dropdown')); ?>
    </div>
</div>
</div><br>

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
            <th data-slug="created_at" class="four wide">Datum</th>
            <th data-slug="amount" class="two wide">Bedrag</th>
            <th data-slug="name" class="three wide">Gebruiker</th>
            <th data-slug="name" class="three wide">Email</th>
            <th data-slug="mollie_id" class="two wide">Payment Type</th>
            <th data-slug="mollie_id" class="two wide">Mollie ID</th>
            <th data-slug="payment_type" class="two wide">Betalingswijze</th>
            <th data-slug="status" class="three wide">Status</th>
            <th data-slug="disabled" class="one disabled wide"></th>
        </tr>
    </thead>
    <tbody class="list search">
        <?php if(count($payments) >= 1): ?>
        <?php foreach($payments as $payment): ?>
        <tr>
         <td>
            <div class="ui child checkbox">
                <input type="checkbox" name="id[]" value="<?php echo e($payment->id); ?>">
                <label></label>
            </div>
        </td>
        <td><?php echo e(date('d-m-Y', strtotime($payment->created_at))); ?> om <?php echo e(date('H:i', strtotime($payment->created_at))); ?></td>
        <td>&euro; <?php echo e($payment->amount); ?></td>
        <td><a href="<?php echo e(url('admin/users/update/'.$payment->user_id)); ?>"><?php echo e($payment->name); ?></a></td>
        <td><a href="<?php echo e(url('admin/users/update/'.$payment->user_id)); ?>"><?php echo e($payment->email); ?></a></td>
        <td><?php echo e($payment->type); ?></td>
        <td><?php echo e($payment->mollie_id); ?></td>
        <td>
            <span class="method-icon micon" data-method="<?php echo e($payment->payment_type); ?>"></span> 
            <?php echo e(ucfirst($payment->payment_type)); ?>

        </td>
        <td>
            <?php if($payment->status == 'paid'): ?>
            <div class="ui green empty circular label"></div>
            <?php elseif($payment->status == 'open'): ?>
            <div class="ui blue empty circular label"></div>
            <?php elseif($payment->status == 'pending'): ?>
            <div class="ui orange empty circular label"></div>
            <?php elseif($payment->status == 'cancelled'): ?>
            <div class="ui red empty circular label"></div> 
            <?php elseif($payment->status == 'expired'): ?>
            <div class="ui light-red empty circular label"></div>
            <?php endif; ?>
        </td>
        <td>
            <a href="<?php echo e(url('admin/payments/update/'.$payment->id)); ?>" class="ui small icon button">
                <i class="pencil icon"></i>
            </a>
        </td>
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
<?php if($totalAmountForQuery): ?>
    <div class="clearfix">&nbsp;</div>
    <div class="ui grid">
        <div class="row">
            <div class="four wide column">
                <div class="ui red segment">
                    <strong class="">Totaal bedrag: &euro;<?php echo e($totalAmountForQuery); ?></strong><br>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix">&nbsp;</div>
<?php endif; ?>

<?php echo with(new \App\Presenter\Pagination($payments->appends($paginationQueryString)))->render(); ?><br><br>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>