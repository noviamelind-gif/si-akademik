<?php

require_once __DIR__ . '/../Models/MatakuliahModel.php';

class MatakuliahController
{
    private MatakuliahModel $model;

    public function __construct()
    {
        $this->model = new MatakuliahModel();
    }

    public function index()
    {
        $matakuliah = $this->model->all();

        require __DIR__ . '/../Views/matakuliah/index.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../Models/ProdiModel.php';

        $prodiModel = new ProdiModel();

        $prodi = $prodiModel->all();

        require __DIR__ . '/../Views/matakuliah/create.php';
    }

    public function store()
    {
        $data = [
            'kode' => trim($_POST['kode'] ?? ''),
            'nama' => trim($_POST['nama'] ?? ''),
            'sks' => (int) ($_POST['sks'] ?? 0),
            'prodi_id' => (int) ($_POST['prodi_id'] ?? 0)
        ];

        if (
            $data['kode'] === '' ||
            $data['nama'] === '' ||
            $data['sks'] <= 0 ||
            $data['prodi_id'] <= 0
        ) {
            die('Data mata kuliah belum lengkap.');
        }

        $this->model->create($data);

        header('Location: /si-akademik/public/matakuliah');
        exit;
    }

    public function edit($id)
    {
        $matakuliah = $this->model->find($id);

        if (!$matakuliah) {
            http_response_code(404);
            echo "Data mata kuliah tidak ditemukan.";
            return;
        }

        require_once __DIR__ . '/../Models/ProdiModel.php';

        $prodiModel = new ProdiModel();

        $prodi = $prodiModel->all();

        require __DIR__ . '/../Views/matakuliah/edit.php';
    }

    public function update($id)
    {
        $data = [
            'kode' => trim($_POST['kode'] ?? ''),
            'nama' => trim($_POST['nama'] ?? ''),
            'sks' => (int) ($_POST['sks'] ?? 0),
            'prodi_id' => (int) ($_POST['prodi_id'] ?? 0)
        ];

        if (
            $data['kode'] === '' ||
            $data['nama'] === '' ||
            $data['sks'] <= 0 ||
            $data['prodi_id'] <= 0
        ) {
            die('Data mata kuliah belum lengkap.');
        }

        $this->model->update($id, $data);

        header('Location: /si-akademik/public/matakuliah');
        exit;
    }

    public function destroy($id)
    {
        $this->model->delete($id);

        header('Location: /si-akademik/public/matakuliah');
        exit;
    }
}