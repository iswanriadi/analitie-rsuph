<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('form');
        const username = document.getElementById('username');
        const password = document.getElementById('password');
        const btnPassword = document.getElementById('btn-password');
        const iconPassword = document.getElementById('icon-password');
        const btnLogin = document.getElementById('btn-login');

        btnPassword.addEventListener('click', () => {
            if (password.type === 'text') {
                password.type = 'password';
                btnPassword.setAttribute('title', 'Tampilkan password');
                iconPassword.classList.remove('fa-eye');
                iconPassword.classList.add('fa-eye-slash');
            } else {
                password.type = 'text';
                btnPassword.setAttribute('title', 'Sembunyikan password');
                iconPassword.classList.remove('fa-eye-slash');
                iconPassword.classList.add('fa-eye');
            }
        });

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            login();
        });

        btnLogin.addEventListener('click', (e) => {
            e.preventDefault();
            login();
        });

        function login() {
            clearErrors();
            loader.show();

            fetch('<?= base_url(); ?>auth', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfMeta.getAttribute('content'),
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(Object.fromEntries(new FormData(form))),
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
                        Object.keys(result.errors).forEach(key => {
                            const el = document.getElementById(key);
                            if (el) {
                                el.classList.add('is-invalid');
                            }
                        });
                        swalMessage('warning', result.message);
                    }
                })
                .catch(error => {
                    loader.hide();
                    error.message ? swalMessage('error', error.message) : swalMessage('error');
                });
        }

        function clearErrors() {
            document.querySelectorAll('.is-invalid').forEach(el => {
                el.classList.remove('is-invalid');
            });
            document.querySelectorAll('.invalid-feedback').forEach(el => {
                el.textContent = '';
            });
        }
    });
</script>