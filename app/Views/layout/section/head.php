<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="<?= csrf_hash(); ?>" />
    <title><?= getenv('APP_TITLE'); ?></title>
    <link rel="shortcut icon" href="<?= base_url('favicon.ico'); ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('third_party/adminlte-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('third_party/adminlte-3.2.0/plugins/select2/css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('third_party/adminlte-3.2.0/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('third_party/adminlte-3.2.0/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('third_party/adminlte-3.2.0/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('third_party/adminlte-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('third_party/adminlte-3.2.0/dist/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('third_party/fontawesome-6.7.2/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('third_party/flatpickr-4.6.13/dist/flatpickr.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css?v=' . filemtime(FCPATH . 'assets/css/custom.css')); ?>">
    <?= $this->renderSection('css'); ?>
</head>