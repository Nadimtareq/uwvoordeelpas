<?php $__env->startSection('fixedMenu'); ?>
<a href="<?php echo e(url('faq/8/reserveren')); ?>" class="ui black icon big launch right attached fixed button">
    <i class="question mark icon"></i>
    <span class="text">Veelgestelde vragen</span>
</a><br />
<script type="text/javascript">
        $("#pageLoader").fadeOut('slow');
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="content">
    <div class="ui breadcrumb">
        <a href="#" data-activates="slide-out" class="sidebar open">Menu</a>
        <i class="right chevron icon divider"></i>

        <a href="<?php echo e(url('admin/reservations'.(isset($companyParam) && $userCompany == TRUE ? '/clients/'.$company : '/clients'))); ?>" class="section">Reserveringen
        </a>

        <i class="right chevron icon divider"></i>

        <?php if(trim($date) != ''): ?>
        <div class="active section"><?php echo e(date('d-m-Y', strtotime($date))); ?></div>
        <?php else: ?>
        <div class="active section">Alle reserveringen</div>
        <?php endif; ?>
    </div>

    <div class="ui divider"></div>

    <input type="hidden" name="redirectUrl" value="<?php echo e(url('admin/reservations/clients'.(isset($companyInfo->name) ? '/'.$companyInfo->id : ''))); ?>">
    <input type="hidden" name="company" value="<?php echo e(isset($companyInfo->name) ? $companyInfo->id : ''); ?>">
    <input type="hidden" name="date" value="<?php echo e($date); ?>">

    <div class="buttonToolbar">
        <div class="ui grid">
            <div class="row">
                <div class="left floated sixteen wide mobile ten wide computer column">
                    <a href="<?php echo e(url('admin/guests/create-reservation'.$companyParam)); ?>" class="ui icon button">
                        <i class="plus icon"></i>
                        Nieuw
                    </a>

                    <?php if($userAdmin): ?>
                    <div class="ui normal floating basic search selection dropdown">
                        <input type="hidden" name="companyCurrentId" value="<?php echo e(Request::segment(4)); ?>">

                        <div class="text">Bedrijf</div>
                        <i class="dropdown icon"></i>

                        <div class="menu">
                            <?php foreach($filterCompanies as $filterCompany): ?>
                            <a class="item" data-value="<?php echo e($filterCompany->id); ?>" href="<?php echo e(url('admin/reservations/clients/'.$filterCompany->id)); ?>"><?php echo e($filterCompany->name); ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if($userAdmin): ?>
                    <div class="ui normal floating basic search two wide compact selection dropdown">
                        <input type="hidden" name="source" value="<?php echo e(Request::input('source')); ?>">

                        <div class="text">Partij</div>
                        <i class="dropdown icon"></i>

                        <div class="menu">
                            <a href="<?php echo e(url('admin/reservations/clients/'.$companyParam.'?'.http_build_query(array_add($queryString, 'source', 'seatme')))); ?>" data-value="seatme" class="item">SeatMe</a>
                            <a href="<?php echo e(url('admin/reservations/clients/'.$companyParam.'?'.http_build_query(array_add($queryString, 'source', 'eetnu')))); ?>" data-value="eetnu" class="item">EetNU</a>
                            <a href="<?php echo e(url('admin/reservations/clients/'.$companyParam.'?'.http_build_query(array_add($queryString, 'source', 'couverts')))); ?>" data-value="couverts" class="item">Couverts</a>
                            <a href="<?php echo e(url('admin/reservations/clients/'.$companyParam.'?'.http_build_query(array_add($queryString, 'source', 'wifi')))); ?>" data-value="wifi" class="item">W-Fi</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php echo Form::select('city', (isset($preference[9]) ? $preference[9] : array()), Request::input('city'), array('id' => 'cityRedirect', 'class' => 'ui normal search three wide dropdown')); ?>

                </div>

                <div class="right floated sixteen wide mobile six wide computer column">
                     <div class="ui icon input">
                        <input type="text" class="ajax-datepicker" placeholder="Datum" data-value="<?php echo e($date); ?>">
                        <i class="calendar icon"></i>
                    </div>

                    <a href="<?php echo e(url('admin/reservations'.$companyParam)); ?>" class="ui icon button">
                        <i class="options icon"></i>
                        Instellingen
                    </a>
                </div>

                <div class="left floated sixteen wide mobile sixteen wide computer column">
                    <div class="ui labeled green button" tabindex="0">
                        <a href="<?php echo e(url('admin/reservations/clients/'.(isset($companyInfo->name) ? $companyInfo->id : '').'/'.($date == null ? '' : date('Ymd', strtotime($date))))); ?>"  class="ui green button">
                            <i class="white checkmark icon"></i> Gereserveerd
                        </a>

                        <a href="<?php echo e(url('admin/reservations/clients/'.(isset($companyInfo->name) ? $companyInfo->id : '').'/'.($date == null ? '' : date('Ymd', strtotime($date))))); ?>" class="ui basic label">
                            <?php echo e($statistics['allReservations']); ?>

                        </a>
                    </div>

                    <div class="ui labeled orange button" tabindex="0">
                        <a href="<?php echo e(url('admin/reservations/clients/'.(isset($companyInfo->name) ? $companyInfo->id : '').'/'.($date == null ? '' : date('Ymd', strtotime($date))).'?cancelled=1')); ?>" class="ui orange button">
                            <i class="minus circle white icon"></i> Geannuleerd
                        </a>

                        <a href="<?php echo e(url('admin/reservations/clients/'.(isset($companyInfo->name) ? $companyInfo->id : '').'/'.($date == null ? '' : date('Ymd', strtotime($date))).'?cancelled=1')); ?>" class="ui basic label">
                            <?php echo e($statistics['cancelledReservations']); ?>

                        </a>
                    </div>

                    <div class="ui labeled green button" tabindex="0">
                        <a href="<?php echo e(url('admin/reservations/clients/'.(isset($companyInfo->name) ? $companyInfo->id : '').'/'.($date == null ? '' : date('Ymd', strtotime($date))).'?status=noshow')); ?>" class="ui red button">
                           <i class="remove circle white icon"></i> No Show
                        </a>

                        <a href="<?php echo e(url('admin/reservations/clients/'.(isset($companyInfo->name) ? $companyInfo->id : '').'/'.($date == null ? '' : date('Ymd', strtotime($date))).'?status=noshow')); ?>" class="ui basic label">
                            <?php echo e($statistics['noShowReservations']); ?>

                        </a>
                    </div>

                    <div class="ui labeled green button" tabindex="0">
                        <a href="<?php echo e(url('admin/reservations/clients/'.(isset($companyInfo->name) ? $companyInfo->id : '').'/'.($date == null ? '' : date('Ymd', strtotime($date))).'?status=iframe')); ?>" class="ui blue button">
                            <i class="user white icon"></i> Eigen
                        </a>

                        <a href="<?php echo e(url('admin/reservations/clients/'.(isset($companyInfo->name) ? $companyInfo->id : '').'/'.($date == null ? '' : date('Ymd', strtotime($date))).'?status=iframe')); ?>" class="ui basic label">
                            <?php echo e($statistics['iframeReservations']); ?>

                        </a>
                    </div>

                    <div class="ui labeled green button" tabindex="0">
                        <a href="<?php echo e(url('admin/reservations/clients/'.(isset($companyInfo->name) ? $companyInfo->id : '').'/'.($date == null ? '' : date('Ymd', strtotime($date))).'?status=email')); ?>" class="ui button">
                             <i class="mail white icon"></i> E-mail
                        </a>

                        <a class="ui basic label">
                             <?php echo e($statistics['thirdPartyReservations']); ?>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
 </div>
 <div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 offset-l">
            <div class="table-responsive">
                <div id="formList">
                    <table id="tableClients" class="table table-striped table-hover table-bordered tables">
                        <thead>
                        <tr>
                            <th data-slug="disabled" class="one wide">Tafel</th>
                            <th data-slug="time" class="four wide">Datum reservering</th>
                            <th data-slug="persons" class="one wide">Gasten</th>
                            <th data-slug="name" class="four wide">Gereserveerd als</th>
                            <th data-slug="deal" class="four wide">Gereserveerd Deal</th>

                            <th data-slug="allergies" class="one wide">Allergie&euml;n</th>
                            <th data-slug="preferences" class="one wide">Voorkeuren</th>
                            <th data-slug="comment" class="two wide">Opmerking</th>

                            <th data-slug="saldo" class="one wide">Saldo</th>
                            <th data-slug="discount" class="one wide">Korting</th>
                            <th data-slug="restaurant_is_paid" class="one wide">Betaald</th>
                            <?php if($company == NULL): ?>
                                <th data-slug="name" class="two wide">Bedrijf</th>
                            <?php endif; ?>
                            <th data-slig="disabled" class="four wide" style="pointer-events: none;cursor: default;">Opties</th>
                        </tr>
                        </thead>
                        <tbody class="list search">
                        <?php if(count($data) >= 1): ?>
                            <?php echo $__env->make('admin/reservations.list-clients', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="2"><div class="ui error message">Er is geen data gevonden.</div></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table><br /><br />
                </div>
            </div>

        </div>
    </div>

</div>




    <div class="ui grid container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="left floated sixteen wide mobile ten wide computer column">
                    <?php echo with(new \App\Presenter\Pagination($data->appends($paginationQueryString)))->render(); ?>

                </div>
                <div class="col-lg-4 col-md-4 col-sn-4 col-xs-8">
                    <div class="right floated sixteen wide mobile sixteen wide tablet three wide computer column">
                        <?php echo $__env->make('admin.template.limit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="clear"></div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>