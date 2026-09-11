<?php

class Mahasiswa
{
    private $nim;
    private $nama;
    private $jurusan;
    private $email;

    public function __construct($nim, $nama, $jurusan, $email)
    {
        $this->setNim($nim);
        $this->setNama($nama);
        $this->setJurusan($jurusan);
        $this->setEmail($email);
    }

    public function getNim()
    {
        return $this->nim;
    }

    public function setNim($nim)
    {
        if (!is_numeric($nim)) {
            throw new InvalidArgumentException(
                "NIM harus berupa angka."
            );
        }

        $this->nim = $nim;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        if (trim($nama) === '') {
            throw new InvalidArgumentException(
                "Nama mahasiswa tidak boleh kosong."
            );
        }

        $this->nama = $nama;
    }

    public function getJurusan()
    {
        return $this->jurusan;
    }

    public function setJurusan($jurusan)
    {
        $this->jurusan = $jurusan;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getAngkatan()
    {
        $duaDigitAwal = substr($this->nim, 0, 2);

        return "20" . $duaDigitAwal;
    }
}