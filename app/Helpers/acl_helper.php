<?php

use App\Libraries\Acl;

if (!function_exists('acl_permission')) {
    function acl_permission($role, $route, $action)
    {
        $permission = Acl::$permission;
        return isset($permission[$role][$route]) && in_array($action, $permission[$role][$route]);
    }
}

if (!function_exists('acl_sidebar_menu')) {
    function acl_sidebar_menu($role)
    {
        return Acl::$sidebarMenu[$role];
    }
}
