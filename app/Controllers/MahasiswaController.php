<?php

class MahasiswaController
{
    public function index()
    {
        echo "<h1>Halaman Daftar Mahasiswa</h1>";
    }

    public function create()
    {
        echo "<h1>Halaman Tambah Mahasiswa</h1>";
    }

    public function show($id)
    {
        echo "<h1>Detail Mahasiswa</h1>";
        echo "<p>ID Mahasiswa: " . $id . "</p>";
    }
}
