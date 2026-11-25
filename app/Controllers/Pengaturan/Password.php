<?php

namespace App\Controllers\Pengaturan;

use App\Controllers\BaseController;
use App\Models\Analitie\UserModel;

class Password extends BaseController
{
    protected UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if (!request()->isAJAX()) {
            return view('pengaturan/password/index');
        }
    }

    public function update()
    {
        if (!request()->isAJAX()) {
            return $this->response->setStatusCode(403);
        }

        helper('password');

        $rules = [
            'password-lama' => [
                'label' => 'Password lama',
                'rules' => 'required',
            ],
            'password-baru' => [
                'label' => 'Password baru',
                'rules' => 'required|min_length[8]',
            ],
            'konfirmasi-password' => [
                'label' => 'Konfirmasi password',
                'rules' => 'required|matches[password-baru]',
            ],
        ];
        service('validation')->setRules($rules);

        $data = $this->request->getJSON(true);
        if (!service('validation')->run($data)) {
            return $this->response->setJSON([
                'message' => 'Data tidak sesuai',
                'errors'  => service('validation')->getErrors(),
            ])->setStatusCode(400);
        }

        $user = $this->userModel->where('username', session()->get('username'))->first();
        if (!$user || !verify_password($data['password-lama'], $user['password'])) {
            return $this->response->setJSON([
                'message' => 'Password lama tidak sesuai',
            ])->setStatusCode(400);
        }

        $this->userModel->update($user['id'], [
            'password' => hash_password($data['password-baru']),
        ]);

        if ($this->userModel->db->affectedRows() > 0) {
            service('logService')->query($this->userModel->db->getLastQuery());
            return $this->response->setJSON([
                'message' => 'Password berhasil diganti',
            ]);
        }

        return $this->response->setJSON([
            'message' => 'Password gagal diganti',
        ])->setStatusCode(400);
    }
}
