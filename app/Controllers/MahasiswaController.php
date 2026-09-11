<?php

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../Repositories/MahasiswaRepository.php';
require_once __DIR__ . '/../Core/Database.php';

class MahasiswaController extends BaseController
{
    private MahasiswaRepository $repository;

    public function __construct(MahasiswaRepository $repository)
    {
        $this->repository = $repository;
    }
  
    public function index(): void
    {
        $keyword = trim($_GET['search'] ?? '');

        if ($keyword !== '') {
            $mahasiswa = $this->repository->search($keyword);
        } else {
            $mahasiswa = $this->repository->all();
        }

        $this->view('mahasiswa/index', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function create(): void
    {
        require_once __DIR__ . '/../Models/ProdiModel.php';

        $prodiModel = new ProdiModel();
        $prodi = $prodiModel->all();

        $this->view('mahasiswa/create', [
            'prodi' => $prodi
        ]);
    }

    public function store(): void
    {
        $data = [
            'nim' => trim($_POST['nim'] ?? ''),
            'nama' => trim($_POST['nama'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'prodi_id' => (int) ($_POST['prodi_id'] ?? 0),
            'angkatan' => (int) ($_POST['angkatan'] ?? 0),
            'status' => $_POST['status'] ?? 'aktif'
        ];

        if ($data['nama'] === '') {
            die('Nama mahasiswa tidak boleh kosong.');
        }

        if (!is_numeric($data['nim'])) {
            die('NIM harus berupa angka.');
        }

        $this->repository->create($data);

        $this->redirect('/si-akademik/public/mahasiswa');
    }

    public function edit(int $id): void
    {
        $mahasiswa = $this->repository->find($id);

        if (!$mahasiswa) {
            http_response_code(404);
            echo "Data mahasiswa tidak ditemukan.";
            return;
        }

        require_once __DIR__ . '/../Models/ProdiModel.php';

        $prodiModel = new ProdiModel();
        $prodi = $prodiModel->all();

        $this->view('mahasiswa/edit', [
            'mahasiswa' => $mahasiswa,
            'prodi' => $prodi
        ]);
    }

    public function update(int $id): void
    {
        $data = [
            'nim' => trim($_POST['nim'] ?? ''),
            'nama' => trim($_POST['nama'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'prodi_id' => (int) ($_POST['prodi_id'] ?? 0),
            'angkatan' => (int) ($_POST['angkatan'] ?? 0),
            'status' => $_POST['status'] ?? 'aktif'
        ];

        if ($data['nama'] === '') {
            die('Nama mahasiswa tidak boleh kosong.');
        }

        if (!is_numeric($data['nim'])) {
            die('NIM harus berupa angka.');
        }

        $this->repository->update($id, $data);

        $this->redirect('/si-akademik/public/mahasiswa');
    }

    public function destroy(int $id): void
    {
        $this->repository->delete($id);

        $this->redirect('/si-akademik/public/mahasiswa');
    }
}