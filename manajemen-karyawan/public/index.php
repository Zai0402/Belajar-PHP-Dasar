<?php 
include '../includes/header.php' ;
require_once '../config/database.php'; 


$sql = "SELECT *FROM karyawan";
$stmt = $pdo->query($sql);
$karyawans = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>






<a href="create.php" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
    Tambah Karyawan
</a>
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
                    <a class="bg-yellow-500 hover:bg-yellow-800 text-white py-1 px-2 rounded" href="update.php?id=<?= $karyawan['id'] ?>">Edit</a>
                    <a class="bg-red-500 hover:bg-red-800 text-white py-1 px-2 rounded" href="delete.php?id=<?= $karyawan['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>

<?php include '../includes/footer.php' ?> 