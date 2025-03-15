<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 hover:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <?php foreach ($tblCol as $item): ?>
                    <th scope="col" class="px-6 py-3">
                        <?php echo $item ?>
                    </th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b  border-gray-200 hover:bg-gray-300 hover:text-white">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>

                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600  hover:underline">View</a>
                </td>
            </tr>

        </tbody>
    </table>
</div>