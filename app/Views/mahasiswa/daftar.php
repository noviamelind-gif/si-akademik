<?php

ob_start();

?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2>Daftar Mahasiswa</h2>
        <p class="text-muted">
            Data mahasiswa SI Akademik
        </p>
    </div>

    <a href="#" class="btn btn-primary">
        + Tambah Mahasiswa
    </a>

</div>

<div class="card shadow">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

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

                    <?php foreach ($mahasiswa as $index => $mhs): ?>

                        <tr>

                            <td>
                                <?= $index + 1 ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($mhs->getNim()) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($mhs->getNama()) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($mhs->getJurusan()) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($mhs->getEmail()) ?>
                            </td>

                            <td>
                                <span class="badge bg-success">
                                    <?= $mhs->getAngkatan() ?>
                                </span>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php

$content = ob_get_clean();

require __DIR__ . '/../layouts/main.php';

?>