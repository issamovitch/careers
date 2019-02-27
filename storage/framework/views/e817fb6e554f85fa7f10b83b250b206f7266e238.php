<?php $__currentLoopData = $job->fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($field->job_id==$location): ?>
        <div class="form-group">
            <?php if($field->type!="file"): ?>
                <label for="field<?php echo e($location); ?>_<?php echo e($field->id); ?>"><?php echo e($field->name); ?> <?php if($field->required==1): ?> <span class="red">*</span> <?php endif; ?></label>
            <?php endif; ?>
            <?php if($field->type=="text"): ?>
                <input type="text" name="field<?php echo e($location); ?>_<?php echo e($field->id); ?>" id="field<?php echo e($location); ?>_<?php echo e($field->id); ?>" class="form-control"  <?php if($field->required==1): ?> required <?php endif; ?> placeholder="<?php echo e($field->placeholder); ?>">
            <?php elseif($field->type=="textarea"): ?>
                <textarea name="field<?php echo e($location); ?>_<?php echo e($field->id); ?>" id="field<?php echo e($location); ?>_<?php echo e($field->id); ?>" class="form-control"  <?php if($field->required==1): ?> required <?php endif; ?> rows="2" placeholder="<?php echo e($field->placeholder); ?>"></textarea>
            <?php elseif($field->type=="date"): ?>
                <div class="input-group">
                    <input type="text" name="field<?php echo e($location); ?>_<?php echo e($field->id); ?>" id="field<?php echo e($location); ?>_<?php echo e($field->id); ?>" class="datepicker form-control"  <?php if($field->required==1): ?> required <?php endif; ?> placeholder="<?php echo e($field->placeholder); ?>">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
            <?php elseif($field->type=="time"): ?>
                <div class="input-group">
                    <input type="text" name="field<?php echo e($location); ?>_<?php echo e($field->id); ?>" id="field<?php echo e($location); ?>_<?php echo e($field->id); ?>" class="timepicker form-control"  <?php if($field->required==1): ?> required <?php endif; ?> placeholder="<?php echo e($field->placeholder); ?>">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                </div>
            <?php elseif($field->type=="select"): ?>
                <select name="field<?php echo e($location); ?>_<?php echo e($field->id); ?>" id="field<?php echo e($location); ?>_<?php echo e($field->id); ?>" class="form-control select2x"  <?php if($field->required==1): ?> required <?php endif; ?>>
                    <?php $__currentLoopData = explode(",", $field->options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($o); ?>"><?php echo e($o); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <small><?php echo e($field->placeholder); ?></small>
            <?php elseif($field->type=="multiple"): ?>
                <select name="field<?php echo e($location); ?>_<?php echo e($field->id); ?>[]" id="field<?php echo e($location); ?>_<?php echo e($field->id); ?>" class="form-control select2x"  <?php if($field->required==1): ?> required <?php endif; ?> multiple>
                    <?php $__currentLoopData = explode(",", $field->options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($o); ?>"><?php echo e($o); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <small><?php echo e($field->placeholder); ?></small>
                
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
