<!-- resources/views/categories/create.blade.php -->

<form action="<?php echo e(route('categories.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <label for="name_<?php echo e($locale); ?>"><?php echo e(__('Name')); ?> (<?php echo e($locale); ?>)</label>
            <input type="text" id="name_<?php echo e($locale); ?>" name="name[<?php echo e($locale); ?>]" required>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <button type="submit"><?php echo e(__('Save')); ?></button>
</form>
<?php /**PATH D:\gamifiercomsa\first task\first task\resources\views/create.blade.php ENDPATH**/ ?>