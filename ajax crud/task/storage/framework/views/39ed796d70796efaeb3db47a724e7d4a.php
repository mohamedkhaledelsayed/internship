<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create</title>
</head>
<body>
<form action="<?php echo e(route('subcategories.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <label for="subCategory_name">subCategory Name</label>
    <input type="text" id="subCategory_name" name="name" >
    <?php if($errors->has('name')): ?>
        <span class="error"><?php echo e($errors->first('name')); ?></span>
    <?php endif; ?>


    <label for="category_id">Category ID</label>
<input type="text" id="category_id" name="category_id">
    <?php if($errors->has('category_id')): ?>
        <span class="error"><?php echo e($errors->first('category_id')); ?></span>
    <?php endif; ?>

    <label for="image">subCategory Image</label>
    <input type="file" id="image" name="image">
    <?php if($errors->has('image')): ?>
        <span class="error"><?php echo e($errors->first('image')); ?></span>
    <?php endif; ?>

    <input type="submit">
</form>

</body>
</html>
<?php /**PATH D:\tasks\task\elkashir\resources\views/subCategory/create.blade.php ENDPATH**/ ?>