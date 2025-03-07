<?php $title = "Home"; ?>
<?php ob_start(); ?>


<div class="text-red-400 text-4xl">
    Billing List
</div>

<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout.php'; ?>