<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
        }
        .error {
            color: red;
            font-size: 14px;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="<?php echo e(route('products.update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <label for="product_name_ar">Product Name (Arabic)</label>
        <input type="text" id="product_name_ar" name="name_ar" value="<?php echo e(old('name_ar', $product->name_ar)); ?>">
        <?php if($errors->has('name_ar')): ?>
            <span class="error"><?php echo e($errors->first('name_ar')); ?></span>
        <?php endif; ?>

        <label for="product_name_en">Product Name (English)</label>
        <input type="text" id="product_name_en" name="name_en" value="<?php echo e(old('name_en', $product->name_en)); ?>">
        <?php if($errors->has('name_en')): ?>
            <span class="error"><?php echo e($errors->first('name_en')); ?></span>
        <?php endif; ?>

        <label for="category_id">Category</label>
        <select id="category_id" name="category_id">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>" <?php echo e($category->id == $product->category_id ? 'selected' : ''); ?>>
                    <?php echo e($category->name_en); ?>-<?php echo e($category->name_ar); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('category_id')): ?>
            <span class="error"><?php echo e($errors->first('category_id')); ?></span>
        <?php endif; ?>

        <label for="description_ar">Product Description (Arabic)</label>
        <textarea id="description_ar" name="description_ar"><?php echo e(old('description_ar', $product->description_ar)); ?></textarea>
        <?php if($errors->has('description_ar')): ?>
            <span class="error"><?php echo e($errors->first('description_ar')); ?></span>
        <?php endif; ?>

        <label for="description_en">Product Description (English)</label>
        <textarea id="description_en" name="description_en"><?php echo e(old('description_en', $product->description_en)); ?></textarea>
        <?php if($errors->has('description_en')): ?>
            <span class="error"><?php echo e($errors->first('description_en')); ?></span>
        <?php endif; ?>

        <label for="image">Product Image</label>
        <input type="file" id="image" name="image">
        <?php if($errors->has('image')): ?>
           <span class="error"><?php echo e($errors->first('image')); ?></span>
        <?php endif; ?>

        <?php if(!$errors->has('image') && $product->image): ?> <!-- Check if there are no errors and there's an existing image -->
           <p>Current Image:</p>
           <img src="<?php echo e(asset($product->image)); ?>" alt="Current Image" style="max-width: 100%;">
        <?php endif; ?>

        <label for="price">Product Price</label>
        <input type="text" id="price" name="price" value="<?php echo e(old('price', $product->price)); ?>">
        <?php if($errors->has('price')): ?>
            <span class="error"><?php echo e($errors->first('price')); ?></span>
        <?php endif; ?>

        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
<?php /**PATH D:\gamifiercomsa\first task\task\resources\views/product/update.blade.php ENDPATH**/ ?>