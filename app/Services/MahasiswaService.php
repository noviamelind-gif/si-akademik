<?php

require_once __DIR__ . '/../Repositories/MahasiswaRepository.php';
require_once __DIR__ . '/../Repositories/ProdiRepository.php';

class MahasiswaService
{
    private MahasiswaRepository $repo;
    private ProdiRepository $prodiRepo;

    public function __construct(
        MahasiswaRepository $repo,
        ProdiRepository $prodiRepo
    ) {
        $this->repo = $repo;
        $this->prodiRepo = $prodiRepo;
    }

    public function all(): array
    {
        return $this->repo->all();
    }

    public function search(string $keyword): array
    {
        return $this->repo->search($keyword);
    }

    public function delete(int $id): bool
    {
        return $this->repo->delete($id);
    }

    public function create(array $input): array
    {
        $errors = $this->validate($input);

        if (!empty($errors)) {
            return [
                'success' => false,
                'errors' => $errors
            ];
        }

        try {
            $id = $this->repo->create($input);

            return [
                'success' => true,
                'id' => $id
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'errors' => [
                    'general' => 'Data gagal disimpan.'
                ]
            ];
        }
    }

    public function update(int $id, array $input): array
    {
        $errors = $this->validate($input, $id);

        if (!empty($errors)) {
            return [
                'success' => false,
                'errors' => $errors
            ];
        }

        try {
            $success = $this->repo->update($id, $input);

            return [
                'success' => $success
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'errors' => [
                    'general' => 'Data gagal disimpan.'
                ]
            ];
        }
    }

    public function find(int $id): ?array
    {
        return $this->repo->find($id);
    }

    public function getProdi(): array
    {
        return $this->prodiRepo->all();
    }
    
    private function validate(array $input, ?int $id = null): array
    {
        $errors = [];

        // Validasi NIM
        if (empty($input['nim'])) {
            $errors['nim'] = 'NIM wajib diisi';
        } elseif (!is_numeric($input['nim'])) {
            $errors['nim'] = 'NIM harus berupa angka';
        } elseif ($this->repo->existsByNim($input['nim'], $id)) {
            $errors['nim'] = 'NIM sudah terdaftar';
        }

        // Validasi nama
        if (empty(trim($input['nama'] ?? ''))) {
            $errors['nama'] = 'Nama mahasiswa wajib diisi';
        }

        // Validasi email
        if (
            !empty($input['email']) &&
            !filter_var($input['email'], FILTER_VALIDATE_EMAIL)
        ) {
            $errors['email'] = 'Format email tidak valid';
        }

        // Validasi prodi
        if (empty($input['prodi_id']) ||
            !$this->prodiRepo->find($input['prodi_id'])) {
            $errors['prodi_id'] = 'Program studi tidak valid';
        }

        return $errors;
    }
}