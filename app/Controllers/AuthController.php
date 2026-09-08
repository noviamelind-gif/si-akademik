<?php

class AuthController
{
    public function loginForm()
    {
        require __DIR__ . '/../Views/auth/login.php';
    }
    public function login()
    {
        session_start();
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // Login menggunakan hardcode
        if ($username === 'admin' && $password === '12345') {
            $_SESSION['user_id'] = 1;
            $_SESSION['user_name'] = 'Admin';
            $_SESSION['logged_in'] = true;
            // flash message
            $_SESSION['flash_message'] = 'Selamat datang, Admin';
            header('Location: /si-akademik/public/dashboard');
            exit;
        } else {
            echo "<h3>Username atau password salah!</h3>";
            echo "<a href='/si-akademik/public/login'>Kembali ke Login</a>";
        }
    }
    public function logout()
    {
        session_start();
        // hapus data login
        session_unset();
        session_destroy();
        // ulai session baru untuk menyimpan flash message
        session_start();
        $_SESSION['flash_message'] = 'Anda telah logout';
        header('Location: /si-akademik/public/login');
        exit;
    }
}