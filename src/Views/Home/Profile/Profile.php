<div class="menu-tabs flex p-2 " id="profile">

    <div class="flex  items-center gap-10">
        <div class="border rounded-full w-[200px] h-[200px] overflow-hidden">
            <img src="https://static.vecteezy.com/system/resources/previews/020/911/736/non_2x/profile-icon-user-icon-person-icon-free-png.png" class="w-full h-full object-cover" />
        </div>

        <div class=" p-2 text-lg ">
            <?php foreach ($users as $item): ?>
                <p class="text-2xl font-bold"><?= htmlspecialchars($item['Name']); ?></p>
                <p class="text-sm italic">Email: <?= htmlspecialchars($item['email']); ?></p>
                <p class="text-sm italic">Plate number: <?= htmlspecialchars($item['Plate No']); ?></p>
            <?php endforeach ?>
        </div>
    </div>

</div>