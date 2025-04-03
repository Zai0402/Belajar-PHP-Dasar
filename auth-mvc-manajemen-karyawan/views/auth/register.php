
<?php 
require_once '../../config/session.php';
include '../includes/header.php' ;


// Jika user sudah login, redirect ke halaman utama
// if (isset($_SESSION['user_id'])) {
//     header('Location: ../../index.php');
//     exit();
// }
?>
    <div class="w-full max-w-md bg-white rounde-lg shadow-md p-8 justify-center">
        <h2 class="text-2xl font-bold text-center mb-6">
           Register New User
        </h2>
        <?php 
    if (isset($_SESSION['errorr'])): ?>
        <p class="text-red-500 text-center mb-6">
            <?= $_SESSION['errorr'];?>
        </p>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <p class="text-green-500 text-center mb-6">
            <?= $_SESSION['success'];?>
        </p>
    <?php endif; ?>
        <form action="../../index.php?action=register" method="POST" class="space-y-4">
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">
                    Username
                </label>
                <input type="text" name="username" id="username" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">
                    Password
                </label>
                <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-800 text-white rounded-lg py-2 transition">Register</button>
        </form>
        <p class="mt-4 text-center text-sm">Already have an account <a href="login.php" class="text-blue-500 hover:underline">Login here</a> </p>
    </div>

<?php include '../includes/footer.php' ?>