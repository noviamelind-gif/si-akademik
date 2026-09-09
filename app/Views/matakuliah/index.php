<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Mata Kuliah - SI Akademik</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Data Mata Kuliah</h2>

        <a
            href="/si-akademik/public/matakuliah/create"
            class="btn btn-primary"
        >
            + Tambah Mata Kuliah
        </a>

    </div>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Prodi</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

        <?php if (empty($matakuliah)): ?>

            <tr>
                <td colspan="6" class="text-center">
                    Belum ada data mata kuliah.
                </td>
            </tr>

        <?php else: ?>

            <?php foreach ($matakuliah as $index => $item): ?>

                <tr>

                    <td>
                        <?= $index + 1 ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($item['kode']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($item['nama']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($item['sks']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($item['prodi_nama']) ?>
                    </td>

                    <td>

                        <a
                            href="/si-akademik/public/matakuliah/<?= $item['id'] ?>/edit"
                            class="btn btn-warning btn-sm"
                        >
                            Edit
                        </a>

                        <form
                            action="/si-akademik/public/matakuliah/<?= $item['id'] ?>/delete"
                            method="POST"
                            style="display:inline;"
                            onsubmit="return confirm('Yakin ingin menghapus mata kuliah ini?');"
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

    <a
        href="/si-akademik/public/dashboard"
        class="btn btn-secondary"
    >
        ← Kembali ke Dashboard
    </a>

</div>

</body>
</html>