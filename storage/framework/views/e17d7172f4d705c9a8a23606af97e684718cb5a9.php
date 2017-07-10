<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('admin.template.remove_alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <?php echo $__env->make('admin.template.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="buttonToolbar">  
        <div class="ui grid">
            <div class="row">                
                <div class="sixteen wide mobile four wide computer column">
                    <a href="<?php echo e(url('admin/'.$slugController.'/create')); ?>" class="ui icon blue button"><i class="plus icon"></i> Nieuw</a>

                    <button id="removeButton" type="submit" name="action" value="remove" class="ui disabled icon grey button">
                        <i class="trash icon"></i> Verwijderen
                    </button>
                </div>

                <div class="sixteen wide mobile twelve wide computer column">
                    <div class="ui grid">
                        <div class="three column row">
                            <div class="sixteen wide mobile four wide computer column">
                                <div class="ui normal  search selection fluid dropdown"> <!-- icon class deleted-->
                                    <input type="hidden" name="companiesId">
                                    <i class="filter icon"></i>

                                    <span class="text">Bedrijf</span>

                                    <i class="dropdown icon"></i>

                                    <div class="menu">
                                        <?php foreach($companies as $company): ?>
                                        <a class="item" href="<?php echo e(url('admin/guests/'.$company->slug)); ?>" data-value="<?php echo e($company->id); ?>">
                                            <?php echo e($company->name); ?>

                                        </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="sixteen wide mobile four wide computer column">
                                <?php echo Form::select('city', (isset($preference[9]) ? $preference[9] : array()), Request::input('city'), array('id' => 'cityRedirect', 'class' => 'ui normal search fluid dropdown')); ?>
                            </div>

                            <div class="sixteen wide mobile four wide computer column">
                                <div class="ui normal floating basic search selection dropdown">
                                    <input type="hidden" name="source" value="<?php echo e(Request::input('source')); ?>">

                                    <div class="text">Partij</div>
                                    <i class="dropdown icon"></i>

                                    <div class="menu">
                                        <a href="<?php echo e(url('admin/users?'.http_build_query(array_add($queryString, 'source', 'seatme')))); ?>" data-value="seatme" class="item">SeatMe</a>
                                        <a href="<?php echo e(url('admin/users?'.http_build_query(array_add($queryString, 'source', 'eetnu')))); ?>" data-value="eetnu" class="item">EetNU</a>
                                        <a href="<?php echo e(url('admin/users?'.http_build_query(array_add($queryString, 'source', 'couverts')))); ?>" data-value="couverts" class="item">Couverts</a>
                                        <a href="<?php echo e(url('admin/users?'.http_build_query(array_add($queryString, 'source', 'wifi')))); ?>" data-value="wifi" class="item">Wi-Fi</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="sixteen wide mobile three wide computer column">
                                <?php echo $__env->make('admin.template.limit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>

                            <div class="sixteen wide mobile one wide computer column">
                                <?php echo $__env->make('admin.template.search.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            <div class="row">                
                <div class="sixteen wide mobile four wide computer column">
                    <div class="ui normal floating basic search selection dropdown">
                        <input type="hidden" name="has_saving" value="<?php echo e(Request::input('has_saving')); ?>">

                        <div class="text">Spaarhulp</div>
                        <i class="dropdown icon"></i>

                        <div class="menu">                            
                            <a href="<?php echo e(url('admin/users?'.http_build_query(array_add($queryString, 'has_saving', '1')))); ?>" data-value="1" class="item">Ja</a>
                            <a href="<?php echo e(url('admin/users?'.http_build_query(array_add($queryString, 'has_saving', '0')))); ?>" data-value="0" class="item">Nee</a>
                            <a href="<?php echo e(url('admin/users?'.http_build_query(array_add($queryString, 'has_saving', '2')))); ?>" data-value="2" class="item">Mislukt</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br />

    <?php echo Form::open(array('id' => 'formList', 'url' => 'admin/' . $slugController . '/delete', 'method' => 'post')) ?>
    <table class="ui very basic sortable collapsing celled table list" style="width: 100%;">
        <thead>
            <tr>
                <th data-slug="disabled">
        <div class="ui master checkbox">
            <input type="checkbox">
            <label></label>
        </div>
        </th>
        <th data-slug="name">Naam</th>
        <th data-slug="city">Stad</th>
        <th data-slug="gender">Geslacht</th>
        <th data-slug="phone">Telefoon</th>
        <th data-slug="email">E-mailadres</th>
        <th data-slug="newsletter">Nieuwsbrief</th>
        <th data-slug="saldo">Saldo</th>
        <th data-slug="created_at">Geregistreerd op</th>
        <th data-slug="updated_at">Laatst ingelogd</th>
        <th data-slug="disabled"></th>
        </tr>
        </thead>
        <tbody class="list">
            <?php if(count($data) >= 1): ?>
            <?php foreach($data as $result): ?>
            <tr>
                <td>
                    <div class="ui child checkbox">
                        <input type="checkbox" name="id[]" value="<?php echo e($result->id); ?>">
                        <label></label>
                    </div>
                </td>
                <td>

                    <a href="<?php echo e(url('admin/'.$slugController.'/update/'.$result->id)); ?>">
                        <?php echo e($result->name?$result->name:''); ?>

                    </a>
                </td>
                <td>
                    <?php if(is_array(json_decode($result->city)) >= 1): ?>
                    <?php foreach(json_decode($result->city) as $city): ?>
                    <?php if(isset($regio[$city])): ?>
                    <?php echo e($regio[$city]); ?>

                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php else: ?>
                    Geen stad opgegeven
                    <?php endif; ?>
                </td>
                <td><?php echo e(($result->gender == 1 ? 'Man' : 'Vrouw')); ?></td>
                <td><?php echo e($result->phone); ?></td>
                <td><?php echo e($result->email); ?></td>
                <td class="text-center"><i class="icon checkmark <?php echo e($result->newsletter == 1 ? 'green' : 'red'); ?>"></i></td>
                <td>
                    <a href="<?php echo e(url('account/reservations/saldo/'.$result->id)); ?>" class="ui fluid text1 aligned center label">&euro;<?php echo e($result->saldo); ?></a>

                    <a href="<?php echo e(url('admin/users/saldo/reset/'.$result->id)); ?>" class="ui mini blue fluid button">Reset</a>
                </td>
                <td><?php echo e(date('d-m-Y H:i', strtotime($result->created_at))); ?></td>
                <td><?php echo e(date('d-m-Y H:i', strtotime($result->updated_at))); ?></td>
                <td>
                    <a href="<?php echo e(url('admin/'.$slugController.'/update/'.$result->id)); ?>" class="ui icon tiny button">
                        <i class="pencil icon"></i>
                    </a>

                    <a href="<?php echo e(url('admin/'.$slugController.'/login/'.$result->id)); ?>" class="ui icon tiny orange button loginAs" data-content="Inloggen als <?php echo e($result->name); ?>">
                        <i class="key icon"></i>
                    </a>
                </td>
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

    <?php echo with(new \App\Presenter\Pagination($data->appends($paginationQueryString)))->render(); ?>

</div>
<div class="clear"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>