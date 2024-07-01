<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/home.css')); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title><?php echo e(__('Home')); ?></title>
</head>
<body>

<header class="mb-3">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <a class="navbar-brand" href="#"><?php echo e(__('Home')); ?></a>
        <div class="mr-auto"></div>
        <form class="form-inline" action="<?php echo e(route('categories.create')); ?>">
            <button class="btn btn-primary mr-2"><?php echo e(__('Create Category')); ?></button>
        </form>
        <form class="form-inline" action="<?php echo e(route('products.create')); ?>">
            <button class="btn btn-primary"><?php echo e(__('Create Product')); ?></button>
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item">
                        <a class="nav-link" rel="alternate" hreflang="<?php echo e($localeCode); ?>" href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>">
                            <?php echo e($properties['native']); ?>

                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </nav>
</header>

<main class="container">
    <section class="categories">
        <h2 class="text-center my-5 mb-3"><?php echo e(__('Categories')); ?></h2> <!-- Added mb-3 class for bottom margin -->
        <div class="row">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body text-center">
                            <a href="<?php echo e(route('products.index', ['category' => $category->id])); ?>" class="category">
                                <h5 class="card-title text-primary"><?php echo e($category->translate(app()->getLocale())->name); ?></h5>
                            </a>
                            <form action="<?php echo e(route('categories.edit', $category->id)); ?>" method="get" class="mt-2">
                                <button class="btn btn-primary btn-block"><?php echo e(__('Update')); ?></button>
                            </form>
                            <form action="<?php echo e(route('categories.destroy', $category->id)); ?>" method="post" class="mt-2">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-danger btn-block"><?php echo e(__('Delete')); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php /**PATH D:\gamifiercomsa\first task\ajax crud\resources\views/categories.blade.php ENDPATH**/ ?>