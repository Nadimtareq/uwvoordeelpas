<?php $__env->startSection('content'); ?>
<div class="content">
    <?php echo $__env->make('admin.template.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <div id="formList">
        <table class="ui very basic collapsing sortable celled table list" style="width: 100%;">
            <thead>
                <tr>
                    <th data-slug="created_at" class="three wide">Datum</th>
                    <th data-slug="name" class="two wide">Naam</th>
                    <th data-slug="code" class="two wide">Code</th>
                    <th data-slug="amount" class="two wide">Bedrag</th>
                    
                </tr>
            </thead>
            <tbody class="list search">
                <?php if(count($data) > 0): ?>
                <?php foreach($data as $fetch): ?>
                <?php 
                $date = \Carbon\Carbon::create(
                    date('Y', strtotime($fetch['created_at'])),
                    date('m', strtotime($fetch['created_at'])),
                    date('d', strtotime($fetch['created_at']))
                );
                ?>
                <tr>
                    <td>
                        <i class="calendar icon"></i> 
                        <?php echo e($date->formatLocalized('%d %B %Y')); ?><br> 

                        <i class="clock icon"></i>
                        <?php echo e(date('H:i', strtotime($fetch['created_at']))); ?>

                    </td>
                    <td><?php echo e($fetch['name']); ?></td>
                    <td><?php echo e($fetch['code']); ?></td>
                    <td><?php echo e($fetch['amount']); ?></td>
                    
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr><td colspan="4"><div class="ui error message">Er is geen data gevonden.</div></td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php echo with(new \App\Presenter\Pagination($data->appends($paginationQueryString)))->render(); ?>

</div>
<div class="clear"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>