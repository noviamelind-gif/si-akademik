<?php

require_once __DIR__ . '/Model.php';

class ProdiModel extends Model
{
    public function all()
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM prodi
            ORDER BY id DESC
        ");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM prodi
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
            INSERT INTO prodi
            (kode, nama)
            VALUES
            (:kode, :nama)
        ");

        return $stmt->execute([
            'kode' => $data['kode'],
            'nama' => $data['nama']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare("
            UPDATE prodi
            SET
                kode = :kode,
                nama = :nama
            WHERE id = :id
        ");

        return $stmt->execute([
            'id' => $id,
            'kode' => $data['kode'],
            'nama' => $data['nama']
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("
            DELETE FROM prodi
            WHERE id = :id
        ");

        return $stmt->execute([
            'id' => $id
        ]);
    }
}