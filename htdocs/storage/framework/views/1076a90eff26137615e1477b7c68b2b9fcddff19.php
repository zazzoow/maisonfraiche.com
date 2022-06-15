<?php $__env->startSection('aimeos_header'); ?>
    <?= $aiheader['locale/select'] ?? '' ?>
    <?= $aiheader['basket/mini'] ?? '' ?>
    <?= $aiheader['catalog/tree'] ?? '' ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/stage'] ?? '' ?>
    <?= $aiheader['catalog/detail'] ?? '' ?>
    <?= $aiheader['catalog/session'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_head_basket'); ?>
    <?= $aibody['basket/mini'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_head_nav'); ?>
    <?= $aibody['catalog/tree'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_head_locale'); ?>
    <?= $aibody['locale/select'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_head_search'); ?>
    <?= $aibody['catalog/search'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_stage'); ?>
    <?= $aibody['catalog/stage'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_body'); ?>
    <?= $aibody['catalog/detail'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_aside'); ?>
    <?= $aibody['catalog/session'] ?? '' ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/zazzoow/sites/maisonfraiche.com/htdocs/packages/maison-fraiche-shop/views/catalog/detail.blade.php ENDPATH**/ ?>