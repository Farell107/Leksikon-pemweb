<?php
include "config.php";

if (isset($_POST['tambah'])) {
    $id_leksikon = $_POST['id_leksikon'];
    $cek = mysqli_query($conn, "SELECT * FROM bookmark WHERE id_leksikon = $id_leksikon");
    if (mysqli_num_rows($cek) == 0) {
        mysqli_query($conn, "INSERT INTO bookmark (id_leksikon) VALUES ($id_leksikon)");
        $pesan = "Kata berhasil ditambahkan!";
    } else {
        $pesan = "Kata ini sudah ada di bookmark.";
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM bookmark WHERE id_bookmark = $id");
    $pesan = "Bookmark berhasil dihapus.";
}

$sql = "SELECT bookmark.*, leksikon.kata 
        FROM bookmark 
        LEFT JOIN leksikon ON bookmark.id_leksikon = leksikon.id_leksikon
        ORDER BY tanggal_ditambahkan DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bookmark</title>
    <link rel="stylesheet" href="style.css">
    <script src="notif.js" defer></script>
</head>
<body>
    <h1>Bookmark Leksikon</h1>
    <a href="leksikon.php">Kembali ke Leksikon</a>
    <hr>

    <?php if (!empty($pesan)): ?>
        <div id="notif"><?php echo $pesan; ?></div>
    <?php endif; ?>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <ul>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <li>
                    <?php echo htmlspecialchars($row['kata']); ?> 
                    <small>(<?php echo $row['tanggal_ditambahkan']; ?>)</small>
                    <a href="bookmark.php?hapus=<?php echo $row['id_bookmark']; ?>" onclick="return confirm('Hapus bookmark ini?')">Hapus</a>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>Belum ada bookmark.</p>
    <?php endif; ?>
</body>
</html>
