<?php

namespace App\Libraries;

class Acl
{
    public static $permission = [
        'master' => [
            'beranda'                                       => ['read'],
            'profil'                                        => ['read',           'update'],
            'password'                                      => ['read',           'update'],
        ],
        'super' => [
            'beranda'                                       => ['read'],
            'profil'                                        => ['read',           'update'],
            'password'                                      => ['read',           'update'],
        ],
        'guest' => [
            'beranda'                                       => ['read'],
        ],
    ];

    public static $sidebarMenu = [
        'master' => [
            [
                'nama'  => 'Beranda',
                'icon'  => 'fa-solid fa-home',
                'url'   => 'beranda',
            ],
        ],
        'super' => [
            [
                'nama'  => 'Beranda',
                'icon'  => 'fa-solid fa-home',
                'url'   => 'beranda',
            ],
        ],
        'guest' => [
            [
                'nama'  => 'Beranda',
                'icon'  => 'fa-solid fa-home',
                'url'   => 'beranda',
            ],
        ],
    ];
}
