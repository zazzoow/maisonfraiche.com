<?php $__env->startSection('aimeos_header'); ?>
    <?= $aiheader['locale/select'] ?? '' ?>
    <?= $aiheader['basket/mini'] ?? '' ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/tree'] ?? '' ?>
    <?= $aiheader['catalog/home'] ?? '' ?>
    <?= $aiheader['cms/page'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_head'); ?>
    <?= $aibody['locale/select'] ?? '' ?>
    <?= $aibody['basket/mini'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_nav'); ?>
    <?= $aibody['catalog/tree'] ?? '' ?>
    <?= $aibody['catalog/search'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_body'); ?>
    <?= $aibody['catalog/home'] ?? '' ?>
    <?= $aibody['cms/page'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\boukl\github\maisonfraiche.com\htdocs\resources\views/vendor/shop/catalog/home.blade.php ENDPATH**/ ?>