<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Mahasiswa - SI Akademik</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow">

                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Tambah Mahasiswa</h4>
                    </div>

                    <div class="card-body">

                        <form method="POST">

                            <div class="mb-3">
                                <label for="nim" class="form-label">
                                    NIM
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="nim"
                                    name="nim"
                                    placeholder="Masukkan NIM"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="nama" class="form-label">
                                    Nama Mahasiswa
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="nama"
                                    name="nama"
                                    placeholder="Masukkan nama mahasiswa"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="jurusan" class="form-label">
                                    Jurusan
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="jurusan"
                                    name="jurusan"
                                    placeholder="Masukkan jurusan"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Masukkan email"
                                    required
                                >
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>

                            <button type="reset" class="btn btn-secondary">
                                Reset
                            </button>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>

</body>

</html>