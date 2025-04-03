<?php 
require_once 'config/session.php';
include 'views/includes/header.php';



    // Jika user belum login, redirect ke halaman login
    if (!isset($_SESSION['user_id'])) {
        header('Location: views/auth/login.php');
        exit();
    }
?>


<div class="flex justify-between">
<a href="index.php?action=create" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
    Tambah Karyawan
</a>
<a href="index.php?action=logout"  class="bg-red-500 text-white px-4 py-2 mb-4 rounded inline-block">Logout</a>
</div>

<table class="min-w-full bg-white">
    <thead class="bg-gray-800 text-white">
        <tr>
            <th class="w-1/3 px-4 py-2">Nama</th>
            <th class="w-1/3 px-4 py-2">Alamat</th>
            <th class="w-1/3 px-4 py-2">Gaji</th>
            <th class="px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody class="text-gray-700">
        <?php foreach($karyawans as $karyawan): ?>
            <tr>
                <td class="border px-4 py-2">
                    <?= $karyawan['nama'] ?>
                </td>
                <td class="border px-4 py-2">
                    <?= $karyawan['alamat'] ?>
                </td>
                <td class="border px-4 py-2">
                    <?= $karyawan['gaji'] ?>
                </td>
                <td class="border px-4 py-2 flex gap-4">
                    <a class="bg-yellow-500 hover:bg-yellow-800 text-white py-1 px-2 rounded" href="index.php?action=edit&id=<?= $karyawan['id'] ?>">Edit</a>
                    <a class="bg-red-500 hover:bg-red-800 text-white py-1 px-2 rounded" href="index.php?action=delete&id=<?= $karyawan['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<!-- <a href="auth-mvc-manajemen-karyawan/views/auth/logout.php" class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
    Logout
</a> -->


<?php include 'views/includes/footer.php' ?> 