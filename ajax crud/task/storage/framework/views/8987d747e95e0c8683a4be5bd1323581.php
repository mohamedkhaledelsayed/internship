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

    <label for="category_name">Category Name</label>
    <input type="text" id="category_name" name="name" value="<?php echo e(old('name', $category->name)); ?>">
    <?php if($errors->has('name')): ?>
        <span class="error"><?php echo e($errors->first('name')); ?></span>
    <?php endif; ?>
    <label for="image">Product Image</label>
    <input type="file" id="image" name="image">
    <?php if($errors->has('image')): ?>
       <span class="error"><?php echo e($errors->first('image')); ?></span>
    <?php endif; ?>

    <?php if(!$errors->has('image') && $category->image): ?> <!-- Check if there are no errors and there's an existing image -->
       <p>Current Image:</p>
       <img src="<?php echo e(asset('' . $category->image)); ?>" alt="Current Image">
    <?php endif; ?>


    <input type="submit">
</form>


</body>
</html>
<?php /**PATH D:\tasks\task\elkashir\resources\views/update.blade.php ENDPATH**/ ?>