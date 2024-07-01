<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/home.css')); ?>">
    <title>Home</title>
    <?php echo $__env->make('store', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>


    <main>
        <section class="categories">
            <h2>Categories</h2>
            <div class="category-list">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('categories.show', ['category' => $category->name])); ?>" class="category">
                        <div class="category-image">
                        <img src="<?php echo e($category->image); ?>" alt="<?php echo e($category->category_name); ?>">
                        </div>
                        <div class="category-name"><?php echo e($category->name); ?></div>
                <form action="<?php echo e(route('categories.edit',$category->id)); ?>">
                  <button>Update</button>
                </form>
                <form action="<?php echo e(route('categories.destroy',$category->id)); ?>" method="post">
                  <?php echo method_field('DELETE'); ?>
                  <?php echo csrf_field(); ?>
                 <button>Delete</button>
                </form>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Your E-Commerce Store. All rights reserved.</p>
    </footer>
</body>
</html>
<?php /**PATH D:\tasks\task\elkashir\resources\views/categories.blade.php ENDPATH**/ ?>