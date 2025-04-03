<?php
    $host = "localhost";
    $dbname = "db_tutorialpdo";
    $username = "root";
    $password = "";

    try{
        // membuat koneksi ke database PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Koneksi database gagal :" . $e->getMessage());
    }


?>