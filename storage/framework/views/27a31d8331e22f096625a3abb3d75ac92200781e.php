<?php $__env->startSection('fixedMenu'); ?>
<a href="<?php echo e(url('faq/6/spaartegoed')); ?>" class="ui black icon big launch right attached fixed button">
    <i class="question mark icon"></i>
    <span class="text">Veelgestelde vragen</span>
</a><br />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="ui breadcrumb">
        <a href="<?php echo e(url('/')); ?>" class="section">Home1</a>
        <i class="right chevron icon divider"></i>

        <a href="#" class="sidebar open">Menu</a>
        <i class="right chevron icon divider"></i>

        <div class="active section">Spaartegoed</div>
    </div>

    <div class="ui divider"></div>

    <?php echo Form::open(array('method' => 'GET', 'class' => 'ui form')); ?>
        <div class="five fields">
            <div class="field">
                <?php echo Form::select('month', array_unique($months), (Request::has('month') ? Request::has('month') : date('m')), array('class' => 'multipleSelect', 'data-placeholder' => 'Maand')); ?>
            </div>

            <div class="field">
                <?php echo Form::select('year', array_unique($years), (Request::has('year') ? Request::get('year') : date('Y')), array('class' => 'multipleSelect', 'data-placeholder' => 'Jaar')); ?>
            </div>    

            <div class="field">
                <input type="submit" class="ui blue fluid filter button" value="Filteren" />
            </div>

            <div class="field">
                <div class="ui normal floating dropdown labeled icon fluid button">
                     <div class="tex">Soort</div>
                     <i class="list icon"></i>

                    <?php if(isset($limit)): ?>
                    <div class="menu">
                         <a class="item" href="<?php echo e(url('account/reservations/saldo?'.http_build_query(array_add($queryString, 'type', 'transactions')))); ?>">Transactie</a>
                         <a class="item" href="<?php echo e(url('account/reservations/saldo?'.http_build_query(array_add($queryString, 'type', 'payments')))); ?>">Opwaardering</a>
                         <a class="item" href="<?php echo e(url('account/reservations/saldo?'.http_build_query(array_add($queryString, 'type', 'reservations')))); ?>">Reservering</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="field">
                <div class="ui normal floating dropdown labeled icon fluid button">
                     <div class="text"><?php echo e((isset($limit) ? $limit : 15)); ?> resultaten</div>
                     <i class="list icon"></i>

                    <?php if(isset($limit)): ?>
                    <div class="menu">
                         <a class="item" href="<?php echo e(url('account/reservations/saldo?'.http_build_query(array_add($queryString, 'limit', '15')))); ?>">15</a>
                         <a class="item" href="<?php echo e(url('account/reservations/saldo?'.http_build_query(array_add($queryString, 'limit', '30')))); ?>">30</a>
                         <a class="item" href="<?php echo e(url('account/reservations/saldo?'.http_build_query(array_add($queryString, 'limit', '45')))); ?>">45</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php echo Form::close(); ?><br />

    <div id="formList">
        <table class="ui very basic collapsing sortable celled table list" style="width: 100%;">
            <thead>
                <tr>
                    <th data-slug="date" class="three wide">Datum</th>
                    <th data-slug="amount" class="two wide">Bedrag</th>
                    <th data-slug="status" class="two wide">Status</th>
                    <th data-slug="type" class="two wide">Soort</th>
                    <?php if($userAdmin): ?>
                    <th data-slug="userName" class="two wide">Gebruiker</th>
                    <?php endif; ?>
                    <th data-slug="company" class="two wide">Bedrijf</th>
                    <th data-slug="expired_date" class="six wide">Vervalt op</th>
                </tr>
            </thead>
            <tbody class="list search">

                <?php foreach($data as $fetch): ?>
                <?php 
                $date = \Carbon\Carbon::create(
                    date('Y', strtotime($fetch['date'])),
                    date('m', strtotime($fetch['date'])),
                    date('d', strtotime($fetch['date']))
                );

                $expired = \Carbon\Carbon::create(
                    date('Y', strtotime($fetch['expired_date'])),
                    date('m', strtotime($fetch['expired_date'])),
                    date('d', strtotime($fetch['expired_date']))
                );
                ?>
                <tr>
                    <td>
                        <i class="calendar icon"></i> 
                        <?php echo e($date->formatLocalized('%d %B %Y')); ?><br> 

                        <i class="clock icon"></i>
                        <?php echo e(date('H:i', strtotime($fetch['date']))); ?>

                    </td>
                    <td><i class="euro icon"></i> <?php echo e(number_format($fetch['amount'], 2, ',', ' ')); ?></td>
                    <td>
                        <?php if($fetch['type']  == 'Transactie'): ?>
                            <?php if($fetch['status'] == 'accepted'): ?>
                                Goedgekeurd
                            <?php elseif($fetch['status'] == 'open'): ?>
                                In behandeling
                            <?php elseif($fetch['status'] == 'open'): ?>
                               Verlopen
                            <?php elseif($fetch['status'] == 'rejected'): ?>
                                Afgekeurd
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if($fetch['status'] == 'paid'): ?>
                                Goedgekeurd
                            <?php elseif($fetch['restaurant_is_paid'] == 1 OR $fetch['amount'] == 0): ?>
                            Afgehandeld
                            <?php elseif($fetch['status'] == "received"): ?>
                            Ontvangen
                            <?php else: ?>
                            In behandeling
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($fetch['type']); ?></td>
                    <?php if($userAdmin): ?>
                    <td><?php echo e($fetch['userName']); ?></td>
                    <?php endif; ?>

                    <td class="companyname"><?php echo e($fetch['company']); ?></td>
                    <td>
                        <?php if($fetch['type']  == 'Transactie'): ?>
                            <i class="calendar icon"></i> <?php echo e($expired->formatLocalized('%d %B %Y')); ?>

                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php echo with(new \App\Presenter\Pagination($data->appends($paginationQueryString)))->render(); ?>


    <button class="ui green button" type="button" onclick="document.location.href='<?php echo e(url('/payment/charge')); ?>'"><i class="pencil icon"></i> Saldo opwaarderen</button>
</div>
<div class="clear"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>