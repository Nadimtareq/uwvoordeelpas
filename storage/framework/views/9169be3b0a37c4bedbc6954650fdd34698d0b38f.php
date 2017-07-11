<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('admin.template.remove_alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <?php echo $__env->make('admin.template.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="buttonToolbar">  
        <div class="ui grid container">
            <div class="sixteen wide mobile twelve wide computer column">
                <a href="<?php echo e(url('admin/mailtemplates/create'.(isset($companyParam) ? '/'.$companyParam : '')).(Request::has('type') ? '?type='.Request::input('type') : '')); ?>" class="ui icon blue button"><i class="plus icon"></i> Nieuw</a>

                <a href="<?php echo e(url('admin/mailtemplates'.(isset($companyParam) ? '/'.$companyParam : '').'?type=call')); ?>" class="ui icon blue disabled button"><i class="phone icon"></i> Bellen</a>
                <a href="<?php echo e(url('admin/mailtemplates'.(isset($companyParam) ? '/'.$companyParam : '').'?type=mail')); ?>" class="ui icon blue button"><i class="envelope icon"></i> Mail</a>
                <a href="<?php echo e(url('admin/mailtemplates'.(isset($companyParam) ? '/'.$companyParam : '').'?type=push')); ?>" class="ui icon blue button"><i class="announcement icon"></i> Push</a>
                <a href="<?php echo e(url('admin/mailtemplates'.(isset($companyParam) ? '/'.$companyParam : '').'?type=message')); ?>" class="ui icon blue disabled button"><i class="comment icon"></i> SMS</a>
                <a href="<?php echo e(url('admin/mailtemplates'.(isset($companyParam) ? '/'.$companyParam : '').'?type=notifications')); ?>" class="ui icon blue button"><i class="announcement icon"></i> Notificaties</a>

                <?php if($userAdmin): ?>  
                <button id="removeButton" type="submit" name="action" value="remove" class="ui disabled icon grey button">
                    <i class="trash icon"></i>
                </button>

                <a href="<?php echo e(url('admin/mailtemplates/settings')); ?>" class="ui icon button">
                    <i class="wrench icon"></i> 
                </a>
                <?php endif; ?>

                <?php echo $__env->make('admin.template.search.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

            <div class="three wide column">
                <?php if($userAdmin): ?>
                    <div class="ui normal icon search selection fluid dropdown">
                        <i class="filter icon"></i>

                        <div class="text">Bedrijf</div>

                        <i class="dropdown icon"></i>
                        
                        <div class="menu">
                            <?php if(count($companies) >= 1): ?>
                                <?php foreach($companies as $company): ?>
                                <a class="item" href="<?php echo e(url('admin/mailtemplates/'.$company->slug)); ?>"><?php echo e($company->name); ?></a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if(Request::input('type') == 'mail'): ?>
    <div class="ui icon info message">
        <i class="info icon"></i>

        <div class="content">
            <div class="header">
                OPGELET!
            </div>
            <p>
                Dit is het overzicht van uw mailverkeer, iedere mail kunt u aan/uit zetten en qua inhoud aanpassen.
            </p>
        </div>
    </div>
    <?php endif; ?>

    <?php if(Request::input('type') == 'call'): ?>
    <div class="ui icon info message">
        <i class="info icon"></i>

        <div class="content">
            <div class="header">
                OPGELET!
            </div>
            <p>
                Dit is het overzicht van uw belverkeer, iedere gesprek kunt u aan/uit zetten en qua inhoud aanpassen.
            </p>
        </div>
    </div>
    <?php endif; ?>

    <?php if(Request::input('type') == 'message'): ?>
    <div class="ui icon info message">
        <i class="info icon"></i>

        <div class="content">
            <div class="header">
                OPGELET!
            </div>
            <p>
                Dit is het overzicht van uw smsverkeer, iedere bericht kunt u aan/uit zetten en qua inhoud aanpassen.
            </p>
        </div>
    </div>
    <?php endif; ?>

    <?php if(Request::input('type') == 'push'): ?>
    <div class="ui icon info message">
        <i class="info icon"></i>

        <div class="content">
            <div class="header">
                OPGELET!
            </div>
            <p>
                Dit is het overzicht van uw push notificaties verkeer, iedere bericht kunt u aan/uit zetten en qua inhoud aanpassen.
            </p>
        </div>
    </div>
    <?php endif; ?>

    <?php if(Request::input('type') == 'notifications'): ?>
    <div class="ui icon info message">
        <i class="info icon"></i>

        <div class="content">
            <div class="header">
                OPGELET!
            </div>
            <p>
                Dit is het overzicht van uw notificaties verkeer, iedere bericht kunt u aan/uit zetten en qua inhoud aanpassen.
            </p>
        </div>
    </div>
    <?php endif; ?>

    <?php if(isset($companyParam) && Request::input('type') == 'call'): ?>
    <?php echo Form::open(array('class' => 'ui form', 'method' => 'post')) ?>
    <div class="three fields">
        <div class="field">
             <label>Stem</label>
            <?php 
            echo Form::select(
                'company', 
                array(
                    'Man',
                    'Vrouw'
                ), 
                '', 
                array(
                    'id' => 'companySelectAppointment', 
                    'class' => 'ui normal search dropdown'
                )
            );  
            ?>
        </div>       

        <div class="field">
             <label>Taal</label>
            <?php 
            echo Form::select(
                'company', 
                array(
                    'Nederlands',
                    'Engels (Groot-Brittannië)',
                    'Engels (Amerika)',
                    'Engels (Australie)',
                    'Spaans',
                    'Spaans (Mexico)',
                    'Spaans (Amerika)',
                    'Frans',
                    'Frans (Canada)',
                    'Russisch',
                    'Duits',
                    'Italiaans',
                ), 
                '', 
                array(
                    'id' => 'companySelectAppointment', 
                    'class' => 'ui normal search dropdown'
                )
            );  
            ?>
        </div>

        <div class="field">
            <label>Beluisteren</label>
            <button id="exampleButton" class="ui icon button">
                <i class="sound icon"></i> Voorbeeld
            </button>
        </div>
    </div>
    <?php echo Form::close(); ?>
    <?php endif; ?>

    <?php echo Form::open(array('id' => 'formList', 'url' => 'admin/mailtemplates/delete/'.$companyParam, 'method' => 'post')) ?>
        <table class="ui very basic collapsing  sortable celled table list" style="width: 100%;">
            <thead>
            	<tr>
            		<th data-slug="disabled" class="disabled one wide">
                        <div class="ui master checkbox">
                            <input type="checkbox">
                        </div>
    				</th>
                    <th data-slug="subject">Onderwerp</th>
                    <th data-slug="type">Soort</th>
                    <th data-slug="name">Bedrijf</th>
                    <th data-slug="is_active">Actief</th>
                    <th data-slug="disabled"></th>
            	</tr>
            </thead>

            <tbody class="list search">
                <?php if(count($data) >= 1): ?>
                	<?php echo $__env->make('admin/mailtemplates/list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2">
                            <div class="ui error message">Er is geen data gevonden.</div>
                        </td>
                    </tr>
            	<?php endif; ?>
            </tbody>
   		</table>
    <?php echo Form::close(); ?>


    <?php echo with(new \App\Presenter\Pagination($data->appends($paginationQueryString)))->render(); ?>

    <div class="clear"></div>
    
    <div class="container"><br />
    <?php echo $__env->make('admin.template.limit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

</div>
<div class="clear"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>