<?php $title = "Home"; ?>
<?php ob_start(); ?>

<div class="flex  border w-full h-[70vh] p-4 gap-4">


    <div class="flex flex-col w-[50vw]  ">
        <p class="text-2xl p-2 font-bold">
            Billing List
        </p>
        <?php include __DIR__ . "/../templates/Table/table.php" ?>
    </div>
    <div class="flex flex-col w-full h-full">
        <?php include __DIR__ . "/../templates/Tabs/Tabs.php" ?>
        <div class="flex w-[50vw] items-center ">
            <div class="border rounded-full w-[200px] h-[200px] overflow-hidden">
                <img src="https://static.vecteezy.com/system/resources/previews/020/911/736/non_2x/profile-icon-user-icon-person-icon-free-png.png" class="w-full h-full object-cover" />
            </div>

            <div class=" p-2 text-lg">
                <?php foreach ($users as $item): ?>
                    <p><?= htmlspecialchars($item['Name']); ?></p>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>




<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout.php'; ?>