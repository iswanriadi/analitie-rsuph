<script>
    $(document).ready(function() {
        loadData();

        $(document).on('click', '#btn-edit', function() {
            editData();
        });

        function clearErrors() {
            $('.is-invalid').removeClass('is-invalid');
            $('.invalid-feedback').text('');
        }

        async function loadData() {
            try {
                loader.show();

                const response = await fetch('<?= base_url(); ?>profil', {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                });

                const result = await response.json();

                if (response.status !== 200) {
                    swalMessage(response.status === 400 ? 'warning' : 'error', result.message);
                    return;
                }

                $('#nip').val(result.data.nip);
                $('#nik').val(result.data.nik);
                $('#nama').val(result.data.nama);
                $('#gelar-depan').val(result.data.gelar_depan);
                $('#gelar-belakang').val(result.data.gelar_belakang);
                $('#email').val(result.data.email);
                $('#no-hp').val(result.data.no_hp);
            } catch (error) {
                swalMessage('error');
            } finally {
                loader.hide();
            }
        }

        async function editData() {
            try {
                loader.show();
                clearErrors();

                const response = await fetch('<?= base_url(); ?>profil', {
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
                    await loadData();
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