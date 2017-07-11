

<?php $__env->startSection('fixedMenu'); ?>
<a href="<?php echo e(url('faq/20/financieel')); ?>" class="ui black icon big launch right attached fixed button">
    <i class="question mark icon"></i>
    <span class="text">Veelgestelde vragen</span>
</a><br />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="ui breadcrumb">
        <a href="<?php echo e(url('/')); ?>">Home</a>
        <i class="right chevron icon divider"></i>

        <a href="#" class="sidebar open">Menu</a>
        <i class="right chevron icon divider"></i>

        <div class="section"><?php echo e($companyName); ?></div>
        <i class="right chevron icon divider"></i>

        <a href="<?php echo e(url('admin/'.$slugController.(isset($slugParam) ? $slugParam : ''))); ?>">
            <div class="ui normal scrolling bread pointing dropdown item">
                <div class="text">Saldo</div>

                <div class="menu">
                    <?php if($userCompanies): ?>
                         <?php echo $__env->make('template/navigation/company', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>

                    <?php echo $__env->make('template/navigation/admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </a>

        <?php if(Request::has('month') && Request::has('year')): ?>
        <i class="right chevron icon divider"></i>

        <div class="section"><?php echo e($months[Request::get('month')]); ?></div>
        <i class="right chevron icon divider"></i>

        <div class="section"><?php echo e(Request::get('year')); ?></div>
        <?php endif; ?>
    </div>

    <div class="ui divider"></div>

    <?php echo Form::open(array('method' => 'GET', 'class' => 'ui form')); ?>
        <div class="fields">
            <div class="four wide field">
                <?php if($userAdmin): ?>
                <div id="companiesSearch" class="ui search fluid">
                    <div class="ui icon fluid input">
                        <input class="prompt" type="text" placeholder="Typ een naam in..">
                        <i class="search icon"></i>
                    </div>

                    <div class="results"></div>
                </div>
                <?php endif; ?>
            </div>

            <div class="three wide field">
                <?php
                echo Form::select(
                    'month',
                    $selectMonths,
                    (Request::has('month') ? Request::has('month') : date('m')),
                    array(
                        'class' => 'ui normal dropdown'
                    )
                );
                ?>
            </div>

            <div class="field">
                <?php
                echo Form::select(
                    'year',
                    $selectYears,
                    (Request::has('year') ? Request::get('year') : date('Y')),
                    array(
                        'class' => 'ui normal dropdown'
                    )
                );
                ?>
            </div>

            <div class="one wide field">
                <button type="submit" class="ui blue icon fluid filter button">
                    <i class="filter icon"></i>
                </button>
            </div>

            <div class="field">
                <div class="ui normal selection source dropdown item">
                    <input type="hidden" name="saldo" value="<?php echo e(Request::get('source')); ?>">
                    <div class="text">
                         Partij
                    </div>
                    <i class="dropdown icon"></i>

                    <div class="menu">
                        <a class="item" data-value="seatme" href="<?php echo e(url('admin/'.$slugController.'?'.http_build_query(array_add($queryString, 'source', 'seatme')))); ?>">SeatMe</a>
                        <a class="item" data-value="eetnu" href="<?php echo e(url('admin/'.$slugController.'?'.http_build_query(array_add($queryString, 'source', 'eetnu')))); ?>">EetNu</a>
                        <a class="item" data-value="couverts" href="<?php echo e(url('admin/'.$slugController.'?'.http_build_query(array_add($queryString, 'source', 'couverts')))); ?>">Couverts</a>
                        <a class="item" data-value="wifi" href="<?php echo e(url('admin/'.$slugController.'?'.http_build_query(array_add($queryString, 'source', 'wifi')))); ?>">W-Fi</a>
                    </div>
                </div>
            </div>

            <div class="field">
                <div class="ui normal selection fluid dropdown item">
                    <input type="hidden" name="saldo" value="<?php echo e(Request::get('saldo')); ?>">
                    <div class="text">
                         Spaartegoed
                    </div>
                    <i class="dropdown icon"></i>

                    <div class="menu">
                        <a class="item" href="<?php echo e(url('admin/'.$slugController)); ?>">Alles</a>
                        <a class="item" data-value="1" href="<?php echo e(url('admin/'.$slugController.'?'.http_build_query(array_add($queryString, 'saldo', 1)))); ?>">Met spaartegoed</a>
                        <a class="item" data-value="0" href="<?php echo e(url('admin/'.$slugController.'?'.http_build_query(array_add($queryString, 'saldo', 0)))); ?>">Zonder spaartegoed</a>
                    </div>
                </div>
            </div>
        </div>
    <?php echo Form::close(); ?><br>

    <?php if($userAdmin): ?>
    <div class="ui grid">
        <div class="three wide column">
            <div class="ui normal floating basic search selection dropdown">
                <input type="hidden" name="companyCurrentId" value="<?php echo e(Request::segment(4)); ?>">

                <div class="text">Bedrijf</div>
                <i class="dropdown icon"></i>

                <div class="menu">
                    <?php foreach($filterCompanies as $filterCompany): ?>
                    <a class="item" data-value="<?php echo e($filterCompany->id); ?>" href="<?php echo e(url('admin/reservations/saldo/'.$filterCompany->slug)); ?>"><?php echo e($filterCompany->name); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="five wide column">
            <?php echo Form::select('city', (isset($preference[9]) ? $preference[9] : array()), Request::input('city'), array('id' => 'cityRedirect', 'class' => 'ui normal search fluid dropdown')); ?>
        </div>

        <div class="five wide column">
            <div class="ui normal selection fluid dropdown item">
                <input type="hidden" name="caller_id" value="<?php echo e(Request::get('caller_id')); ?>">

                <div class="text">Beller</div>
                <i class="dropdown icon"></i>

                <div class="menu">
                    <?php foreach($callcenterUsers as $user): ?>
                    <a class="item" data-value="1" href="<?php echo e(url('admin/reservations/saldo?'.http_build_query(array_add($queryString, 'caller_id', $user->id)))); ?>"><?php echo e($user->name); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php echo Form::open(array('id' => 'formList')) ?>
    <table class="ui sortable very basic collapsing celled unstackable table" style="width: 100%;">
        <thead>
            <tr>
                <th data-slug="date" data-column-order="desc" class="three wide">Datum en tijd</th>
                <th data-slug="companyName" data-column-order="desc" class="two wide">Bedrijf</th>
                <th data-slug="name" data-column-order="desc" class="two wide">Gereserveerd als</th>
                <th data-slug="phone" data-column-order="desc" class="two wide">Omschrijving</th>
                <th data-slug="persons" data-column-order="desc" class="one wide">Personen</th>
                <th data-slug="saldo" class="three wide">Kosten</th>
                <th data-slug="disabled" class="disabled one wide">Betaald</th>
                <th data-slug="saldo" class="three wide">Saldo</th>
            </tr>
        </thead>
        <tbody class="list search">
             <?php if(count($data) >= 1): ?>
                <?php echo $__env->make('admin/reservations.list-saldo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <tr>
                    <td colspan="4">Totaal</td>
                    <td > <?php echo e($totalPersons); ?> </td>
                    <td colspan="1" ><i class="euro icon"></i> <?php echo e($totalKosten); ?></td>
                    <td></td>
                    <td colspan="5"><i class="euro icon"></i> <?php echo e(number_format($totalSaldo, 2, '.', '')); ?></td>
                </tr>
                <tr>
                    <td colspan="7">Totaal bedrag</td>

                    <td><i class="euro icon"></i> <?php echo e(number_format($totalSaldo - $totalKosten, 2, '.', '')); ?></td>
                </tr>
            <?php else: ?>
                <tr>
                    <td colspan="2"><div class="ui error message">Er is geen data gevonden.</div></td>
                </tr>
            <?php endif; ?>
        </tbody>
   	</table>
    <?php echo Form::close(); ?>
    <?php echo $__env->make('admin.template.limit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo with(new \App\Presenter\Pagination($data->appends($paginationQueryString)))->render(); ?>


</div>
<div class="clear"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>