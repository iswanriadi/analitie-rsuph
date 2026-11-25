<?php

$sidebarMenu = acl_sidebar_menu(session()->get('role') ?? 'guest');

function getChildUrl($sidebarMenu)
{
    $urls = [];
    foreach ($sidebarMenu as $item) {
        if (isset($item['url'])) {
            $urls[] = $item['url'];
        }
        if (isset($item['child']) && is_array($item['child'])) {
            $urls = array_merge($urls, getChildUrl($item['child']));
        }
    }
    return $urls;
}

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url(); ?>" class="brand-link">
        <img src="<?= base_url('assets/images/' . getenv('APP_SIDEBAR_LOGO')); ?>" alt="logo" class="brand-image elevation-3">
        <span class="brand-text font-weight-normal ml-1"><?= getenv('APP_SIDEBAR_TITLE'); ?></span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-widget="treeview" data-accordion="false">
                <?php foreach ($sidebarMenu as $menu): ?>
                    <?php if (isset($menu['header'])): ?>
                        <li class="nav-header"><?= $menu['header']; ?></li>
                    <?php elseif (!isset($menu['child'])): ?>
                        <li class="nav-item">
                            <a href="<?= base_url($menu['url']); ?>" class="nav-link <?= (uri_string() === $menu['url']) ? 'active' : ''; ?>">
                                <i class="nav-icon <?= $menu['icon']; ?>"></i>
                                <p><?= $menu['nama']; ?></p>
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item <?= (in_array(uri_string(), getChildUrl($menu['child']))) ? 'menu-open' : ''; ?>">
                            <a class="nav-link <?= (in_array(uri_string(), getChildUrl($menu['child']))) ? 'active' : ''; ?>" style="cursor: pointer;">
                                <i class="nav-icon <?= $menu['icon']; ?>"></i>
                                <p><?= $menu['nama']; ?><i class="right fa-solid fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <?php foreach ($menu['child'] as $child): ?>
                                    <?php if (!isset($child['child'])): ?>
                                        <li class="nav-item">
                                            <a href="<?= base_url($child['url']); ?>" class="nav-link <?= (uri_string() === $child['url']) ? 'active' : ''; ?>">
                                                <span class="nav-icon-wrapper">
                                                    <i class="nav-icon fa-solid fa-circle" style="font-size: 0.5em !important;"></i>
                                                </span>
                                                <p><?= $child['nama']; ?></p>
                                            </a>
                                        </li>
                                    <?php else: ?>
                                        <li class="nav-item <?= (in_array(uri_string(), getChildUrl($child['child']))) ? 'menu-open' : ''; ?>">
                                            <a class="nav-link <?= (in_array(uri_string(), getChildUrl($child['child']))) ? '' : ''; ?>" style="cursor: pointer;">
                                                <i class="nav-icon fa-solid fa-circle" style="font-size: 0.5em !important;"></i>
                                                <p><?= $child['nama']; ?><i class="right fa-solid fa-angle-left"></i></p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <?php foreach ($child['child'] as $grand_child): ?>
                                                    <li class="nav-item">
                                                        <a href="<?= base_url($grand_child['url']); ?>" class="nav-link <?= (uri_string() === $grand_child['url']) ? 'active' : ''; ?>" style="padding-left: 25px;">
                                                            <span class="nav-icon-wrapper">
                                                                <i class="nav-icon fa-regular fa-circle" style="font-size: 0.5em !important;"></i>
                                                            </span>
                                                            <p><?= $grand_child['nama']; ?></p>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</aside>