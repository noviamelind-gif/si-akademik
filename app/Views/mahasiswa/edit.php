<?php
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Mahasiswa</title>

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

    <div class="card shadow">

        <div class="card-header">
            <h3 class="mb-0">Edit Mahasiswa</h3>
        </div>

        <div class="card-body">

            <form
                action="/si-akademik/public/mahasiswa/<?= $mahasiswa['id'] ?>/update"
                method="POST"
            >

                <div class="mb-3">

                    <label class="form-label">
                        NIM
                    </label>

                    <input
                        type="text"
                        name="nim"
                        class="form-control"
                        value="<?= htmlspecialchars($mahasiswa['nim']) ?>"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Nama
                    </label>

                    <input
                        type="text"
                        name="nama"
                        class="form-control"
                        value="<?= htmlspecialchars($mahasiswa['nama']) ?>"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="<?= htmlspecialchars($mahasiswa['email']) ?>"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        ID Prodi
                    </label>

                    <input
                        type="number"
                        name="prodi_id"
                        class="form-control"
                        value="<?= htmlspecialchars($mahasiswa['prodi_id']) ?>"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Angkatan
                    </label>

                    <input
                        type="number"
                        name="angkatan"
                        class="form-control"
                        value="<?= htmlspecialchars($mahasiswa['angkatan']) ?>"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select"
                    >

                        <option
                            value="aktif"
                            <?= $mahasiswa['status'] === 'aktif' ? 'selected' : '' ?>
                        >
                            Aktif
                        </option>

                        <option
                            value="cuti"
                            <?= $mahasiswa['status'] === 'cuti' ? 'selected' : '' ?>
                        >
                            Cuti
                        </option>

                        <option
                            value="lulus"
                            <?= $mahasiswa['status'] === 'lulus' ? 'selected' : '' ?>
                        >
                            Lulus
                        </option>

                    </select>

                </div>


                <a
                    href="/si-akademik/public/mahasiswa"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Update
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>