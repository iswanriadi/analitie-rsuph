<!DOCTYPE html>
<html lang="en">

<?= $this->include('layout/section/head'); ?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?= $this->include('layout/section/navbar'); ?>

        <?= $this->include('layout/section/sidebar_menu'); ?>

        <div class="content-wrapper">
            <?= $this->renderSection('content'); ?>
        </div>

        <div id="page-loader" class="page-loader d-none">
            <div class="text-center">
                <div class="spinner-border text-primary"></div>
                <div class="mt-3 font-weight-bold">Loading...</div>
            </div>
        </div>

        <footer class="main-footer">
            <?= '&copy; 2026' . (date('Y') > 2026 ? '-' . date('Y') : '') . ' <strong>' . getenv('APP_FOOTER') . '</strong>'; ?>
        </footer>
    </div>

    <?= $this->include('layout/section/tail'); ?>
</body>

</html>