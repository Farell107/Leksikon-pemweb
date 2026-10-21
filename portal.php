<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Portal Pencarian Leksikon</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<h1>Portal Pencarian Leksikon & Bahasa</h1>

<div class="search-box">
    <form action="" onsubmit="openSearch(event)">
        <input type="text" id="query" placeholder="Masukkan kata untuk dicari…">
        <button type="submit">Cari di Semua Situs</button>
    </form>
</div>

<div class="container">

    <div class="card">
        <h2>Sanskrit Lexicon – Köln</h2>
        <p>Kumpulan kamus Sansekerta klasik dan digital.</p>
        <a href="https://sanskrit-lexicon.uni-koeln.de/" target="_blank" class="button">Kunjungi</a>
    </div>

    <div class="card">
        <h2>LearnSanskrit.cc</h2>
        <p>Kamus modern dengan alat analisis gramatikal.</p>
        <a href="https://www.learnsanskrit.cc/" target="_blank" class="button">Kunjungi</a>
    </div>

    <div class="card">
        <h2>SEAlang Library</h2>
        <p>Perpustakaan linguistik Asia Tenggara.</p>
        <a href="http://sealang.net/library/" target="_blank" class="button">Kunjungi</a>
    </div>

    <div class="card">
        <h2>OJED – Old Javanese</h2>
        <p>Kamus Jawa Kuno (Old Javanese Dictionary).</p>
        <a href="http://sealang.net/ojed/" target="_blank" class="button">Kunjungi</a>
    </div>

</div>

<script>
function openSearch(e) {
    e.preventDefault();
    let q = document.getElementById("query").value.trim();
    if (!q) return;

    window.open("https://sanskrit-lexicon.uni-koeln.de/scans/csl-apidev/simple-search/index.php?key=" + encodeURIComponent(q));
    window.open("https://www.learnsanskrit.cc/search?mode=0&query=" + encodeURIComponent(q));
    window.open("http://sealang.net/search/?q=" + encodeURIComponent(q));
    window.open("http://sealang.net/ojed/search.php?search=" + encodeURIComponent(q));
}
</script>

</body>
</html>
