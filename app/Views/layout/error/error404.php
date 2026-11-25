<?= $this->extend('layout/main'); ?>

<?= $this->section('content') ?>
<div class="error-page text-center">
    <div class="text-danger" style="font-size: 8rem; font-weight: 700;">404</div>
    <h3 class="mb-3">Halaman Tidak Ditemukan</h3>
    <p class="text-muted mb-4">Maaf, halaman yang Anda cari tidak tersedia atau sudah dipindahkan</p>
    <a href="<?= base_url() ?>" class="btn btn-primary">Kembali ke Halaman Utama</a>
</div>
<?= $this->endSection(); ?>