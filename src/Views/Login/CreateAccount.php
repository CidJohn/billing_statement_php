<?php $title = "Create Account"; ?>
<?php ob_start(); ?>

<form class="max-w-sm mx-auto" action="/create-account" method="POST">
    <div class="mb-5">
        <label for="fname" class="block mb-1 text-sm font-medium text-gray-900 ">Firstname:</label>
        <input type="fname" id="fname" name="fname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="First name" required />
    </div>
    <div class="mb-5">
        <label for="mname" class="block mb-1 text-sm font-medium text-gray-900 ">Middle Initial:</label>
        <input type="mname" id="mname" name="mname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Middle Initial (Optional)" />
    </div>
    <div class="mb-5">
        <label for="lname" class="block mb-1 text-sm font-medium text-gray-900 ">Lastname:</label>
        <input type="lname" id="lname" name="lname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Last name" required />
    </div>
    <div class="mb-5">
        <label for="lname" class="block mb-1 text-sm font-medium text-gray-900 ">Plate No.:</label>
        <input type="lname" id="lname" name="lname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="ABC123" required />
    </div>
    <div class="mb-5">
        <label for="email" class="block mb-1 text-sm font-medium text-gray-900 ">Email:</label>
        <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="name@flowbite.com" required />
    </div>
    <div class="mb-5">
        <label for="password" class="block mb-1 text-sm font-medium text-gray-900 ">Password:</label>
        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="*********" required />
    </div>
    <div class="mb-5">
        <label for="password" class="block mb-1 text-sm font-medium text-gray-900 ">Confirm Password:</label>
        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="*********" required />
    </div>

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Create Account</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout.php'; ?>