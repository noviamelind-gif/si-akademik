<?php

require_once __DIR__ . '/Model.php';

class MatakuliahModel extends Model
{
    public function all()
    {
        $stmt = $this->db->prepare("
            SELECT
                m.*,
                p.nama AS prodi_nama
            FROM matakuliah m
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
            FROM matakuliah
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
            INSERT INTO matakuliah
            (kode, nama, sks, prodi_id)
            VALUES
            (:kode, :nama, :sks, :prodi_id)
        ");

        return $stmt->execute([
            'kode' => $data['kode'],
            'nama' => $data['nama'],
            'sks' => $data['sks'],
            'prodi_id' => $data['prodi_id']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare("
            UPDATE matakuliah
            SET
                kode = :kode,
                nama = :nama,
                sks = :sks,
                prodi_id = :prodi_id
            WHERE id = :id
        ");

        return $stmt->execute([
            'id' => $id,
            'kode' => $data['kode'],
            'nama' => $data['nama'],
            'sks' => $data['sks'],
            'prodi_id' => $data['prodi_id']
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("
            DELETE FROM matakuliah
            WHERE id = :id
        ");

        return $stmt->execute([
            'id' => $id
        ]);
    }
}