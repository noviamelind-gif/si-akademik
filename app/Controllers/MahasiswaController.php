<?php

require_once __DIR__ . '/../Repositories/MahasiswaRepository.php';

class MahasiswaController
{
    private MahasiswaRepository $repo;

    public function __construct()
    {
        $this->repo = new MahasiswaRepository(
            Database::getInstance()
        );
    }

    public function index()
    {
        $mahasiswa = $this->repo->all();

        require __DIR__ . '/../Views/mahasiswa/index.php';
    }

    public function create()
    {
        require __DIR__ . '/../Views/mahasiswa/create.php';
    }

    public function store()
    {
        $data = [
            'nim' => trim($_POST['nim'] ?? ''),
            'nama' => trim($_POST['nama'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'prodi_id' => (int) ($_POST['prodi_id'] ?? 0),
            'angkatan' => (int) ($_POST['angkatan'] ?? 0),
            'status' => $_POST['status'] ?? 'aktif'
        ];

        if ($data['nim'] === '' || $data['nama'] === '') {
            die('NIM dan Nama wajib diisi.');
        }

        $this->repo->create($data);

        header('Location: /si-akademik/public/mahasiswa');
        exit;
    }

    public function edit($id)
    {
        $mahasiswa = $this->repo->find($id);

        if (!$mahasiswa) {
            http_response_code(404);
            echo "Data mahasiswa tidak ditemukan.";
            return;
        }

        require __DIR__ . '/../Views/mahasiswa/edit.php';
    }

    public function update($id)
    {
        $data = [
            'nim' => trim($_POST['nim'] ?? ''),
            'nama' => trim($_POST['nama'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'prodi_id' => (int) ($_POST['prodi_id'] ?? 0),
            'angkatan' => (int) ($_POST['angkatan'] ?? 0),
            'status' => $_POST['status'] ?? 'aktif'
        ];

        $this->repo->update($id, $data);

        header('Location: /si-akademik/public/mahasiswa');
        exit;
    }

    public function destroy($id)
    {
        $this->repo->delete($id);

        header('Location: /si-akademik/public/mahasiswa');
        exit;
    }
}