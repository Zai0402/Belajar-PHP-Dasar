<?php 
require_once 'config/session.php';
include 'views/includes/header.php';



    // Jika user belum login, redirect ke halaman login
    if (!isset($_SESSION['user_id'])) {
        header('Location: auth/login.php');
        exit();
    }
?>



<h1 class="text-2xl mb-4">Edit Karyawan</h1>
<form action="index.php?action=update&id=<?php echo $id?>" method="POST">
    <div class="mb-4">
        <label for="name" class="block text-gray-700">Nama : </label>
        <input value="<?= $karyawan['nama'] ?>" type="text" name="name" id="name" class="border rounded w-full py-2 px-3 text-gray-700">
    </div>
    <div class="mb-4">
        <label for="address" class="block text-gray-700">Alamat : </label>
        <input value="<?= $karyawan['alamat'] ?>" type="text" name="address" id="address" class="border rounded w-full py-2 px-3 text-gray-700">
    </div>
    <div class="mb-4">
        <label for="salary" class="block text-gray-700">Gaji</label>
        <input value="<?= $karyawan['gaji'] ?>" type="text" name="salary" id="salary" class="border rounded w-full py-2 px-3 text-gray-700">
    </div>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Update
    </button>
</form>

<?php include 'views/includes/footer.php' ?>