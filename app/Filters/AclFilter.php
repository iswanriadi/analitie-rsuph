<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AclFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        helper('acl');
        $route  = $arguments[0] ?? null;
        $action = $arguments[1] ?? 'read';
        $isAuth = $arguments[2] ?? false;
        $role   = session()->get('role') ?? 'guest';

        if ($isAuth) {
            if (!session()->get('isAuth')) {
                return redirect()->to('auth');
            }
        }

        if (!$route || !acl_permission($role, $route, $action)) {
            if (request()->isAJAX()) {
                return response()->setJSON([
                    'success' => false,
                    'message' => 'Terjadi kesalahan, fitur tidak tersedia',
                ])->setStatusCode(404);
            }
            return response()->setBody(view('layout/error/error404'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
