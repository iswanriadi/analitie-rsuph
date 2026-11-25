<script src="<?= base_url('third_party/adminlte-3.2.0/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('third_party/adminlte-3.2.0/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?= base_url('third_party/adminlte-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('third_party/adminlte-3.2.0/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('third_party/adminlte-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('third_party/adminlte-3.2.0/plugins/select2/js/select2.full.min.js'); ?>"></script>
<script src="<?= base_url('third_party/adminlte-3.2.0/plugins/select2/js/i18n/id.js'); ?>"></script>
<script src="<?= base_url('third_party/adminlte-3.2.0/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js'); ?>"></script>
<script src="<?= base_url('third_party/adminlte-3.2.0/plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>
<script src="<?= base_url('third_party/adminlte-3.2.0/plugins/chart.js/Chart.min.js'); ?>"></script>
<script src="<?= base_url('third_party/adminlte-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
<script src="<?= base_url('third_party/adminlte-3.2.0/plugins/bs-custom-file-input/bs-custom-file-input.min.js'); ?>"></script>
<script src="<?= base_url('third_party/adminlte-3.2.0/dist/js/adminlte.min.js'); ?>"></script>
<script src="<?= base_url('third_party/datatables-rowsgroup-1.0.0/dataTables.rowsGroup.js'); ?>"></script>
<script src="<?= base_url('third_party/flatpickr-4.6.13/dist/flatpickr.min.js'); ?>"></script>
<script src="<?= base_url('third_party/flatpickr-4.6.13/dist/l10n/id.js'); ?>"></script>
<script src="<?= base_url('third_party/moment-2.30.1/moment.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/custom.js?v=' . filemtime(FCPATH . 'assets/js/custom.js')); ?>"></script>
<?= $this->renderSection('js'); ?>