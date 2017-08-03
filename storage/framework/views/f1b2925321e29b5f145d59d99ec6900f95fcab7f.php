<?php
setlocale(LC_TIME, 'Dutch');
?>
<?php foreach($data as $result): ?>

<?php

$date = \Carbon\Carbon::create(date('Y', strtotime($result->date)), date('m', strtotime($result->date)), date('d', strtotime($result->date)));

?>
<tr>
    <td>
        <i class="calendar icon"></i>
        <?php echo e($date->formatLocalized('%d %B %Y')); ?><br>

        <i class="clock icon"></i>
        <?php echo e(date('H:i', strtotime($result->time))); ?> 
    </td>
    <?php if(Sentinel::inRole('admin')): ?>
    <td>
        <?php echo e($result->companyName); ?>

    </td>
    <?php endif; ?>
    <td>
        <a href="<?php echo e(url('account/reservations/'.$result->companySlug.'/user/'.$result->user_id)); ?>">
            <?php echo e($result->name); ?>

        </a>
        <a href="<?php echo e(url('account/reservations/'.$result->companySlug.'/user/'.$result->user_id)); ?>"><?php echo e($result->email); ?></a>
        <a href="<?php echo e(url('account/reservations/'.$result->companySlug.'/user/'.$result->user_id)); ?>"><?php echo e($result->phone); ?></a>

    </td>

    <td>
        <?php echo e($result->deal_name); ?>


    </td>
    <td><?php echo e($result->persons); ?></td>
    <td><i class="euro icon"></i> <?php echo e((float)($result->price_per_guest * $result->persons )); ?></td>
    <td class="text-aligned center">
    <?php 
    $dbDate = strtotime($result->date.' '.$result->time);
    $currentDate = strtotime(date('Y-m-d H:i'));
    if($currentDate > $dbDate){
    echo '<i class="green icon checkmark"></i>';
    }else{ echo '<i class="red remove icon"></i>';}
    ?>
    <!-- <?php echo ($result->restaurant_is_paid == 1 ? '<i class="green icon checkmark"></i>' : '<i class="red remove icon"></i>'); ?> -->
    </td>
    <td><i class="euro icon"></i> <?php echo e((float)$result->saldo); ?></td>
</tr>
<?php endforeach; ?>