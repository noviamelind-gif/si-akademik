<?php

require_once __DIR__ . '/../app/models/Mahasiswa.php';

$mahasiswa = [

    new Mahasiswa(
        "25219789",
        "Novia",
        "Teknik Informatika",
        "novia@gmail.com"
    ),

    new Mahasiswa(
        "25219790",
        "rara",
        "Sistem Informasi",
        "rara80@gmail.com"
    ),

    new Mahasiswa(
        "25219791",
        "Reva",
        "Teknik Informatika",
        "reva33@gmail.com"
    )

];

require_once __DIR__ . '/../app/views/mahasiswa/daftar.php';