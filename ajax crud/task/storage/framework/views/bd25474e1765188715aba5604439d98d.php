<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/subCategories.css')); ?>">
    <title>Document</title>
</head>
<body>

<div class="card-container">
<?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<a href="<?php echo e(route('subcategories.show',  ['category' => $subCategory->name])); ?>" class="card-link">
<div class="card">
    <div class="category-image">
        <img src="<?php echo e(asset('/' . $subCategory->image)); ?>" alt="<?php echo e($subCategory->name); ?>">
    </div>
  <h1><?php echo e($subCategory->name); ?></h1>
  <form action="<?php echo e(route('subcategories.edit',$subCategory->id)); ?>">
     <button>Update</button>
  </form>
  <form action="<?php echo e(route('subcategories.destroy',$subCategory->id)); ?>" method="post">
    <?php echo method_field('DELETE'); ?>
    <?php echo csrf_field(); ?>
    <button>Delete</button>
</form>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</body>
</html>
<?php /**PATH D:\tasks\task\elkashir\resources\views/subcategory/subCategories.blade.php ENDPATH**/ ?>