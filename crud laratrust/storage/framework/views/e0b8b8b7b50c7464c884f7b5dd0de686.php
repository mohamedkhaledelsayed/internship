<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Category</title>
</head>
<body>
<form action="<?php echo e(route('categories.update', $category->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <label for="category_name_en">Category English Name</label>
    <input type="text" id="category_name_en" name="name[en]" value="<?php echo e(old('name.en', $category->translate('en')->name)); ?>">
    <?php $__errorArgs = ['name.en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="error"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <label for="category_name_ar">Category Arabic Name</label>
    <input type="text" id="category_name_ar" name="name[ar]" value="<?php echo e(old('name.ar', $category->translate('ar')->name)); ?>">
    <?php $__errorArgs = ['name.ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="error"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <input type="submit" value="Update">
</form>
</body>
</html>
<?php /**PATH D:\gamifiercomsa\first task\first task\resources\views/update.blade.php ENDPATH**/ ?>