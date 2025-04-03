<?php
require_once 'config/database.php';
require_once 'models/User.php';

class AuthController{
 // menyimpan data karyawan baru
private $user;

    public function __construct($pdo) {
        $this->user = new User($pdo);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = $_POST['password'];
            
            
            // Cek apakah username sudah ada
            if ($this->user->exists($username)) {
                $_SESSION['errorr'] = "Username sudah digunakan, pilih yang lain.";
                header('Location: views/auth/register.php');
                exit();
            }
            
               // Simpan user baru
               if ($this->user->create($username, $password)) {
                $_SESSION['success'] = "Pendaftaran berhasil! Silakan login.";
                header('Location: views/auth/login.php');
                exit();
            } else {
                $_SESSION['errorr'] = "Terjadi kesalahan, coba lagi.";
                header('Location: views/auth/register.php');
                exit();
            }
        }
    }

    // public function login(){
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $username = trim($_POST['username']);
    //         $password = $_POST['password'];       

    //           // Ambil data user dari database
    //         $user = $this->user->verify($username);

    //        //VERIFY PASSWORD FORM DENGAN PASSWORD DATABASE
    //        if($user && password_verify($password, $user['password'])) {
    //         $_SESSION['user_id'] = $user['id'];
    //         $_SESSION['username'] = $username; // Simpan username juga jika perlu
    //         header('Location: ../index.php'); // Redirect ke dashboard atau halaman utama
    //         exit();
    //     } else {
    //         $error = "Invalid username or password";
    //         header('Location: views/auth/login.php'); // Redirect kembali ke login
    //         exit();
    //     }


    //     }
    // }

    public function login(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = $_POST['password'];       
    
            // Ambil data user dari database
            $user = $this->user->verify($username);
    
            // VERIFY PASSWORD FORM DENGAN PASSWORD DATABASE
            if ($user && password_verify($password, $user['password'])) {
                // session_start(); // Pastikan session dimulai
    
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $username; // Simpan username juga jika perlu
    
                // Cek apakah session berhasil disimpan
                // var_dump($_SESSION);
                // exit(); // Hentikan eksekusi agar bisa melihat hasil var_dump()
    
                header('Location: index.php'); // Redirect ke dashboard atau halaman utama
                exit();
            } else {
                $_SESSION['error'] = "Invalid username or password";
                header('Location: views/auth/login.php'); // Redirect kembali ke login
                exit();
            }
        }
    }


    public function logout(){
            session_start();
            session_unset(); // Hapus semua session
            session_destroy(); // Hancurkan session

            header("Location: views/auth/login.php"); // Redirect ke halaman login
            exit();
        
    }
    
}
  


?>