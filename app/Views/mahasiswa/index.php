<?php
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Mahasiswa</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <?php if ($flash): ?>

        <div class="alert <?= $flash['type'] === 'success' ? 'alert-success' : 'alert-danger' ?> alert-dismissible fade show" role="alert">

            <?= htmlspecialchars($flash['message']) ?>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>

        </div>

    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1>Data Mahasiswa</h1>
            <p class="text-muted">
                Sistem Informasi Akademik
            </p>
        </div>

        <a
            href="/si-akademik/public/mahasiswa/create"
            class="btn btn-primary"
        >
            + Tambah Mahasiswa
        </a>
        
        <form method="GET" action="/si-akademik/public/mahasiswa" class="mb-4">

    <div class="input-group">

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Cari berdasarkan NIM atau Nama..."
            value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
        >

        <button
            type="submit"
            class="btn btn-primary"
        >
            Cari
        </button>

        <a
            href="/si-akademik/public/mahasiswa"
            class="btn btn-secondary"
        >
            Reset
        </a>

    </div>

</form>

    </div>

    <div class="card shadow">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped align-middle">

                    <thead class="table-primary">

                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Email</th>
                            <th>Angkatan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php if (empty($mahasiswa)): ?>

                        <tr>
                            <td colspan="8" class="text-center">
                                Belum ada data mahasiswa.
                            </td>
                        </tr>

                    <?php else: ?>

                        <?php $no = 1; ?>

                        <?php foreach ($mahasiswa as $m): ?>

                            <tr>

                                <td><?= $no++ ?></td>

                                <td>
                                    <?= htmlspecialchars($m['nim']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($m['nama']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($m['prodi_nama']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($m['email']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($m['angkatan']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($m['status']) ?>
                                </td>

                                <td>

                                    <a
                                        href="/si-akademik/public/mahasiswa/<?= $m['id'] ?>/edit"
                                        class="btn btn-warning btn-sm"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="/si-akademik/public/mahasiswa/<?= $m['id'] ?>/delete"
                                        method="POST"
                                        style="display: inline;"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?');"
                                    >

                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-sm"
                                        >
                                            Hapus
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>
</html>