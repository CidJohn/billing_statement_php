<?php $title = "Create Account"; ?>
<?php ob_start(); ?>

<div class="flex w-full md:h-[74vh] justify-center items-center gap-10 p-10">

    <form class="w-1/2" id="frmCreateAccount">
        <div class="flex gap-2 flex-col md:flex-row w-full">
            <div class="mb-3  w-full">
                <label for="fname" class="block mb-1 text-sm font-medium text-gray-900 ">Firstname:</label>
                <input type="text" id="fname" name="fname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="First name" title="Firstname" />
            </div>
            <div class="mb-3  w-full">
                <label for="mname" class="block mb-1 text-sm font-medium text-gray-900 ">Middle Initial:</label>
                <input type="text" id="mname" name="mname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="(Optional)" />
            </div>

        </div>

        <div class="flex gap-2 flex-col md:flex-row w-full ">
            <div class="mb-3 w-full">
                <label for="lname" class="block mb-1 text-sm font-medium text-gray-900 ">Lastname:</label>
                <input type="text" id="lname" name="lname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Last name" title="Lastname" />
            </div>
            <div class="mb-3 w-full">
                <label for="plateno" class="block mb-1 text-sm font-medium text-gray-900 ">Plate No.:</label>
                <input type="text" id="plateno" name="plateno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="ABC123" title="Plate Number" />
            </div>
        </div>

        <div class="flex w-full">
            <div class="mb-3 w-full">
                <label for=" email" class="block mb-1 text-sm font-medium text-gray-900 ">Email:</label>
                <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="name@sample.com" title="Email" />
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-2 w-full">
            <div class="mb-3  w-full">
                <label for="password" class="block mb-1 text-sm font-medium text-gray-900 ">Password:</label>
                <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="*********" title="Password" />
            </div>
            <div class="mb-3  w-full">
                <label for="cpass" class="block mb-1 text-sm font-medium text-gray-900 ">Confirm cpass:</label>
                <input type="password" id="cpass" name="cpass" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="*********" title="Confirm Password" />
            </div>
        </div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Create Account</button>
        <p class="text-sm font-light text-gray-500 mt-3">
            Already have an account? <a href="/view/login" class="font-medium text-primary-600 hover:underline hover:text-blue-700 ">Sign in</a>
        </p>
    </form>
    <div class="hidden md:flex flex-col w-full items-center justify-center h-[50vh] coz-border">
        <div class="flex flex-wrap w-50 w-[40vw] ">
            <h1 class="text-6xl font-mono font-bold ">
                Create your account
            </h1>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../layout.php'; ?>

<?php if (isset($_SESSION['error'])): ?>
    <script>
        alert("<?= $_SESSION['error']; ?>");
    </script>
    <?php unset($_SESSION['error']) ?>
<?php endif; ?>