<ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-400 " id="tabs">
    <?php foreach ($tabsItem as $item): ?>
        <li class="me-2">
            <a href="#<?php echo $item['to']; ?>" aria-current="page" id="<?php echo $item['to']; ?>" class="inline-block p-4  bg-gray-100 rounded-t-lg hover:bg-gray-300"><?php echo $item['name']; ?></a>
        </li>
    <?php endforeach; ?>
</ul>