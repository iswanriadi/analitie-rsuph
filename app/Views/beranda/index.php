<?= $this->extend('layout/main'); ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="m-0">Beranda</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                Selamat datang di aplikasi <?= getenv('APP_TITLE'); ?>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>