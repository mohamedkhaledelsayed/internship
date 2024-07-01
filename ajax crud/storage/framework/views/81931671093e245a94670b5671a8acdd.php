<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/subCategories.css')); ?>">
    <title>Product List</title>
</head>
<body>

<div class="card-container">
    <div class="products-container">
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="card">
                <div class="category-image">
                    <img src="<?php echo e(asset('/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>">
                </div>
                <h1><?php echo e($product->name_en); ?> - <?php echo e($product->name_ar); ?></h1>
                <p><?php echo e($product->description_en); ?></p>
                <p><?php echo e($product->description_ar); ?></p>
                <p>Price: <?php echo e($product->price); ?></p>
                <p>Category: <?php echo e($product->category->name_en); ?> - <?php echo e($product->category->name_ar); ?></p>
                <form action="<?php echo e(route('products.edit', $product->id)); ?>" method="GET">
                    <button type="submit">Update</button>
                </form>
                <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <button type="submit">Delete</button>
                </form>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>No products found.</p>
        <?php endif; ?>
    </div>
<?php /**PATH D:\gamifiercomsa\first task\task\resources\views/product/products.blade.php ENDPATH**/ ?>