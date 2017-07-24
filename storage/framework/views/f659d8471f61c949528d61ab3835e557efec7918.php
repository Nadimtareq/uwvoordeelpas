<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('admin.template.remove_alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <?php echo $__env->make('admin.template.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="buttonToolbar">  
        <div class="ui grid">
            <div class="left floated sixteen wide mobile seven wide computer column">
                <a href="<?php echo e(url('admin/guests/create/'.$slug)); ?>" class="ui icon blue button"><i class="plus icon"></i> Nieuw</a>
                <a href="<?php echo e(url('admin/guests/create-reservation/'.$slug)); ?>" class="ui icon blue button"><i class="plus icon"></i> Nieuwe reservering</a>
                        
                <button id="removeButton" type="submit" name="action" value="remove" class="ui disabled icon grey button">
                    <i class="trash icon"></i> Verwijderen
                </button>
            </div>

            <div class="right floated sixteen wide mobile nine wide computer column">
                 <div class="ui form">
                    <div class="four fields">
                        <div class="field">
                            <?php if($userAdmin): ?>
                                <?php 
                                echo Form::select(
                                    'city[]', 
                                    isset($preference[9]) ? $preference[9] : array(),
                                    Request::input('city'),
                                    array(
                                        'id' => 'citySelect', 
                                        'multiple' => 'multiple',
                                        'data-placeholder' => 'Stad',
                                        'class' => 'multipleSelect'
                                    )
                                ); 
                                ?>
                            <?php endif; ?>
                        </div>

                        <div class="field">
                            <?php 
                            $preferencesCompany = array();

                            if (is_array(json_decode($companyInfo['preferences']))) {
                                $preferencesCompany = array_combine(
                                    json_decode($companyInfo['preferences']), 
                                    array_map('ucfirst', json_decode($companyInfo['preferences']))
                                );
                            }

                            echo Form::select(
                                'preferences[]', 
                                $preferencesCompany,
                                Request::input('preferences'),
                                array(
                                    'id' => 'preferencesSelect', 
                                    'multiple' => 'multiple',
                                    'data-placeholder' => 'Voorkeuren',
                                    'class' => 'multipleSelect'
                                )
                            ); 
                            ?>
                        </div>

                        <div class="field">
                            <?php 
                            $allergiesCompany = array();

                            if (is_array(json_decode($companyInfo['allergies']))) {
                                $allergiesCompany = array_combine(
                                    json_decode($companyInfo['allergies']), 
                                    array_map('ucfirst', json_decode($companyInfo['allergies']))
                                );
                            }

                            echo Form::select(
                                'allergies[]', 
                                $allergiesCompany,
                                Request::input('allergies'),
                                array(
                                    'id' => 'allergiesSelect',
                                    'multiple' => 'multiple',
                                    'data-placeholder' => 'Alergie&euml;n',
                                    'class' => 'multipleSelect'
                                )
                            ); 
                            ?>
                        </div>

                        <div class="field">
                            <button data-url="<?php echo e(url('admin/guests/'.$slug)); ?>" id="filterGuests" class="ui blue icon  button" type="button">
                                <i class="filter icon"></i> 
                            </button>

                            <?php echo $__env->make('admin.template.search.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br />

    <div class="ui small left floated buttons">
        <a href="<?php echo e(url('admin/guests/'.$slug)); ?>" class="ui <?php echo e(Request::has('newsletter') == FALSE ? 'active' : ' '); ?> button">Alles</a>
        <a href="<?php echo e(url('admin/guests/'.$slug)); ?>?newsletter=0" class="ui <?php echo e(Request::has('newsletter') && Request::get('newsletter') == 0 ? 'active' : ' '); ?> button">Geen nieuwsbrief</a>
        <a href="<?php echo e(url('admin/guests/'.$slug)); ?>?newsletter=1" class="ui <?php echo e(Request::has('newsletter') && Request::get('newsletter') == 1 ? 'active' : ' '); ?>  button">Wel nieuwsbrief</a>
    </div>

    <div class="ui small right floated buttons">
        <a href="<?php echo e(url('admin/guests/export/'.$slug)); ?>" class="ui icon button"><i class="download icon"></i> Exporteer</a>
        <a href="<?php echo e(url('admin/guests/import/'.$slug)); ?>" class="ui icon button"><i class="plus icon"></i> Importeer</a>
    </div><br /><br />

    <?php echo Form::open(array('id' => 'formList', 'url' => 'admin/guests/delete/'.$slug, 'method' => 'post')) ?>
        <table class="ui very basic sortable collapsing celled table list" style="width: 100%;">
            <thead>
                <tr>
                    <th data-slug="disabled" class="disabled">
                        <div class="ui master checkbox">
                            <input type="checkbox" name="example">
                            <label></label>
                        </div>
                    </th>
                    <th data-slug="name">Naam</th>
                    <th data-slug="city">Stad</th>
                    <th data-slug="gender">Geslacht</th>
                    <th data-slug="phone">Telefoon</th>
                    <th data-slug="email">E-mailadres</th>
                    <th class="disabled"  data-slug="disabled">Voordeelpas</th>
                    <th class="disabled" data-slug="disabled">Nieuwsbrief</th>
                    <th data-slug="created_at">Geregistreerd op</th>
                    <th class="disabled" data-slug="disabled">Laatst gereserveerd op</th>
                    <?php if(Sentinel::inRole('admin') != FALSE): ?>
                        <th class="disabled" data-slug="disabled"></th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody class="list">
                <?php if(count($data) >= 1): ?>
                    <?php foreach($data as $result): ?>
                    <tr>
                        <td>
                            <div class="ui child checkbox">
                                <input type="checkbox" name="id[]" value="<?php echo e($result->user_id); ?>">
                                <label></label>
                            </div>
                        </td>
                        <td>
                            <a href="<?php echo e(url('account/reservations/'.$slug.'/user/'.$result->user_id)); ?>">
                                <?php echo e($result->name); ?>

                            </a>
                        </td>
                        <td>
                            <?php if(is_array(json_decode($result->city)) >= 1): ?>
                                <?php foreach(json_decode($result->city) as $city): ?>
                                    <?php if(isset($regio[$city])): ?>
                                        <?php echo e($regio[$city]); ?>

                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e(($result->gender == 1 ? 'Man' : $result->gender == 2 ? 'Vrouw' : '')); ?></td>
                        <td><?php echo e($result->phone); ?></td>
                        <td><?php echo e($result->email); ?></td>
                        <td>
                            <?php if($result->discountCard == 1): ?>
                            <a href="<?php echo e(url('admin/barcodes/'.$slug.'?user='.$result->id)); ?>">
                                Bekijk voordeelpas 
                            </a>
                            <?php else: ?>
                            Niet beschikbaar
                            <?php endif; ?>
                        </td>
                        <td><i class="circle small <?php echo e($result->newsletter >= 1 ? 'green' : 'red'); ?> icon"></i></td>
                        <td>
                            <?php echo e(date('d-m-Y', strtotime($result->created_at))); ?> 
                            om <?php echo e(date('H:i', strtotime($result->created_at))); ?>

                        </td>
                        <td>
                            <?php if($result->last_reservation): ?>
                            <?php echo e(date('d-m-Y', strtotime($result->last_reservation))); ?> 
                            <?php endif; ?>

                            <?php if($result->last_reservation_time): ?>
                            om <?php echo e(date('H:i', strtotime($result->last_reservation_time))); ?>

                            <?php endif; ?>
                        </td>
                        <?php if(Sentinel::inRole('admin') != FALSE): ?>
                            <td>
                                <a href="<?php echo e(url("admin/users/update/{$result->id}")); ?>" class="ui icon tiny button">
                                    <i class="pencil icon"></i>
                                </a>
                            </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                 <?php else: ?>
                    <tr>
                        <td colspan="2"><div class="ui error message">Er is geen data gevonden.</div></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table><br /><br />

    <?php echo Form::close(); ?>
     <?php echo $__env->make('admin.template.limit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo with(new \App\Presenter\Pagination($data->appends($paginationQueryString)))->render(); ?>


</div>
<div class="clear"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>