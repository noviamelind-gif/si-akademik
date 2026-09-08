<?php

class HomeController
{
    public function dashboard()
    {  
        echo "<h1>Dashboard</h1>";

        // Cek flash message
        if (isset($_SESSION['flash_message'])) {

            echo "<div style='
                padding: 15px;
                background-color: #d1e7dd;
                color: #0f5132;
                border: 1px solid #badbcc;
                margin: 20px 0;
            '>";

            echo $_SESSION['flash_message'];

            echo "</div>";

            // Hapus flash message setelah ditampilkan
            unset($_SESSION['flash_message']);
        }

        echo "<p>Selamat datang di dashboard SI Akademik.</p>";

        echo "<a href='/si-akademik/public/mahasiswa'>Data Mahasiswa</a>";
        echo "<br>";
        echo "<a href='/si-akademik/public/logout'>Logout</a>";
    }
}