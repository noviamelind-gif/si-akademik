<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SI Akademik</title>
</head>
<body>

    <h1>Selamat datang di SI Akademik</h1>

    <hr>

    <h2>Form Pencarian</h2>

    <form method="GET" action="">
        <label>Cari:</label>
        <input type="text" name="cari">
        <button type="submit">Cari</button>
    </form>

    <?php
    if (isset($_GET['cari'])) {
        echo "<p>Hasil pencarian: " . htmlspecialchars($_GET['cari']) . "</p>";
    }
    ?>

    <hr>

    <h2>Form Login</h2>

    <form method="POST" action="">
        <label>Username:</label>
        <input type="text" name="username" required>
        <br><br>

        <label>Password:</label>
        <input type="password" name="password" required>
        <br><br>

        <button type="submit">Login</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "<p>Username: " . htmlspecialchars($_POST['username']) . "</p>";
        echo "<p>Login berhasil diproses.</p>";
    }
    ?>

    <h2>Deteksi Method Request</h2>

    <?php
     if ($_SERVER['REQUEST_METHOD'] === 'GET') { 
        echo "<p>Request menggunakan method GET.</p>";
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') { 
        echo "<p>Request menggunakan method POST.</p>"; 
    }
    ?>
    
</body>
</html>