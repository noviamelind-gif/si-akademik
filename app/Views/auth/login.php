<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - SI Akademik</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">
                        Login SI Akademik
                    </h2>
                        <?php 
                            if (isset($_SESSION['flash_message'])): 
                        ?>

                            <div class="alert alert-success">
                                <?= htmlspecialchars($_SESSION['flash_message']) ?>
                            </div>

                        <?php
                            unset($_SESSION['flash_message']); 
                        ?>

                        <?php 
                            endif; 
                        ?>
                    <form action="/si-akademik/public/login" method="POST">
                        <div class="mb-3">
                            <label class="form-label">
                                Username
                            </label>
                            <input
                                type="text"
                                name="username"
                                class="form-control"
                                required
                            >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Password
                            </label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required
                            >
                        </div>
                        <button
                            type="submit"
                            class="btn btn-primary w-100"
                        >
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>