<?php

require_once __DIR__ . '/../Models/MahasiswaModel.php';

class MahasiswaController
{
    private MahasiswaModel $model;

    public function __construct()
    {
        $this->model = new MahasiswaModel();
    }

    public function index()
    {
        $keyword = trim($_GET['search'] ?? '');

        if ($keyword !== '') {
            $mahasiswa = $this->model->search($keyword);
        } else {
            $mahasiswa = $this->model->all();
        }

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

        $this->model->create($data);

        header('Location: /si-akademik/public/mahasiswa');
        exit;
    }

    public function edit($id)
    {
        $mahasiswa = $this->model->find($id);

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

        $this->model->update($id, $data);

        header('Location: /si-akademik/public/mahasiswa');
        exit;
    }

    public function destroy($id)
    {
        $this->model->delete($id);

        header('Location: /si-akademik/public/mahasiswa');
        exit;
    }
}