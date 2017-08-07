<?php

use App\Models\Company;
?>


<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#removeButton').click(function () {
            swal({
                title: "Weet u het zeker?",
                text: "Weet u zeker dat u uw recensie(s) wil verwijderen?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ja, ik weet het zeker!",
                closeOnConfirm: false
            }, function () {
                $('.ui.form').submit();
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="ui breadcrumb">
        <a href="<?php echo e(url('/')); ?>" class="section">Home</a>
        <i class="right chevron icon divider"></i>

        <a href="#" class="sidebar open" data-activates="slide-out">Menu</a>
        <i class="right chevron icon divider"></i>

        <div class="active section">Mijn recencies</div>
    </div>

    <div class="ui divider"></div>

    <?php if(isset($data) && count($data) >= 1): ?>
<?php echo Form::open(array('class' => 'ui form', 'method' => 'post')) ?>
    <div class="ui grid">
        <div class="left floated six wide column">
            <button id="removeButton" type="button" name="action" value="remove" class="ui icon grey button">
                <i class="trash icon"></i>
            </button>
        </div>
    </div>

    <table class="ui very basic collapsing celled table list">
        <thead>
            <tr>
                <th class="disabled one wide">
        <div class="ui master checkbox">
            <input type="checkbox">
            <label></label>
        </div>
        </th>
        <th class="two wide">Bedrijf</th>
        <th class="four wide">Recensie</th>
        <th class="one wide">Eten</th>
        <th class="one wide">Service</th>
        <th class="one wide">Decor</th>
        <th class="one wide"></th>
        </tr>
        </thead>
        <tbody class="list search">
            <?php if(isset($data)): ?>
            <?php foreach($data as $data): ?>
            <tr>
                <td>
                    <div class="ui child checkbox">
                        <input type="checkbox" name="id[]" value="<?php echo e($data->id); ?>">
                        <label></label>
                    </div>
                </td>
                <td><a href="<?php echo e(url('restaurant/'.$data->companySlug)); ?>"><?php echo e($data->companyName); ?></a></td>
                <td><?php echo e($data->content); ?></td>
                <td><div class="ui star medium  rating no-rating" data-rating="<?php echo e($data->food); ?>"></div></td>
                <td><div class="ui star medium  rating no-rating" data-rating="<?php echo e($data->service); ?>"></div></td>
                <td><div class="ui star medium  rating no-rating" data-rating="<?php echo e($data->decor); ?>"></div></td>
                <td>
                    <a href="<?php echo e(url('account/reviews/edit/'.$data->id)); ?>" class="ui label">Wijzig</a><br /><br />
                    <a href="<?php echo e(url('review/'.$data->id)); ?>" class="ui label">Delen</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php echo Form::close(); ?>
    <?php else: ?>
    <div class="ui three mini steps">
        <a href="<?php echo e(url('/')); ?>" class="link step">
            <i class="search icon"></i>
            <div class="content">
                <div class="title">Zoek een restaurant naar keuze</div>
            </div>
        </a>

        <div class="step">
            <i class="save icon"></i>
            <div class="content">
                <div class="title">Tevreden of ontevreden?</div>
            </div>
        </div>

        <div class=" step">
            <i class="check mark icon"></i>
            <div class="content">
                <div class="title">Schrijf een beoordeling</div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<div class="clear"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>