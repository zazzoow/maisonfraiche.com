

<?php $__env->startSection('aimeos_header'); ?>
    <?= $aiheader['locale/select'] ?? '' ?>
    <?= $aiheader['basket/mini'] ?? '' ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/tree'] ?? '' ?>
    <?= $aiheader['catalog/price'] ?? '' ?>
    <?= $aiheader['catalog/supplier'] ?? '' ?>
    <?= $aiheader['catalog/attribute'] ?? '' ?>
    <?= $aiheader['catalog/stage'] ?? '' ?>
    <?= $aiheader['catalog/lists'] ?? '' ?>
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
    <?= $aibody['catalog/stage'] ?? '' ?>
    <div class="container-fluid">
        <div class="row">
            <aside class="col-lg-3">
                <div class="catalog-filter-group">
                    <?= $aibody['catalog/price'] ?? '' ?>
                    <?= $aibody['catalog/supplier'] ?? '' ?>
                    <?= $aibody['catalog/attribute'] ?? '' ?>
                </div>
                <?= $aibody['catalog/session'] ?? '' ?>
            </aside>
            <div class="col-lg-9">
                <?= $aibody['catalog/lists'] ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop::base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\boukl\github\maisonfraiche.com\htdocs\resources\views/vendor/shop/catalog/list.blade.php ENDPATH**/ ?>