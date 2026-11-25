<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', function () {
    return redirect()->to('beranda');
});

$routes->get('beranda', 'Beranda::index', ['filter' => 'acl:beranda,read']);

$routes->get('auth', 'Auth::index');
$routes->post('auth', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->get('auth/role', 'Auth::roleIndex');
$routes->post('auth/role', 'Auth::roleUpdate');

$routes->get('profil', 'Pengaturan\Profil::index', ['filter' => 'acl:profil,read,true']);
$routes->get('profil', 'Pengaturan\Profil::show', ['filter' => 'acl:profil,read,true']);
$routes->patch('profil', 'Pengaturan\Profil::update', ['filter' => 'acl:profil,update,true']);

$routes->get('password', 'Pengaturan\Password::index', ['filter' => 'acl:password,read,true']);
$routes->patch('password', 'Pengaturan\Password::update', ['filter' => 'acl:password,update,true']);

$routes->add('(:any)', function () {
    helper('acl');
    if (request()->isAJAX()) {
        return response()->setJSON([
            'success' => false,
            'message' => 'Terjadi kesalahan, fitur tidak tersedia',
        ])->setStatusCode(404);
    }
    return response()->setBody(view('layout/error/error404'));
});
