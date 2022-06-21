<?php $__env->startSection('aimeos_header'); ?>
    <title><?php echo e(__( 'Profile')); ?></title>
    <?= $aiheader['locale/select'] ?? '' ?>
    <?= $aiheader['basket/mini'] ?? '' ?>
    <?= $aiheader['account/profile'] ?? '' ?>
    <?= $aiheader['account/review'] ?? '' ?>
    <?= $aiheader['account/subscription'] ?? '' ?>
    <?= $aiheader['account/history'] ?? '' ?>
    <!-- <= $aiheader['account/favorite'] ?? '' ?> -->
    <?= $aiheader['account/watch'] ?? '' ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/session'] ?? '' ?>
    <?= $aiheader['catalog/tree'] ?? '' ?>
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

<?php $__env->startSection('aimeos_body'); ?>
  <?= $aibody['catalog/stage'] ?? '' ?>
    <div class="container-fluid">
        <?= $aibody['account/profile'] ?? '' ?>
        <?= $aibody['account/review'] ?? '' ?>
        <?= $aibody['account/subscription'] ?? '' ?>
        <?= $aibody['account/history'] ?? '' ?>
        <!-- <= $aibody['account/favorite'] ?? '' ?> -->
        <?= $aibody['account/watch'] ?? '' ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('aimeos_aside'); ?>
    <?= $aibody['catalog/session'] ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/zazzoow/sites/maisonfraiche.com/htdocs/packages/maison-fraiche-shop/views/account/index.blade.php ENDPATH**/ ?>