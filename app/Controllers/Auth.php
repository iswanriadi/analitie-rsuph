<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Analitie\AccessModel;
use App\Models\Analitie\UserModel;
use CodeIgniter\Database\BaseConnection;
use Config\Database;

class Auth extends BaseController
{
    protected BaseConnection $db;
    protected UserModel $userModel;
    protected AccessModel $accessModel;

    public function __construct()
    {
        helper('password');
        $this->db          = Database::connect();
        $this->userModel   = new UserModel();
        $this->accessModel = new AccessModel();
    }

    public function index()
    {
        if (session()->get('isAuth')) {
            return redirect()->to('/');
        }
        return view('auth/index');
    }

    public function login()
    {
        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
            ],
        ];
        service('validation')->setRules($rules);

        $data = $this->request->getJSON(true);
        if (!service('validation')->run($data)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Username dan password tidak boleh kosong',
                'errors'  => service('validation')->getErrors(),
            ])->setStatusCode(400);
        }

        $user = $this->userModel->getUserWithName($data['username']);
        if (!$user || !verify_password($data['password'], $user['password'])) {
            service('logService')->auth($data['username'], 'Login gagal (salah)');
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Username dan password tidak sesuai',
                'errors'  => [],
            ])->setStatusCode(400);;
        }

        $roles = $this->accessModel->getRoles($data['username']);
        if (!$roles) {
            service('logService')->auth($data['username'], 'Login gagal (tanpa akses)');
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Username dan password tidak sesuai',
                'errors'  => [],
            ])->setStatusCode(400);;
        }

        service('logService')->auth($data['username'], 'Login sukses');

        session()->set([
            'username' => $user['username'],
            'name'     => $user['gelar_depan'] . $user['nama'] . $user['gelar_belakang'],
            'roles'    => $roles,
            'isAuth'   => true,
            'role'     => $roles[0]['role'],
            'roleName' => $roles[0]['role_name'],
        ]);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Login berhasil',
        ]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function roleIndex()
    {
        if (!count(session()->get('roles')) > 1) {
            return redirect()->to('/');
        }
        return view('auth/index_role');
    }

    public function roleUpdate()
    {
        $data = $this->request->getJSON(true);
        $role = $data['role'];

        if (in_array($role, array_column(session()->get('roles'), 'role'))) {
            $selectedRole = array_values(array_filter(session()->get('roles'), fn($r) => $r['role'] === $role))[0];
            session()->set([
                'role'     => $selectedRole['role'],
                'roleName' => $selectedRole['role_name'],
            ]);
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Role berhasil diganti',
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Role gagal diganti',
        ])->setStatusCode(400);;
    }
}
