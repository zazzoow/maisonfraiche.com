

<?php $__env->startSection('aimeos_scripts'); ?>
    <script src="<?php echo e(asset('vendor/shop/themes/default/aimeos-detail.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_header'); ?>
    <?= $aiheader['locale/select'] ?? '' ?>
    <?= $aiheader['basket/mini'] ?? '' ?>
    <?= $aiheader['catalog/tree'] ?? '' ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/stage'] ?? '' ?>
    <?= $aiheader['catalog/detail'] ?? '' ?>
    <?= $aiheader['catalog/session'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_head'); ?>
    <?= $aibody['locale/select'] ?? '' ?>
    <?= $aibody['basket/mini'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_nav'); ?>
    <?= $aibody['catalog/tree'] ?? '' ?>
    <?= $aibody['catalog/search'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_stage'); ?>
    <?= $aibody['catalog/stage'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_body'); ?>
    <div class="container-xl">
        <?= $aibody['catalog/detail'] ?? '' ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_aside'); ?>
    <?= $aibody['catalog/session'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\boukl\github\maisonfraiche.com\htdocs\resources\views/vendor/shop/catalog/detail.blade.php ENDPATH**/ ?>