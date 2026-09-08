<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Mahasiswa</title>

    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <h1>Daftar Mahasiswa</h1>

    <p class="text-muted">
        Data mahasiswa dari database
    </p>

    <div class="card shadow mt-4">

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead class="table-primary">

                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Email</th>
                        <th>Angkatan</th>
                    </tr>

                </thead>

                <tbody>

                    <?php $no = 1; ?>

                    <?php foreach ($mahasiswa as $mhs): ?>

                        <tr>

                            <td>
                                <?= $no++ ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($mhs['nim']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($mhs['nama']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($mhs['nama_prodi']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($mhs['email']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($mhs['angkatan']) ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>