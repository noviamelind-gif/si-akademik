<?php

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../Services/MahasiswaService.php';

class MahasiswaController extends BaseController
{
    private MahasiswaService $service;

    public function __construct(MahasiswaService $service)
    {
        $this->service = $service;
    }

    public function index(): void
    {
        $keyword = trim($_GET['search'] ?? '');

        if ($keyword !== '') {
            $mahasiswa = $this->service->search($keyword);
        } else {
            $mahasiswa = $this->service->all();
        }

        $this->view('mahasiswa/index', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function create(): void
    {
        $prodi = $this->service->getProdi();

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

        $result = $this->service->create($data);

        if ($result['success']) {
            $_SESSION['flash'] = [
                'type' => 'success',
                'message' => 'Data mahasiswa berhasil ditambahkan.'
            ];

            $this->redirect('/si-akademik/public/mahasiswa');
        }

        $message = $result['errors']['nim']
            ?? $result['errors']['general']
            ?? 'Data gagal disimpan.';

        $_SESSION['flash'] = [
            'type' => 'error',
            'message' => $message
        ];

        $this->redirect('/si-akademik/public/mahasiswa/create');
    }

    public function edit(int $id): void
    {
        $mahasiswa = $this->service->find($id);

        if (!$mahasiswa) {
            http_response_code(404);
            echo "Data mahasiswa tidak ditemukan.";
            return;
        }

        $prodi = $this->service->getProdi();

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

        $result = $this->service->update($id, $data);

        if ($result['success']) {
            $_SESSION['flash'] = [
                'type' => 'success',
                'message' => 'Data mahasiswa berhasil diubah.'
            ];

            $this->redirect('/si-akademik/public/mahasiswa');
        }

        $message = $result['errors']['nim']
            ?? $result['errors']['general']
            ?? 'Data gagal disimpan.';

        $_SESSION['flash'] = [
            'type' => 'error',
            'message' => $message
        ];

        $this->redirect('/si-akademik/public/mahasiswa/' . $id . '/edit');
    }

    public function destroy(int $id): void
    {
        $this->service->delete($id);

        $_SESSION['flash'] = [
            'type' => 'success',
            'message' => 'Data mahasiswa berhasil dihapus.'
        ];

        $this->redirect('/si-akademik/public/mahasiswa');
    }
}