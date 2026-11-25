<?= $this->extend('layout/main'); ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="m-0">Ganti Password</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-xs-12">

                <?= $this->include('pengaturan/password/_edit'); ?>

            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('css'); ?>
<?= $this->include('pengaturan/password/style'); ?>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<?= $this->include('pengaturan/password/script'); ?>
<?= $this->endSection(); ?>