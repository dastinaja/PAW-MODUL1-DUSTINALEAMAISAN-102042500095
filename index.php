<?php
// nama toko
$nama_toko = "Cia Store";

// data produk
$produk = [
    ["nama" => "Laptop Productivity", "kategori" => "Laptop", "harga" => 8500000, "stok" => 3],
    ["nama" => "Monitor 24 Inch", "kategori" => "Monitor", "harga" => 1800000, "stok" => 4],
    ["nama" => "Keyboard Mechanical", "kategori" => "Aksesoris", "harga" => 750000, "stok" => 10],
    ["nama" => "Mouse Wireless", "kategori" => "Aksesoris", "harga" => 250000, "stok" => 0],
    ["nama" => "Headset Gaming", "kategori" => "Audio", "harga" => 1200000, "stok" => 2],
    ["nama" => "Webcam HD", "kategori" => "Aksesoris", "harga" => 450000, "stok" => 0]
];

// total produk
$total_produk = count($produk);

// format rupiah
function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $nama_toko; ?> - Katalog Produk</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header class="navbar">
    <div class="logo"><?php echo $nama_toko; ?></div>
    <nav>
        <a href="#">Home</a>
        <a href="#produk">Products</a>
        <a href="#">About</a>
    </nav>
</header>

<section class="hero">
    <div class="hero-content">
        <p class="hero-label"><?php echo strtoupper($nama_toko); ?></p>
        <h1>Simple Tech Store.</h1>
        <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
        <a href="#produk" class="hero-button">Lihat Produk</a>
    </div>
</section>

<main class="container">
    <section class="katalog-header">
        <div>
            <p class="section-label">OUR PRODUCTS</p>
            <h2>Katalog Produk</h2>
        </div>
        <div class="total-produk">Total Produk: <?php echo $total_produk; ?></div>
    </section>

    <section id="produk" class="product-grid">
        <?php foreach ($produk as $item) { ?>
            <?php
                $harga_asli = $item["harga"];
                $diskon = 0;
                $harga_akhir = $harga_asli;

                
                if ($harga_asli >= 1000000) {
                    $diskon = 10;
                    $harga_akhir = $harga_asli - ($harga_asli * 0.10);
                }

                $tersedia = $item["stok"] > 0;
            ?>

            <article class="product-card">
                <p class="product-kategori">
                    <?php echo $item["kategori"]; ?>
                    <?php if ($diskon > 0) { ?>
                        <span class="diskon-badge">DISKON <?php echo $diskon; ?>%</span>
                    <?php } ?>
                </p>

                <h3><?php echo $item["nama"]; ?></h3>

                <?php if ($diskon > 0) { ?>
                    <p class="harga-normal"><?php echo formatRupiah($harga_asli); ?></p>
                <?php } ?>

                <p class="harga"><?php echo formatRupiah($harga_akhir); ?></p>

                <div class="product-footer">
                    <span class="stok">Stok: <?php echo $item["stok"]; ?></span>
                    <?php if ($tersedia) { ?>
                        <span class="status tersedia">Tersedia</span>
                    <?php } else { ?>
                        <span class="status habis">Stok Habis</span>
                    <?php } ?>
                </div>

                <?php if ($tersedia) { ?>
                    <button class="btn-beli">Beli Sekarang</button>
                <?php } else { ?>
                    <button class="btn-beli disabled" disabled>Stok Habis</button>
                <?php } ?>
            </article>
        <?php } ?>
    </section>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> <?php echo $nama_toko; ?>. All rights reserved.</p>
</footer>

</body>
</html>