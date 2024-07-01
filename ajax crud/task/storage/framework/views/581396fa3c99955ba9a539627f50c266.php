<form action="<?php echo e(route('categories.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <label for="category_name">Category English Name</label>
    <input type="text" id="category_name" name="name_en" >
    <?php if($errors->has('name_en')): ?>
        <span class="error"><?php echo e($errors->first('name_en')); ?></span>
    <?php endif; ?>
    <label for="category_name">Category Arabic Name</label>
    <input type="text" id="category_name" name="name_ar" >
    <?php if($errors->has('name_ar')): ?>
        <span class="error"><?php echo e($errors->first('name_ar')); ?></span>
    <?php endif; ?>

    <input type="submit" >
</form>

</body>
</html>
<?php /**PATH D:\gamifiercomsa\first task\task\resources\views/create.blade.php ENDPATH**/ ?>