<!DOCTYPE html>
<html lang="en">

<?= $this->include('layout/section/head'); ?>

<body class="hold-transition login-page">
    <div class="login-box">
        <?= $this->renderSection('content'); ?>
    </div>

    <div id="page-loader" class="page-loader d-none">
        <div class="text-center">
            <div class="spinner-border text-primary"></div>
            <div class="mt-3 font-weight-bold">Loading...</div>
        </div>
    </div>

    <footer class="main-footer fixed-bottom m-0 text-center">
        <?= '&copy; 2026' . (date('Y') > 2026 ? '-' . date('Y') : '') . ' <strong>' . getenv('APP_FOOTER') . '</strong>'; ?>
    </footer>

    <?= $this->include('layout/section/tail'); ?>
</body>

</html>