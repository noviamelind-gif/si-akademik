<?php

require_once __DIR__ . '/../Models/ProdiModel.php';

class ProdiController
{
    private ProdiModel $model;

    public function __construct()
    {
        $this->model = new ProdiModel();
    }

    public function index()
    {
        $prodi = $this->model->all();

        require __DIR__ . '/../Views/prodi/index.php';
    }

    public function create()
    {
        require __DIR__ . '/../Views/prodi/create.php';
    }

    public function store()
    {
        $data = [
            'kode' => trim($_POST['kode'] ?? ''),
            'nama' => trim($_POST['nama'] ?? '')
        ];

        if ($data['kode'] === '' || $data['nama'] === '') {
            die('Kode dan Nama Prodi wajib diisi.');
        }

        $this->model->create($data);

        header('Location: /si-akademik/public/prodi');
        exit;
    }

    public function edit($id)
    {
        $prodi = $this->model->find($id);

        if (!$prodi) {
            http_response_code(404);
            echo "Data prodi tidak ditemukan.";
            return;
        }

        require __DIR__ . '/../Views/prodi/edit.php';
    }

    public function update($id)
    {
        $data = [
            'kode' => trim($_POST['kode'] ?? ''),
            'nama' => trim($_POST['nama'] ?? '')
        ];

        if ($data['kode'] === '' || $data['nama'] === '') {
            die('Kode dan Nama Prodi wajib diisi.');
        }

        $this->model->update($id, $data);

        header('Location: /si-akademik/public/prodi');
        exit;
    }

    public function destroy($id)
    {
        $this->model->delete($id);

        header('Location: /si-akademik/public/prodi');
        exit;
    }
}