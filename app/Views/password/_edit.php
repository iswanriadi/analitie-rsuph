<div class="card card-primary card-outline" id="card-edit">
    <div class="card-header">
        <h5 class="card-title">Ganti Password</h5>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <div class="row">
            <form id="form-edit" class="col-12">
                <div class="form-group">
                    <label class="mb-0">Password Lama</label>
                    <div class="input-group">
                        <input type="password" name="password-lama" id="password-lama" class="form-control" />
                        <div class="input-group-append">
                            <span class="input-group-text" id="btn-password-lama" title="Tampilkan password">
                                <i class="fa-solid fa-eye-slash" id="icon-password-lama"></i>
                            </span>
                        </div>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="mb-0">Password Baru</label>
                    <div class="input-group">
                        <input type="password" name="password-baru" id="password-baru" class="form-control" />
                        <div class="input-group-append">
                            <span class="input-group-text" id="btn-password-baru" title="Tampilkan password">
                                <i class="fa-solid fa-eye-slash" id="icon-password-baru"></i>
                            </span>
                        </div>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="mb-0">Konfirmasi Password</label>
                    <div class="input-group">
                        <input type="password" name="konfirmasi-password" id="konfirmasi-password" class="form-control" />
                        <div class="input-group-append">
                            <span class="input-group-text" id="btn-konfirmasi-password" title="Tampilkan password">
                                <i class="fa-solid fa-eye-slash" id="icon-konfirmasi-password"></i>
                            </span>
                        </div>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
            </form>
            <?php if (acl_permission(session()->get('role'), 'profil', 'update')) : ?>
                <div class="col-12 mt-2">
                    <button type="button" class="btn btn-primary btn-block" id="btn-edit">Ganti Password</button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>