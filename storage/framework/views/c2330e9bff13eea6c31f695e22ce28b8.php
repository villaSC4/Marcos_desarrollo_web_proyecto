<div
    <?php echo e($attributes
            ->merge([
                'id' => $getId(),
            ], escape: false)
            ->merge($getExtraAttributes(), escape: false)); ?>

>
    <?php echo e($getChildComponentContainer()); ?>

</div>
<?php /**PATH C:\Users\Usuario\Desktop\Marcos_Raquel\Marcos_desarrollo_web_proyecto\vendor\filament\forms\resources\views/components/group.blade.php ENDPATH**/ ?>