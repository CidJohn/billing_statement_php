<?php $title = "Home"; ?>
<?php ob_start(); ?>

<h1>Hello World</h1>

<ul>
    <?php foreach ($journals as $item) : ?>
        <li><?= $item->name ?> (<?= $item->publishedYear ?>)</li>
    <?php endforeach ?>
</ul>

<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout.php'; ?>