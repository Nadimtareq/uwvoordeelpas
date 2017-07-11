<?php foreach($data as $data): ?>
<tr>
    <td>
        <div class="ui child checkbox">
        	<input type="checkbox" name="id[]" value="<?php echo e($data->id); ?>">
        	<label></label>
        </div>
    </td>
    <td><?php echo e($data->name); ?></td>
    <td><?php echo e($data->email); ?></td>
    <td><?php echo e($data->subject); ?></td>
    <td><?php echo e($data->content); ?></td>
    <?php /*<td><a href="<?php echo e(url('admin/'.$slugController.'/update/'.$data->id)); ?>" class="ui label"><i class="pencil icon"></i> Bewerk</a></td>*/ ?>
</tr>
<?php endforeach; ?>