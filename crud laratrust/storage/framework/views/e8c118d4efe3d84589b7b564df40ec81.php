<form action="<?php echo e(route('categories.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <label for="category_name">Category Name</label>
    <input type="text" id="category_name" name="name">
    <?php if($errors->has('name')): ?>
        <span class="error"><?php echo e($errors->first('name')); ?></span>
    <?php endif; ?>
    <label for="image">Category Image</label>
    <input type="file" id="image" name="image">
    <?php if($errors->has('image')): ?>
        <span class="error"><?php echo e($errors->first('image')); ?></span>
    <?php endif; ?>

    <input type="submit" >
</form>

</body>
</html>
<?php /**PATH D:\tasks\task\elkashir\resources\views/create.blade.php ENDPATH**/ ?>