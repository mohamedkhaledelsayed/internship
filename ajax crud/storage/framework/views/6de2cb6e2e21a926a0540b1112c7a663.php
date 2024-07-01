<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
    <style>
        form {
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        select,
        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .error {
            color: red;
            font-size: 12px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Create Product</h2>
    <form action="<?php echo e(route('products.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <label for="name_ar">Product Name (Arabic)</label>
        <input type="text" id="name_ar" name="name_ar">
        <?php if($errors->has('name_ar')): ?>
            <span class="error"><?php echo e($errors->first('name_ar')); ?></span>
        <?php endif; ?>

        <label for="name_en">Product Name (English)</label>
        <input type="text" id="name_en" name="name_en">
        <?php if($errors->has('name_en')): ?>
            <span class="error"><?php echo e($errors->first('name_en')); ?></span>
        <?php endif; ?>

        <label for="description_ar">Product Description (Arabic)</label>
        <textarea id="description_ar" name="description_ar"></textarea>
        <?php if($errors->has('description_ar')): ?>
            <span class="error"><?php echo e($errors->first('description_ar')); ?></span>
        <?php endif; ?>

        <label for="description_en">Product Description (English)</label>
        <textarea id="description_en" name="description_en"></textarea>
        <?php if($errors->has('description_en')): ?>
            <span class="error"><?php echo e($errors->first('description_en')); ?></span>
        <?php endif; ?>

        <label for="image">Product Image</label>
        <input type="file" id="image" name="image">
        <?php if($errors->has('image')): ?>
            <span class="error"><?php echo e($errors->first('image')); ?></span>
        <?php endif; ?>

        <label for="price">Product Price</label>
        <input type="text" id="price" name="price">
        <?php if($errors->has('price')): ?>
            <span class="error"><?php echo e($errors->first('price')); ?></span>
        <?php endif; ?>

        <label for="category_id">Category</label>
        <select id="category_id" name="category_id">
            <option value="">Select Category</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name_en); ?>-<?php echo e($category->name_ar); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('category_id')): ?>
            <span class="error"><?php echo e($errors->first('category_id')); ?></span>
        <?php endif; ?>

        <input type="submit" value="Create Product">
    </form>
</body>
</html>
<?php /**PATH D:\gamifiercomsa\first task\ajax crud\resources\views/product/create.blade.php ENDPATH**/ ?>