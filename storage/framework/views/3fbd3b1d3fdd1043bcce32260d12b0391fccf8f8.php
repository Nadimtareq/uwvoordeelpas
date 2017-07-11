<?php foreach($data as $fetch): ?>
    <?php
    $expireDate = $fetch->expire_date != NULL ? date('d-m-Y', strtotime($fetch->expire_date)): date('d-m-Y', strtotime('+1 year', strtotime($fetch->created_at)));
    ?>

    <tr>
        <td>
            <div class="ui child checkbox">
            	<input type="checkbox" name="id[]" value="<?php echo e($fetch->id); ?>">
            	<label></label>
            </div>
        </td>
        <td class="center aligned">
            <i class="circle large <?php echo e($expireDate < date('d-m-Y') ? 'green' : 'red'); ?> on icon"></i>
        </td>        <td><?php echo e($fetch->code); ?></td>
        <td><a href="<?php echo e(url('admin/users/update/'.$fetch->user_id)); ?>"><?php echo e($fetch->name); ?></a></td>
        <td><?php echo e(trim($fetch->companyName) == '' ? 'UwVoordeelpas' : $fetch->companyName); ?></td>
        <td><?php echo e(date('d-m-Y', strtotime($fetch->created_at))); ?></td>
        <td>
            <?php echo e($expireDate); ?>

        </td>
        <td><a href="<?php echo e(url('admin/'.$slugController.'/update/'.$fetch->id)); ?>" class="ui label"><i class="pencil icon"></i> Bewerk</a></td>
    </tr>
<?php endforeach; ?>