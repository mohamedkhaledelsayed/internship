<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="<?php echo e(route('categories.update', $category->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <label for="category_name">Category English Name</label>
    <input type="text" id="category_name" name="name_en" value="<?php echo e(old('name', $category->name_en)); ?>">
    <?php if($errors->has('name_en')): ?>
        <span class="error"><?php echo e($errors->first('name_en')); ?></span>
    <?php endif; ?>
    <label for="category_name">Category Arabic Name</label>
    <input type="text" id="category_name" name="name_ar" value="<?php echo e(old('name_ar', $category->name)); ?>">
    <?php if($errors->has('name_ar')): ?>
        <span class="error"><?php echo e($errors->first('name_ar')); ?></span>
    <?php endif; ?>
    <input type="submit">
</form>


</body>
</html>
<?php /**PATH D:\gamifiercomsa\first task\task\resources\views/update.blade.php ENDPATH**/ ?>