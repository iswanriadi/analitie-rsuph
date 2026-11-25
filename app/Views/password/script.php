<script>
    $(document).ready(function() {
        $(document).on('click', '#btn-password-lama', function() {
            if ($('#password-lama').attr('type') === 'text') {
                $('#password-lama').attr('type', 'password');
                $('#btn-password-lama').attr('title', 'Tampilkan password');
                $('#icon-password-lama').removeClass('fa-eye');
                $('#icon-password-lama').addClass('fa-eye-slash');
            } else if ($('#password-lama').attr('type') === 'password') {
                $('#password-lama').attr('type', 'text');
                $('#btn-password-lama').attr('title', 'Sembunyikan password');
                $('#icon-password-lama').removeClass('fa-eye-slash');
                $('#icon-password-lama').addClass('fa-eye');
            }
        });

        $(document).on('click', '#btn-password-baru', function() {
            if ($('#password-baru').attr('type') === 'text') {
                $('#password-baru').attr('type', 'password');
                $('#btn-password-baru').attr('title', 'Tampilkan password');
                $('#icon-password-baru').removeClass('fa-eye');
                $('#icon-password-baru').addClass('fa-eye-slash');
            } else if ($('#password-baru').attr('type') === 'password') {
                $('#password-baru').attr('type', 'text');
                $('#btn-password-baru').attr('title', 'Sembunyikan password');
                $('#icon-password-baru').removeClass('fa-eye-slash');
                $('#icon-password-baru').addClass('fa-eye');
            }
        });

        $(document).on('click', '#btn-konfirmasi-password', function() {
            if ($('#konfirmasi-password').attr('type') === 'text') {
                $('#konfirmasi-password').attr('type', 'password');
                $('#btn-konfirmasi-password').attr('title', 'Tampilkan password');
                $('#icon-konfirmasi-password').removeClass('fa-eye');
                $('#icon-konfirmasi-password').addClass('fa-eye-slash');
            } else if ($('#konfirmasi-password').attr('type') === 'password') {
                $('#konfirmasi-password').attr('type', 'text');
                $('#btn-konfirmasi-password').attr('title', 'Sembunyikan password');
                $('#icon-konfirmasi-password').removeClass('fa-eye-slash');
                $('#icon-konfirmasi-password').addClass('fa-eye');
            }
        });

        $(document).on('click', '#btn-edit', function() {
            editData();
        });

        function clearErrors() {
            $('.is-invalid').removeClass('is-invalid');
            $('.invalid-feedback').text('');
        }

        async function editData() {
            try {
                loader.show();
                clearErrors();

                const response = await fetch('<?= base_url(); ?>password', {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': csrfMeta.getAttribute('content'),
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(Object.fromEntries(new FormData($('#form-edit')[0]))),
                });

                const result = await response.json();

                if (response.status === 200) {
                    swalMessage('success', result.message);
                } else if (response.status === 400) {
                    $.each(result?.errors, function(key, value) {
                        let el = $(`#${key}`);
                        el.addClass('is-invalid');
                        el.siblings('.invalid-feedback').text(value);
                    });
                    swalMessage('warning', result.message);
                } else {
                    swalMessage('error', result.message);
                }
            } catch (error) {
                swalMessage('error');
            } finally {
                loader.hide();
            }
        }
    });
</script>