<?php $affiliateHelper = app('App\Helpers\AffiliateHelper'); ?>
<?php foreach($data as $data): ?>
<tr>
   <td>
        <div class="ui child checkbox">
            <input type="checkbox" name="id[]" value="<?php echo e($data->id); ?>">
            <label></label>
       </div>
    </td>
    <td><?php echo e($data->name); ?></td>
    <td><?php echo e($affiliateHelper->commissionMaxValue($data->compensations)); ?></td>
    <td><?php echo e($data->clicks); ?></td>
    <td><?php echo e($data->amount); ?></td>
    <td><?php echo e(strtotime($data->updated_at) > 0? date('d-m-Y', strtotime($data->updated_at)) : 'Niet gewijzigd'); ?></td>
    <td><?php echo e($data->catName); ?></td>
    <td>
        <a href="<?php echo e(URL::to('admin/'.$slugController.'/update/'.$data->id)); ?>" class="ui icon button">
            <i class="pencil icon"></i>
        </a>

        <a href="<?php echo e(URL::to('admin/'.$slugController.'/update/'.$data->id)); ?>" class="ui icon button">
            <i class="<?php echo e($data->no_show  == 1 ? 'red remove' : 'green checkmark'); ?> icon"></i>
        </a>
    </td>
</tr>
<?php endforeach; ?>