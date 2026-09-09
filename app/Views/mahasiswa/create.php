<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Mahasiswa</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header">
            <h3 class="mb-0">Tambah Mahasiswa</h3>
        </div>

        <div class="card-body">

            <form
                action="/si-akademik/public/mahasiswa"
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

                        <option value="aktif">
                            Aktif
                        </option>

                        <option value="cuti">
                            Cuti
                        </option>

                        <option value="lulus">
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
                    Simpan
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>