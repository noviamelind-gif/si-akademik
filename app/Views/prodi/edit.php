<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Prodi - SI Akademik</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">Edit Program Studi</h2>

    <form
        action="/si-akademik/public/prodi/<?= $prodi['id'] ?>/update"
        method="POST"
    >

        <div class="mb-3">
            <label class="form-label">
                Kode Prodi
            </label>

            <input
                type="text"
                name="kode"
                class="form-control"
                value="<?= htmlspecialchars($prodi['kode']) ?>"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">
                Nama Prodi
            </label>

            <input
                type="text"
                name="nama"
                class="form-control"
                value="<?= htmlspecialchars($prodi['nama']) ?>"
                required
            >
        </div>

        <button
            type="submit"
            class="btn btn-primary"
        >
            Update
        </button>

        <a
            href="/si-akademik/public/prodi"
            class="btn btn-secondary"
        >
            Batal
        </a>

    </form>

</div>

</body>
</html>