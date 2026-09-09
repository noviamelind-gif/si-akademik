<?php

require_once __DIR__ . '/Model.php';

class MahasiswaModel extends Model
{
    public function all()
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

    public function find($id)
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM mahasiswa
            WHERE id = :id
        ");

        $stmt->execute([
            'id' => $id
        ]);

        return $stmt->fetch();
    }

    public function create($data)
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

    public function update($id, $data)
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

    public function delete($id)
    {
        $stmt = $this->db->prepare("
            DELETE FROM mahasiswa
            WHERE id = :id
        ");

        return $stmt->execute([
            'id' => $id
        ]);
    }

    public function search($keyword)
    {
        $stmt = $this->db->prepare("
            SELECT 
                m.*,
                p.nama AS prodi_nama
            FROM mahasiswa m
            JOIN prodi p ON m.prodi_id = p.id
            WHERE m.nama LIKE :keyword
            OR m.nim LIKE :keyword
            ORDER BY m.id DESC
        ");

        $stmt->execute([
            'keyword' => '%' . $keyword . '%'
        ]);

        return $stmt->fetchAll();
    }   
}