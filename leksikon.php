<?php
include "config.php";
setcookie("pengunjung", "aktif", time() + 3600, "/");

$kat = mysqli_query($conn, "SELECT * FROM katalog");

$cari = "";
$filter = "";
if (isset($_GET['search']) && $_GET['search'] != "") {
    $cari = mysqli_real_escape_string($conn, $_GET['search']);
    $filter = "WHERE leksikon.kata LIKE '%$cari%' OR leksikon.arti LIKE '%$cari%'";
} elseif (isset($_GET['katalog'])) {
    $kid = $_GET['katalog'];
    $filter = "WHERE leksikon.id_katalog = $kid";
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT leksikon.*, katalog.nama_katalog 
            FROM leksikon 
            LEFT JOIN katalog ON leksikon.id_katalog = katalog.id_katalog
            WHERE leksikon.id_leksikon = $id";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
} else {
    $sql = "SELECT leksikon.*, katalog.nama_katalog 
            FROM leksikon 
            LEFT JOIN katalog ON leksikon.id_katalog = katalog.id_katalog
            $filter ORDER BY leksikon.kata ASC";
    $result = mysqli_query($conn, $sql);
}

?>
<!DOCTYPE html>
<html lang="id">
    <link rel="stylesheet" href="style.css">

<head>
    <meta charset="UTF-8">
    <title>Leksikon Bahasa Jawa</title>
    <link rel="stylesheet" href="style.css?v=2">
    <script src="script.js" defer></script>
</head>
<body>
    <h1>Leksikon Bahasa Jawa</h1>

<nav>
    <a href="leksikon.php">Semua</a>
    <?php while ($row = mysqli_fetch_assoc($kat)): ?>
        | <a href="leksikon.php?katalog=<?php echo $row['id_katalog']; ?>">
            <?php echo htmlspecialchars($row['nama_katalog']); ?>
          </a>
    <?php endwhile; ?>
    | <a href="bookmark.php">Bookmark</a>
    | <a href="portal.php">Portal Pencarian</a>
</nav>

    <hr>

    <form method="get" action="leksikon.php">
        <input type="text" name="search" placeholder="Cari kata" value="<?php echo htmlspecialchars($cari); ?>" style="padding:6px;width:200px;">
        <button type="submit">Cari</button>
        <?php if ($cari != ""): ?>
            <a href="leksikon.php" style="margin-left:10px;">Reset</a>
        <?php endif; ?>
    </form>
    
    <?php if (isset($_GET['id'])): ?>
        <?php if ($data): ?>
            <h2><?php echo htmlspecialchars($data['kata']); ?></h2>
            <p><b>Kategori:</b> <?php echo htmlspecialchars($data['nama_katalog']); ?></p>
            <p><b>Arti:</b> <?php echo htmlspecialchars($data['arti']); ?></p>
            <p><i>Sumber:</i> <?php echo htmlspecialchars($data['sumber']); ?></p>

            <form method="post" action="bookmark.php">
                <input type="hidden" name="id_leksikon" value="<?php echo $data['id_leksikon']; ?>">
                <button type="submit" name="tambah">Tambah ke Bookmark</button>
            </form>

            <p><a href="leksikon.php">Kembali ke Daftar</a></p>
        <?php else: ?>
            <p>Data tidak ditemukan.</p>
        <?php endif; ?>
    <?php else: ?>
        <h2>Daftar Kata Bahasa Jawa</h2>

        <table border="1" cellpadding="8" cellspacing="0">
            <tr style="background:#e0f0ff;">
                <th>No</th>
                <th>Kata</th>
                <th>Arti</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
            <?php 
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)): 
                $arti_singkat = substr($row['arti'], 0, 60);
                if (strlen($row['arti']) > 60) {
                    $arti_singkat .= "...";
                }
            ?>
            <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($row['kata']); ?></td>
                <td><?php echo htmlspecialchars($arti_singkat); ?></td>
                <td><?php echo htmlspecialchars($row['nama_katalog']); ?></td>
                <td align="center">
                    <a href="leksikon.php?id=<?php echo $row['id_leksikon']; ?>">Lihat</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <?php if ($no == 1): ?>
            <p style="margin-top:10px;">Tidak ada hasil yang cocok.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
