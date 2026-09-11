<?php

require_once __DIR__ . '/../Core/Database.php';

class MahasiswaRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function all(): array
    {
        $stmt = $this->db->prepare("
            SELECT
                m.*,
                p.nama AS prodi_nama
            FROM mahasiswa m
            JOIN prodi p ON m.prodi_id = p.id
            ORDER BY m.id DESC
        ");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function find($id): ?array
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM mahasiswa
            WHERE id = :id
        ");

        $stmt->execute([
            'id' => $id
        ]);

        $data = $stmt->fetch();

        return $data ?: null;
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare("
            INSERT INTO mahasiswa
            (nim, nama, email, prodi_id, angkatan, status)
            VALUES
            (:nim, :nama, :email, :prodi_id, :angkatan, :status)
        ");

        return $stmt->execute([
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'email' => $data['email'],
            'prodi_id' => $data['prodi_id'],
            'angkatan' => $data['angkatan'],
            'status' => $data['status']
        ]);
    }

    public function update($id, array $data): bool
    {
        $stmt = $this->db->prepare("
            UPDATE mahasiswa
            SET
                nim = :nim,
                nama = :nama,
                email = :email,
                prodi_id = :prodi_id,
                angkatan = :angkatan,
                status = :status
            WHERE id = :id
        ");

        return $stmt->execute([
            'id' => $id,
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'email' => $data['email'],
            'prodi_id' => $data['prodi_id'],
            'angkatan' => $data['angkatan'],
            'status' => $data['status']
        ]);
    }

    public function delete($id): bool
    {
        $stmt = $this->db->prepare("
            DELETE FROM mahasiswa
            WHERE id = :id
        ");

        return $stmt->execute([
            'id' => $id
        ]);
    }
}