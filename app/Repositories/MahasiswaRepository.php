<?php

class MahasiswaRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function all(): array
    {
        $stmt = $this->pdo->query("
            SELECT 
                m.*,
                p.nama AS prodi_nama
            FROM mahasiswa m
            JOIN prodi p ON m.prodi_id = p.id
            ORDER BY m.nim
        ");

        return $stmt->fetchAll();
    }

    public function find(int $id): ?array
    {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM mahasiswa
            WHERE id = :id
        ");

        $stmt->execute([
            'id' => $id
        ]);

        $row = $stmt->fetch();

        return $row ?: null;
    }

    public function create(array $data): int
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO mahasiswa
            (nim, nama, email, prodi_id, angkatan, status)
            VALUES
            (:nim, :nama, :email, :prodi_id, :angkatan, :status)
        ");

        $stmt->execute([
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'email' => $data['email'],
            'prodi_id' => $data['prodi_id'],
            'angkatan' => $data['angkatan'],
            'status' => $data['status']
        ]);

        return (int) $this->pdo->lastInsertId();
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->pdo->prepare("
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

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("
            DELETE FROM mahasiswa
            WHERE id = :id
        ");

        return $stmt->execute([
            'id' => $id
        ]);
    }

    public function search(string $keyword): array
    {
        $stmt = $this->pdo->prepare("
            SELECT 
                m.*,
                p.nama AS prodi_nama
            FROM mahasiswa m
            JOIN prodi p ON m.prodi_id = p.id
            WHERE m.nama LIKE :keyword_nama
            OR m.nim LIKE :keyword_nim
            ORDER BY m.id DESC
        ");

        $keyword = '%' . $keyword . '%';

        $stmt->execute([
            'keyword_nama' => $keyword,
            'keyword_nim' => $keyword
        ]);

        return $stmt->fetchAll();
    }
}
?>