<?php foreach($data as $fetch): ?>
<tr>
    <td>
        <div class="ui child checkbox">
        	<input type="checkbox" name="id[]" value="<?php echo e($fetch->id); ?>">
        	<label></label>
        </div>
    </td>
    <td><?php echo e($fetch->subject); ?></td>
    <td><?php echo e($fetch->type); ?></td>
    <td><?php echo e($fetch->name); ?></td>
    <td>
        <div class="ui toggle checkbox activeChange" data-id="<?php echo e($fetch->id); ?>">
            <input type="checkbox" name="public" <?php echo ($fetch->is_active == 0 ? 'checked="checked"' : ''); ?>>
        </div>
    </td>
    <td>
        <a href="<?php echo e(url('admin/mailtemplates/update/'.$fetch->id)); ?>" class="ui button">
            <i class="pencil icon"></i> Bewerk
        </a>
    </td>
</tr>
<?php endforeach; ?>