<?php foreach($data_two as $fetch): ?>
    <tr>
        <td>
            <div class="ui child checkbox">
            	<input type="checkbox" name="id[]" value="<?php echo e($fetch->id); ?>">
            	<label></label>
            </div>
        </td>
        <td><?php echo e($fetch->is_active == 1 ? 'Geactiveerd' : 'Niet geactiveerd'); ?></td>
        <td><?php echo e($fetch->code); ?></td>
        <td><?php echo e($fetch->amount); ?></td>
        <td><?php echo e($fetch->max_usage); ?></td>
        <td><?php echo e($fetch->used_no); ?></td>
        <td><?php echo e(trim($fetch->companyName) == '' ? 'UwVoordeelpas' : $fetch->companyName); ?></td>
        <td><?php echo e(date('d-m-Y', strtotime($fetch->created))); ?></td>
        <td><a href="<?php echo e(url('admin/'.$slugController.'/update/'.$fetch->id)); ?>" class="ui label"><i class="pencil icon"></i> Bewerk</a>
            <a href="<?php echo e(url('admin/'.$slugController.'/used/'.$fetch->id)); ?>" class="ui label"><i class="eye icon"></i> Gebruik</a>
        </td>
    </tr>
<?php endforeach; ?>