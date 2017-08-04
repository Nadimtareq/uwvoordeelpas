<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('admin.template.remove_alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <?php echo $__env->make('admin.template.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="buttonToolbar">
        <div class="ui grid">
            <div class="sixteen wide mobile seven wide computer column">
                <a href="<?php echo e(url('admin/'.$slugController.'/create')); ?>" class="ui icon blue button"><i class="plus icon"></i> Nieuw</a>

                <button id="removeButton" type="submit" name="action" value="remove" class="ui disabled icon grey button">
                    <i class="trash icon"></i> Verwijderen
                </button>

                <button id="closeButton" type="submit" name="action" value="reset" class="ui disabled icon grey button">
                    Reset e-mailtemplates
                </button>
            </div>

            <div class="sixteen wide mobile nine wide computer column">
                 <div class="ui grid">
                    <div class="three column row">
                        <div class="column">
                            <div class="ui normal search selection fluid dropdown item">
                                <input type="hidden" name="companiesId" value="<?php echo e(Request::input('regio')); ?>">
                                <i class="filter icon"></i>

                                <span class="text">Regio</span>

                                <i class="dropdown icon"></i>

                                <div class="menu">
                                    <?php foreach($regio as $prefId => $prefName): ?>
                                    <a href="<?php echo e(url('admin/companies?'.http_build_query(array_add($queryString, 'regio', $prefId)))); ?>" data-value="<?php echo e($prefId); ?>" class="item"><?php echo e($prefName); ?></a>
                                    <?php endforeach; ?>
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
        </div>
    </div>

   <?php echo Form::open(array('id' => 'formList', 'url' => 'admin/'.$slugController.'/delete', 'method' => 'post')) ?>
    	<input type="hidden" id="actionMan" name="action">
        <table class="ui very basic sortable collapsing celled table list" style="width: 100%;">
            <thead>
            	<tr>
            		<th data-slug="disabled" class="disabled one wide">
            			<div class="ui master checkbox">
    					  	<input type="checkbox">
    					  	<label></label>
    					</div>
    				</th>
                    <th data-slug="name" class="two wide">Naam</th>
                    <th data-slug="address" class="two wide">Adres</th>
                    <th data-slug="city">Stad</th>
                    <th data-slug="saldoCompany">Saldo</th>
                    <th data-slug="contact_name">Contact</th>
                    <th data-slug="clicks">Kliks</th>
                    <th data-slug="contact_role">Functie</th>
                    <th data-slug="contact_role">Alle Saldo</th>
                    <th data-slug="updated_at" class="two wide">Gewijzigd</th>
                    <th data-slug="no_show">No Show</th>
                    <th data-slug="disabled" class="disabled three wide"></th>
            	</tr>
            </thead>
            <tbody class="search list">
                <?php if(count($data) >= 1): ?>
                	<?php foreach($data as $result): ?>
                    <?php $documentItems = $result->getMedia('documents'); ?>
                    <?php $logoItems = $result->getMedia('logo'); ?>
                	<tr>
                		<td>
                			<div class="ui child checkbox">
        					  	<input type="checkbox" name="id[]" value="<?php echo e($result->id); ?>">
        					  	<label></label>
        					</div>
        				</td>
                        <td>
                            <a href="<?php echo e(url('restaurant/'.$result->slug)); ?>">
                                <?php echo e($result->name); ?>

                            </a>
                        </td>
                        <td><?php echo e($result->address); ?></td>
                        <td>
                            <a href="<?php echo e(url('admin/'.$slugController.'?city='.str_slug($result->city))); ?>">
                                <?php echo e($result->city); ?>

                            </a>
                        </td>
                        <td>
                            <a href="<?php echo e(url('admin/reservations/saldo/'.$result->slug)); ?>">
                                &euro;<?php echo e(number_format(($result->saldoCompany - $result->saldoDiscount), 2, '.', '')); ?>


                        <td>
                            <a href="<?php echo e(url('admin/'.$slugController.'/update/'.$result->id.'/'.$result->slug)); ?>" class="ui icon tiny button">
                                <?php echo e($result->contact_name); ?>

                            </a>
                        </td>
                        <td>
                            <?php echo e($result->clicks); ?>x
                        </td>
                        <td><?php echo e($result->contact_role); ?></td>
                        <td>
                            <a href="<?php echo e(url('admin/reservations/saldo/'.$result->slug)); ?>">
                            &euro;<?php echo e(number_format(($result->saldoCompany + $result->saldoPayments), 2, '.', '')); ?>

                            </a>
                        </td>
                        <td><?php echo e(date('d-m-Y', strtotime($result->updated_at))); ?></td>
                        <td>
                            <span class="ui icon tiny disabled button">
                                <?php if($result->no_show == 0): ?>
                                    <i class="check mark green center aligned icon"></i>
                                <?php else: ?>
                                    <i class="remove red icon"></i>
                                <?php endif; ?>
                            </span>
                        </td>
                		<td>
                            <div class="ui buttons">
                                <?php if(count($documentItems) > 0): ?>
                                <a href="<?php echo e(url('public'.$documentItems[0]->getUrl())); ?>"
                                   target="_blank"
                                   class="ui icon tiny red button">
                                    <i class="file pdf icon"></i>
                                </a>
                                <?php else: ?>
                                <a href="<?php echo e(url('admin/companies/contract/'.$result->id.'/'.$result->slug)); ?>"
                                   target="_blank"
                                   class="ui icon tiny <?php echo e((trim($result->signature_url) != '' ? 'red' : '')); ?> button">
                                    <i class="file pdf icon"></i>
                                </a>
                                <?php endif; ?>

                                <a href="<?php echo e(url('admin/'.$slugController.'/update/'.$result->id.'/'.$result->slug)); ?>" class="ui icon tiny button">
                                    <i class="pencil icon"></i>
                                </a>

                                <a href="<?php echo e(url('admin/'.$slugController.'/login/'.$result->slug)); ?>" class="ui icon tiny orange button loginAs" data-content="Inloggen als <?php echo e($result->name); ?>">
                                    <i class="key icon"></i>
                                </a>

                                <span class="ui icon tiny disabled button">
                                <?php if(count($logoItems) >= 1 && file_exists(public_path($logoItems[0]->getUrl()))): ?>
                                    <i class="image green  icon"></i>
                                <?php else: ?>
                                    <i class="image red icon"></i>
                                <?php endif; ?>
                                </span>

                                <span class="ui icon tiny disabled button">
                                <?php if(trim($result->signature_url) != '' OR count($documentItems) > 0): ?>
                                    <i class="check mark green center aligned icon"></i>
                                <?php else: ?>
                                    <i class="remove red icon"></i>
                                 <?php endif; ?>
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
    <?php echo Form::close(); ?>

    <?php echo with(new \App\Presenter\Pagination($data->appends($paginationQueryString)))->render(); ?>


</div>
<div class="clear"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>