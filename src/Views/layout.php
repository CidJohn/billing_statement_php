<?php

use App\Controllers\LayoutController;

$navController = new LayoutController();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title, ' - Billing Statement' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/public/style/style.css">
</head>

<body class="bg-gray-100">
    <?= $navController->navbar(); ?>

    <div class="p-4 min-h-[80vh] max-h-[80vh] overflow-y-scroll ">
        <?= $content ?>
    </div>
    <div class="" id="root"></div>

    <?php include __DIR__ . "/templates/Footer/Footer.php" ?>
    <script src="/public/js/script.js" type="module" defer></script>

</body>

</html>