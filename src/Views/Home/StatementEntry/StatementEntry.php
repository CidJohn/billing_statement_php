<div class="menu-tabs flex flex-col w-[50vw]  items-center p-2 " id="statement-entry">
    <p class="text-2xl text-red-500">Statement Entry</p>
    <form class="flex flex-wrap gap-5 mx-auto mt-4">
        <?php foreach ($formState as $item): ?>
            <div class="mb-5">
                <label for="<?php echo $item['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 "><?php echo $item['name'] ?></label>
                <input type="<?php echo $item['type'] ?>" id="<?php echo $item['id'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="name@flowbite.com" required />
            </div>
        <?php endforeach; ?>
        <div class="flex w-100 justify-center items-center">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</button>
        </div>
    </form>
</div>