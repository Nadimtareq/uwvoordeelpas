<?php $invoiceModel = app('App\Models\Invoice'); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('admin.template.remove_alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('.payment-status').on('change', function() {
         $('#formList').submit();
     });
    });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <?php echo $__env->make('admin.template.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <div class="buttonToolbar">  
        <div class="ui grid">
            <?php if($userAdmin): ?>
            <div class="sixteen wide mobile six wide tablet four wide computer column">
                <a href="<?php echo e(url('admin/invoices/create')); ?>" class="ui icon blue button">
                    <i class="plus icon"></i> Nieuw
                </a>

                <button id="removeButton" type="submit" name="action" value="remove" class="ui disabled icon grey button">
                    <i class="trash icon"></i> Verwijderen
                </button>
            </div>
            <?php endif; ?>

            <div class="sixteen wide mobile ten wide tablet twelve wide computer column">
                <div class="ui grid">
                    <div class="three column row">
                        <div class="sixteen wide mobile nine wide tablet ten wide computer column">
                            <?php echo Form::open(array('method' => 'GET', 'class' => 'ui form')); ?>
                            <div class="three fields">
                                <div class="field">
                                    <?php echo Form::select('month', isset($selectMonths) ? $selectMonths : '', (Request::has('month') ? Request::has('month') : date('m')), array('class' => 'multipleSelect', 'data-placeholder' => 'Maand')); ?>
                                </div>

                                <div class="field">
                                    <?php echo Form::select('year', isset($selectYears) ? $selectYears : '', (Request::has('year') ? Request::get('year') : date('Y')), array('class' => 'multipleSelect', 'data-placeholder' => 'Jaar')); ?>
                                </div>     

                                <div class="field">
                                    <button type="submit" class="ui icon fluid filter button">
                                        <i class="filter icon"></i> 
                                    </button>
                                </div>
                            </div>

                            <?php echo Form::close(); ?>
                        </div>

                        <div class="sixteen wide mobile three wide tablet two wide computer column">
                            <?php echo $__env->make('admin.template.search.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>

                        <div class="sixteen wide mobile four wide tablet four wide computer column">
                            <div class="ui normal selection fluid dropdown">
                                <input type="hidden" name="paid" value="<?php echo e(Request::input('paid')); ?>">
                                <i class="dropdown icon"></i>

                                <div class="default text">Betaal status</div>

                                <div class="menu">
                                    <a href="<?php echo e(url('admin/invoices'.($slug ? '/overview/'.$slug : '').'?paid=1')); ?>" class="item" data-value="1">Voldaan</a>
                                    <a href="<?php echo e(url('admin/invoices'.($slug ? '/overview/'.$slug : '').'?paid=0')); ?>" class="item" data-value="0">Niet voldaan</a>
                                    <a href="<?php echo e(url('admin/invoices'.($slug ? '/overview/'.$slug : '').'?paid=2')); ?>" class="item" data-value="2">Geannuleerd</a>
                                    <a href="<?php echo e(url('admin/invoices'.($slug ? '/overview/'.$slug : '').'?paid=3')); ?>" class="item" data-value="3">Geincasseerd</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br />

    <?php echo Form::open(array('url' => 'admin/invoices/action', 'method' => 'post', 'id' => 'formList', 'class' => 'ui form')) ?>
    <div>
        <table class="ui sortable very basic collapsing celled unstackable table" style="width: 100%;">
            <thead>
                <tr>
                    <?php if($userAdmin): ?>
                    <th data-slug="disabled" class="disabled one wide">
                        <div class="ui master checkbox">
                           <input type="checkbox" name="example">
                           <label></label>
                       </div>
                   </th>
                   <?php endif; ?>
                   <th data-slug="invoice_number" class="one wide">Factuurnummer</th>
                   <th data-slug="start_date" class="one wide">Startdatum</th>
                   <th data-slug="disabled" class="one wide">Verloopdatum</th>
                   <th data-slug="total_persons" class="one wide">Te betalen</th>
                   <th data-slug="total_persons" class="one wide">Te ontvangen</th>
                   <th data-slug="name" class="two wide">Restaurant</th>
                    <th data-slug="paid" class="two wide">Betaald</th><!-- 
                    <th data-slug="type" class="one wide">Soort</th> -->
                    <th data-slug="disabled" class="disabled two wide"></th>
                </tr>
            </thead>
            <tbody class="list search">
                <?php if(count($invoices) >= 1): ?>
                <?php echo e($slug); ?>

                <?php foreach($invoices as $invoice): ?>
                <tr>
                    <?php if($userAdmin): ?>
                    <td>
                        <div class="ui child checkbox">
                            <input type="checkbox" name="id[]" value="<?php echo e($invoice->id); ?>">
                            <label></label>
                        </div>
                    </td>
                    <?php endif; ?>
                    <td><?php echo e($invoice->invoice_number); ?><?php echo e(($userAdmin == 1 && $invoice->debit_credit == 'credit' ? '-'.$invoice->debit_credit : '')); ?></td>
                    <td><?php echo e(date('d-m-Y', strtotime($invoice->start_date))); ?></td>
                    <td><?php echo e(date('d-m-Y', strtotime($invoice->start_date.' +14 days'))); ?></td>
                    <td>
                        <?php if($slug == null): ?>
                        <?php if($invoice->type != 'products'): ?>
                        &euro;<?php echo e($invoice->total_saldo); ?>

                        <?php endif; ?>
                        <?php else: ?>
                        <?php if($invoice->type == 'products'): ?>
                        <?php echo e($invoiceModel->getTotalProductsSaldo($invoice->products)); ?>

                        <?php else: ?>
                        &euro;<?php echo e(($invoice->total_persons * 1.21)); ?>

                        <?php endif; ?>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($slug == null): ?>
                        <?php if($invoice->type == 'products'): ?>
                        <?php echo e($invoiceModel->getTotalProductsSaldo($invoice->products)); ?>

                        <?php else: ?>
                        &euro;<?php echo e(($invoice->total_persons * 1.21)); ?>

                        <?php endif; ?>
                        <?php else: ?>
                        <?php if($invoice->type != 'products'): ?>
                        &euro;<?php echo e($invoice->total_saldo); ?>

                        <?php endif; ?>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($invoice->name); ?></td>
                    <td>
                        <?php if($userAdmin): ?>
                        <div class="ui normal selection dropdown payment-status">
                            <input type="hidden" name="paid" value="<?php echo e($invoice->paid); ?>">
                            <i class="dropdown icon"></i>

                            <div class="default text">Status</div>

                            <div class="menu">
                                <a href="<?php echo e(url('admin/invoices/setpaid?paid=1&invoice_id='.$invoice->id)); ?>" class="item" data-value="1">Voldaan</a>
                                <a href="<?php echo e(url('admin/invoices/setpaid?paid=0&invoice_id='.$invoice->id)); ?>" class="item" data-value="0">Niet voldaan</a>
                                <a href="<?php echo e(url('admin/invoices/setpaid?paid=2&invoice_id='.$invoice->id)); ?>" class="item" data-value="2">Geannuleerd</a>
                                <a href="<?php echo e(url('admin/invoices/setpaid?paid=3&invoice_id='.$invoice->id)); ?>" class="item" data-value="3">Geincasseerd</a>
                            </div>
                        </div>
                        <?php else: ?>
                        <?php if($invoice->paid == 0): ?>
                        <span class="ui label fluid red">Niet betaald</span>
                        <?php elseif($invoice->paid == 2): ?>
                        <span class="ui label fluid red">Geannuleerd</span>
                        <?php else: ?>
                        <span class="ui label fluid green">Betaald</span>
                        <?php endif; ?>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="ui buttons">
                            <?php if($userAdmin): ?>
                            <a href="<?php echo e(url('admin/invoices/send/'.$invoice->invoice_number)); ?>"  data-email="<?php echo e($invoice->financial_email == NULL ? 'Geen emailadres' : $invoice->financial_email); ?>" class="ui icon invoices send <?php echo e($invoice->getMeta('invoice_send') == 1 ? 'yellow' : ''); ?> button">
                                <i class="envelope icon"></i>
                            </a>

                            <a href="<?php echo e(url('admin/invoices/update/'.$invoice->id)); ?>" class="ui icon button">
                                <i class="pencil icon"></i>
                            </a>
                            <?php endif; ?>

                            <a href="<?php echo e(url('admin/invoices/download/'.$invoice->invoice_number)); ?>" class="ui icon button">
                                <i class="download icon"></i>
                            </a>
                            <span class="ui icon label">
                                <?php /* <span class="method-icon micon" data-method="<?php echo e($invoice->payment_method); ?>"></span> */ ?>

                                <a href="<?php echo e(url('payment/pay-invoice/pay/'.$invoice->invoice_number)); ?>" class="method-icon micon">
                                </a> 
                            </span>
                        </div>
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
    </div>
    <?php echo Form::close(); ?>

    <?php echo with(new \App\Presenter\Pagination($invoices->appends($paginationQueryString)))->render(); ?>


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>