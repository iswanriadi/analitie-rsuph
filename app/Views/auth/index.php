<?= $this->extend('layout/auth'); ?>

<?= $this->section('content'); ?>
<div class="card card-outline card-primary">
    <div class="card-header text-center">
        <div class="mt-1 mb-2">
            <img src="<?= base_url('assets/images/' . getenv('APP_SIDEBAR_LOGO')); ?>" alt="logo" />
        </div>
        <a href="<?= base_url(); ?>" class="h2 font-weight-normal"><?= getenv('APP_AUTH_TITLE')  ?></a>
    </div>
    <div class="card-body">
        <form id="form">
            <div class="input-group">
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" />
                <div class="invalid-feedback"></div>
            </div>
            <div class="input-group mt-3">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
                <div class="input-group-append">
                    <span class="input-group-text" id="btn-password" title="Tampilkan password">
                        <i class="fa-solid fa-eye-slash" id="icon-password"></i>
                    </span>
                </div>
                <div class="invalid-feedback"></div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block" id="btn-login">Login</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('css'); ?>
<?= $this->include('auth/style'); ?>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<?= $this->include('auth/script'); ?>
<?= $this->endSection(); ?>