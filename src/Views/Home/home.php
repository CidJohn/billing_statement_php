<?php $title = "Home"; ?>
<?php ob_start(); ?>

<div class="flex  w-full h-[70vh] p-4 gap-4">


    <div class="flex flex-col w-[50vw]  ">
        <p class="text-2xl p-2 font-bold">
            Billing List
        </p>
        <?php include __DIR__ . "/../templates/Table/table.php" ?>
    </div>
    <div class="flex flex-col w-full h-full" id='menu-content'>
        <?php include __DIR__ . "/../templates/Tabs/Tabs.php" ?>
        <?php include __DIR__ . "/Profile/Profile.php" ?>
        <?php include __DIR__ . "/StatementEntry/StatementEntry.php" ?>
        <?php include __DIR__ . "/Monitoring/Monitoring.php" ?>
        <?php include __DIR__ . "/MenuInfo/MenuInfo.php" ?>

    </div>
</div>




<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout.php'; ?>