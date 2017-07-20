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
    <td><?php echo e($data->food); ?></td>
    <td><?php echo e($data->service); ?></td>
    <td><?php echo e($data->decor); ?></td>
    <td><?php echo e($data->content); ?></td>
    <td><?php echo e($data->company); ?></td>
    <td><?php echo $data->is_approved ? '<i class="check green mark icon"></i>' : '<i class="remove red icon"></i>'; ?></td>
    <td><?php echo e(date('d-m-Y H:i', strtotime($data->created_at))); ?></td>
    <td><a href="<?php echo e(url('review/'.$data->id)); ?>" class="ui label">Delen</a></td>
</tr>
<?php endforeach; ?>