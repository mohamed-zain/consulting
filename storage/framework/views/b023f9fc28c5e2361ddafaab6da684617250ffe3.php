
    <option>---إختر اسم المستند----</option>
    <?php $__currentLoopData = $Data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($dct->id); ?>"><?php echo e($dct->DocTypeName); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php /**PATH /Applications/MAMP/htdocs/consulting/resources/views/documents/gitmissions.blade.php ENDPATH**/ ?>