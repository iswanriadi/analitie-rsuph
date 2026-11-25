<div class="card card-primary card-outline" id="card-edit">
    <div class="card-header">
        <h5 class="card-title">Profil</h5>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <div class="row">
            <form id="form-edit" class="col-12">
                <div class="form-group">
                    <label class="mb-0">NIP</label>
                    <input type="text" id="nip" name="nip" class="form-control" disabled />
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label class="mb-0">NIK</label>
                    <input type="text" id="nik" name="nik" class="form-control" />
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label class="mb-0">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" disabled />
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label class="mb-0">Gelar Depan</label>
                    <input type="text" id="gelar-depan" name="gelar-depan" class="form-control" />
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label class="mb-0">Gelar Belakang</label>
                    <input type="text" id="gelar-belakang" name="gelar-belakang" class="form-control" />
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label class="mb-0">Email</label>
                    <input type="email" id="email" name="email" class="form-control" />
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label class="mb-0">No. HP</label>
                    <input type="tel" id="no-hp" name="no-hp" class="form-control" />
                    <div class="invalid-feedback"></div>
                </div>
            </form>
            <?php if (acl_permission(session()->get('role'), 'profil', 'update')) : ?>
                <div class="col-12 mt-2">
                    <button type="button" class="btn btn-primary btn-block" id="btn-edit">Simpan</button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>