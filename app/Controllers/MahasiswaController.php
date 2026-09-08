<?php

require_once __DIR__ . '/../Models/MahasiswaModel.php';

class MahasiswaController
{
    public function index()
    {
        $model = new MahasiswaModel();

        $mahasiswa = $model->all();

        require_once __DIR__ . '/../Views/mahasiswa/daftar.php';
    }
}