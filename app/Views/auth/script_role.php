<script>
    document.querySelectorAll('.btn-role').forEach(button => {
        button.addEventListener('click', () => {
            loader.show();
            const role = button.dataset.role;

            fetch('<?= base_url(); ?>auth/role', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfMeta.getAttribute('content'),
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        role: role,
                    })
                })
                .then(async response => {
                    const data = await response.json();
                    if (!response.ok) {
                        throw data;
                    }
                    return data;
                })
                .then(result => {
                    loader.hide();
                    if (result.success) {
                        swalMessageWithRedirect('success', result.message, '<?= base_url(); ?>');
                    } else {
                        swalMessage('warning', result.message);
                    }
                })
                .catch(error => {
                    loader.hide();
                    error.message ? swalMessage('error', error.message) : swalMessage('error');
                });
        });
    });
</script>