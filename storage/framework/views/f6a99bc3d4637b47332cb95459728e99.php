<?php $__env->startSection('content'); ?>
    <?php if(auth()->guard()->guest()): ?>
    <?php else: ?>
        <div id="app"></div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ingvar\PhpstormProjects\danilLara\resources\views/home.blade.php ENDPATH**/ ?>