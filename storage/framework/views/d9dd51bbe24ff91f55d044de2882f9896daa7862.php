<?php foreach($data as $fetch): ?>
<?php $dt = $carbon->create(date('Y', strtotime($fetch->date)), date('m', strtotime($fetch->date)), date('d', strtotime($fetch->date)), 0, 0, 0);  ?>
<tr>
    <td>
        <div class="ui child checkbox">
        	<input type="checkbox" name="id[]" value="<?php echo e($fetch->res_id); ?>" data-date="<?php echo e($dt->formatLocalized('%a %d %B %Y')); ?>">
        	<label></label>
        </div>
    </td>
    <td>
        <?php if(
            $fetch->is_locked == 1 
            || count(array_keys(json_decode($fetch->available_persons, true))) == (json_decode($fetch->locked_times, true) != NULL ? count(array_keys(json_decode($fetch->locked_times, true))) : 0)): ?>
            <?php echo e($dt->formatLocalized('%a %d %B %Y')); ?>

        <?php else: ?>
        <a href="<?php echo e(url('admin/reservations/date/'.$fetch->company_id.'/'.date('Ymd', strtotime($fetch->date)))); ?>">
            <?php echo e($dt->formatLocalized('%a %d %B %Y')); ?>

        </a>
        <?php endif; ?>
    </td>
    <?php if(Request::has('time')): ?>
    <td>
        <?php foreach(Request::get('time') as $time): ?>
            <?php if(in_array(date('H:i', strtotime($time)), array_keys(json_decode($fetch->available_persons, true)))): ?>
            <?php echo e(date('H:i', strtotime($time))); ?> uur
            <input type="hidden" value="<?php echo e(date('H:i', strtotime($time))); ?>" name="time[<?php echo e($fetch->res_id); ?>][time][<?php echo e(date('H:i', strtotime($time))); ?>]">
            <?php endif; ?>
        <?php endforeach; ?>

        <input type="hidden" name="company" value="<?php echo e($fetch->company_id); ?>">
    </td>
    <?php else: ?>
    <td><?php echo e(date('H:i', strtotime($fetch->start_time))); ?> uur</td>
    <td><?php echo e(date('H:i', strtotime($fetch->end_time))); ?> uur</td>
    <?php endif; ?>
    <td class="personInput">
        <?php
        $total = 0;

        foreach (json_decode($fetch->available_persons) as $amount) {
            $total += $amount;
            $persons = $amount;
        }

        echo '<input type="number" name="persons['.$fetch->res_id.']" min="1" value="'.($fetch->is_locked == 0 ? $persons : '').'" '.($fetch->is_locked == 1 || count(array_keys(json_decode($fetch->available_persons, true))) == (json_decode($fetch->locked_times, true) != NULL ? count(array_keys(json_decode($fetch->locked_times, true))) : 0) ? 'disabled' : '').' />';
        ?>
    </td>
    <td>
        <?php
        $availablePersons = 0;
        foreach (json_decode($fetch->available_persons) as $time => $amount) {
            $availablePersons += $amount;
        }

        echo ($fetch->is_locked == 0 ? $availablePersons - $fetch->persons : 0 );
        ?>
    </td>
    <td>
        <a <?php echo $fetch->persons >= 1 ? 'class="personReserved"' : ''; ?> 
            data-count="<?php echo e((trim($fetch->persons) != '' ? $fetch->persons : 0)); ?>" 
            href="<?php echo e(url('admin/reservations/clients/'.$fetch->company_id.'?date='.date('Ymd', strtotime($fetch->date)))); ?>">
            <?php echo e((trim($fetch->persons) != '' ? $fetch->persons : 0)); ?>

        </a>
    </td>
    <td><?php echo e($fetch->company_name); ?></td>
    <td><?php echo ($fetch->is_locked == 1 || count(array_keys(json_decode($fetch->available_persons, true))) == (json_decode($fetch->locked_times, true) != NULL ? count(array_keys(json_decode($fetch->locked_times, true))) : 0) ? '<i class="remove red icon"></i>' : '<i class="check mark green icon"></i>') ?></td>
</tr>
<?php endforeach; ?>