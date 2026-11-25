<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="#" class="nav-link" role="button" data-widget="pushmenu"><i class="fa-solid fa-bars"></i></a>
        </li>
    </ul>
    <?php if (session()->get('isAuth')): ?>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link p-2 dropdown-toggle" data-toggle="dropdown" style="display: flex; align-items: center;">
                    <span class="mr-2" style="flex-direction: column; align-items: flex-end; float: left;"><strong><?= session()->get('name') . (count(session()->get('roles')) > 1 ? ' (' . (session()->get('roleName') ?? '<span class="font-italic">Belum dipilih</span>') . ')' : '') . '<br>' . session()->get('username'); ?></strong></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" style="min-width: 200px;">
                    <?php if (acl_permission(session()->get('role'), 'profil', 'read')): ?>
                        <a href="<?= base_url(); ?>profil" class="dropdown-item">
                            Profil
                            <span class="float-right"><i class="fa-solid fa-address-card"></i></span>
                        </a>
                    <?php endif; ?>
                    <?php if (acl_permission(session()->get('role'), 'password', 'update')): ?>
                        <a href="<?= base_url(); ?>password" class="dropdown-item">
                            Ganti Password
                            <span class="float-right"><i class="fa-solid fa-key"></i></span>
                        </a>
                    <?php endif; ?>
                    <?php if (count(session()->get('roles')) > 1): ?>
                        <a href="<?= base_url(); ?>auth/role" class="dropdown-item">
                            Ganti Role
                            <span class="float-right"><i class="fa-solid fa-user-tag"></i></span>
                        </a>
                    <?php endif; ?>
                    <?php if (acl_permission(session()->get('role'), 'profil', 'read') || acl_permission(session()->get('role'), 'password', 'update') || count(session()->get('roles')) > 1): ?>
                        <div class="dropdown-divider"></div>
                    <?php endif; ?>
                    <a href="<?= base_url(); ?>logout" class="dropdown-item bg-danger">
                        Logout
                        <span class="float-right"><i class="fa-solid fa-right-from-bracket"></i></span>
                    </a>
                </div>
            </li>
        </ul>
    <?php else: ?>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="<?= base_url(); ?>auth" class="nav-link p-2">
                    <span class="mr-2" style="flex-direction: column; align-items: flex-end; float: left;"><strong>Login</strong></span>
                </a>
            </li>
        </ul>
    <?php endif; ?>
</nav>