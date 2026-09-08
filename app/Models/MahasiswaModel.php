<?php

require_once __DIR__ . '/Model.php';

class MahasiswaModel extends Model
{
    public function all()
    {
        $sql = "
            SELECT 
                mahasiswa.id,
                mahasiswa.nim,
                mahasiswa.nama,
                mahasiswa.email,
                mahasiswa.angkatan,
                prodi.nama AS nama_prodi
            FROM mahasiswa
            JOIN prodi 
                ON mahasiswa.prodi_id = prodi.id
            ORDER BY mahasiswa.id ASC
        ";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}