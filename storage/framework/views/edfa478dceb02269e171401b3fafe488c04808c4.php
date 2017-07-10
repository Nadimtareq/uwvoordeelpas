<?php
use App\Models\Company;
?>
<?php foreach($data as $data): ?>
<tr>
    <td>
        <div class="ui child checkbox">
        	<input type="checkbox" name="id[]" value="<?php echo e($data->id); ?>">
        	<label></label>
        </div>
    </td>
    <td><?php echo e($data->name); ?></td>
    <td><?php echo e(Config::get('preferences.options.'.$data->category_id)); ?></td>
    <td><?php echo e($data->clicks); ?></td>
    <td><a href="<?php echo e(url('admin/'.$slugController.'/update/'.$data->id)); ?>" class="ui label">Bewerk</a></td>
</tr>
<?php endforeach; ?>