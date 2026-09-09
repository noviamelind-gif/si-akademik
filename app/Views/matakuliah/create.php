<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Mata Kuliah - SI Akademik</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">Tambah Mata Kuliah</h2>

    <form
        action="/si-akademik/public/matakuliah"
        method="POST"
    >

        <div class="mb-3">

            <label class="form-label">
                Kode Mata Kuliah
            </label>

            <input
                type="text"
                name="kode"
                class="form-control"
                placeholder="Contoh: IF101"
                required
            >

        </div>

        <div class="mb-3">

            <label class="form-label">
                Nama Mata Kuliah
            </label>

            <input
                type="text"
                name="nama"
                class="form-control"
                placeholder="Contoh: Pemrograman Web"
                required
            >

        </div>

        <div class="mb-3">

            <label class="form-label">
                SKS
            </label>

            <input
                type="number"
                name="sks"
                class="form-control"
                min="1"
                max="6"
                required
            >

        </div>

        <div class="mb-3">

            <label class="form-label">
                Program Studi
            </label>

            <select
                name="prodi_id"
                class="form-select"
                required
            >

                <option value="">
                    -- Pilih Prodi --
                </option>

                <?php foreach ($prodi as $item): ?>

                    <option value="<?= $item['id'] ?>">
                        <?= htmlspecialchars($item['nama']) ?>
                    </option>

                <?php endforeach; ?>

            </select>

        </div>

        <button
            type="submit"
            class="btn btn-primary"
        >
            Simpan
        </button>

        <a
            href="/si-akademik/public/matakuliah"
            class="btn btn-secondary"
        >
            Batal
        </a>

    </form>

</div>

</body>
</html>