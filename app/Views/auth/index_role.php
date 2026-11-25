<?= $this->extend('layout/main'); ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="m-0">Pilih Role</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    <?php foreach (session()->get('roles') as $role) : ?>
                        <button type="button" class="list-group-item list-group-item-action py-1 text-center btn-role <?= session()->get('role') === $role['role'] ? 'active' : ''; ?>" data-role="<?= $role['role']; ?>"><?= $role['role_name']; ?></button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<?= $this->include('auth/script_role'); ?>
<?= $this->endSection(); ?>