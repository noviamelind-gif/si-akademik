<?php

class Mahasiswa
{
    private $nim;
    private $nama;
    private $jurusan;
    private $email;

    public function __construct($nim, $nama, $jurusan, $email)
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->jurusan = $jurusan;
        $this->email = $email;
    }

    public function getNim()
    {
        return $this->nim;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getJurusan()
    {
        return $this->jurusan;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAngkatan()
    {
        $duaDigitAwal = substr($this->nim, 0, 2);

        return "20" . $duaDigitAwal;
    }
}