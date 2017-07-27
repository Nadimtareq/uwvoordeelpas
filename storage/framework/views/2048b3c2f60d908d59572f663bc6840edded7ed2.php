<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('admin.template.remove_alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <?php echo $__env->make('admin.template.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="buttonToolbar">  
        <div class="ui grid">
            <div class="left floated sixteen wide mobile five wide computer column">
                <a href="<?php echo e(url('admin/reservations-options/create'.($slug != NULL ? '/'.$slug : ''))); ?>" class="ui icon blue button">
                    <i class="plus icon"></i> Nieuw
                </a>

                <button id="removeButton" type="submit" name="action" value="remove" class="ui disabled icon grey button">
                    <i class="trash icon"></i> Verwijderen
                </button>
            </div>

            <div class="right floated sixteen wide mobile eleven wide computer column">
                <div class="ui grid">
                    <div class="five column row">
                        <div class="column">
                            <?php if($userAdmin): ?>
                            <div class="ui normal icon search selection fluid dropdown">
                                <i class="filter icon"></i>

                                <div class="text">Bedrijf</div>

                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <?php if(count($companies) >= 1): ?>
                                        <?php foreach($companies as $company): ?>
                                        <a class="item" href="<?php echo e(url('admin/reservations-options?company=').$company->id); ?>"><?php echo e($company->name); ?></a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="column">
                            <div class="ui normal icon search selection fluid dropdown">
                                <i class="filter icon"></i>

                                <div class="text">Nieuwsbrief</div>

                                <i class="dropdown icon"></i>

                                <div class="menu">
                                    <a class="item" href="<?php echo e(url('admin/reservations-options?newsletter=1')); ?>">Yes</a>
                                    <a class="item" href="<?php echo e(url('admin/reservations-options?newsletter=0')); ?>">No</a>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="ui normal icon search selection fluid dropdown">
                                <i class="filter icon"></i>

                                <div class="text">Online</div>

                                <i class="dropdown icon"></i>

                                <div class="menu">
                                    <a class="item" href="<?php echo e(url('admin/reservations-options?online=1')); ?>">Yes</a>
                                    <a class="item" href="<?php echo e(url('admin/reservations-options?online=0')); ?>">No</a>
                                </div>
                            </div>
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
            <div class="sixteen wide mobile sixteen wide computer column">
            <form method="get" action="<?php echo e(url('admin/'.$slugController.'?'.http_build_query($queryString))); ?>">
                <div class="ui input">
                    <?php
                    echo Form::text(
                            'city', old('city'),array('placeholder' => 'City')
                    );
                    ?>
                </div>
                <div class="ui input">
                    <?php
                    echo Form::text(
                            'from', old('from'), array(
                        'class' => 'datepicker_no_min_date',
                        'placeholder' => 'Online from',
                        'style' => 'width: 300px;'
                            )
                    );
                    ?>
                </div>

                <div class="ui input">
                    <?php
                    echo Form::text(
                            'to', old('to'), array(
                        'class' => 'datepicker_no_min_date',
                        'placeholder' => 'Online tot',
                        'style' => 'width: 300px;'
                            )
                    );
                    ?>
                </div>
                <button class="ui button" type="submit"><i class="search icon"></i></button>
            </form>
        </div>
        </div>
    </div>

    <?php echo Form::open(array('id' => 'formList', 'method' => 'post')) ?>
    <table class="ui very basic sortable collapsing celled table list" style="width: 100%;">
        <thead>
            <tr>
                <th class="two wide" data-slug="disabled">
        <div class="ui master checkbox">
            <input type="checkbox">
            <label></label>
        </div>
        </th>
        <th data-slug="name" class="three wide">Plaats</th>
        <th data-slug="name" class="three wide">Naam</th>
        <th data-slug="company_id" class="three wide">Bedrijf</th>
        <th data-slug="city" class="three wide">City</th>
        <th data-slug="total_amount" class="four wide">beschikbaar</th>
        <th data-slug="total_res" class="four wide">verkocht</th>
        <th data-slug="date_from" class="four wide">Online van</th>
        <th data-slug="date_to" class="four wide">Online tot</th>
        <th data-slug="price_from" class="four wide">prijs van</th>
        <th data-slug="price" class="four wide">prijs voor</th>
        <th data-slug="total_res" class="four wide">Online</th>
        <th data-slug="newsletter" class="four wide">Nieuwsbrief</th>
        <!-- <th data-slug="gasten" class="four wide">Gasten</th> -->
        <th data-slug="disabled">online</th>
        </tr>
        </thead>
        <tbody class="list">
            <?php if(count($data) >= 1): ?>
                <?php $i=1;?>
            <?php foreach($data as $result): ?>
        
            <tr>
                <td>
                    <div class="ui child checkbox">
                        <input type="checkbox" name="id[]" value="<?php echo e($result->id); ?>">
                        <label></label>
                    </div>
                </td>
                <td><?php echo e($i++); ?></td>
                <td>
                    <?php echo e($result->name); ?>

                </td>
                <td>
                    <?php echo e($result->company_name); ?>

                </td>
                <td>
                    <?php echo e($result->city); ?>

                </td>
                <td>
                    <?php echo e($result->total_amount); ?>

                </td>
                <td>
                    <?php echo e(($result->total_res)?$result->total_res:0); ?>

                </td>
                <td>
                    <?php 
                    if(isset($result->date_from)){
                     echo date('d-m-Y', strtotime($result->date_from));
                    }
                    ?>                    
                </td>
                <td>
                    <?php 
                    if(isset($result->date_to)){
                        echo date('d-m-Y', strtotime($result->date_to));
                    }
                    ?>                    
                </td>
                <td>
                    <?php echo e(($result->price_from)?$result->price_from:''); ?>

                </td>
                <td>
                    <?php echo e(($result->price)?$result->price:''); ?>

                </td>
                <td>
                    <?php

                    $currentDate = date('Y-m-d');
                    ;
                    $contractDateBegin = date('Y-m-d', strtotime($result->date_from));
                    $contractDateEnd = date('Y-m-d', strtotime($result->date_to));
                    $result->date_from . '-' . $result->date_to;
                    if (($currentDate >= $contractDateBegin) && ($currentDate <= $contractDateEnd)) {
                        echo '<i class="icon green checkmark"></i>';
                    } else {
                        echo '<i class="icon red remove"></i>';
                    }
                    ?>
                </td>
                <td>
                    <?php 
                    if ($result->newsletter != 0) {
                        echo '<i class="icon green checkmark"></i>';
                    } else {
                        echo '<i class="icon red remove"></i>';
                    }
                    ?>
                </td>
                <td>
                    <a href="<?php echo e(url('admin/'.$slugController.'/update/'.$result->id)); ?>" class="ui icon tiny button">
                        <i class="pencil icon"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="13"><div class="ui error message">Er is geen data gevonden.</div></td>
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