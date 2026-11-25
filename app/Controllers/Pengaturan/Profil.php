<?php

namespace App\Controllers\Pengaturan;

use App\Controllers\BaseController;
use App\Models\Analitie\EmployeeModel;

class Profil extends BaseController
{
    protected EmployeeModel $employeeModel;

    public function __construct()
    {
        $this->employeeModel = new EmployeeModel();
    }

    public function index()
    {
        if (!request()->isAJAX()) {
            return view('pengaturan/profil/index');
        }

        $data = $this->employeeModel
            ->select(['nip', 'nik', 'nama', 'gelar_depan', 'gelar_belakang', 'email', 'no_hp'])
            ->where('nip', session()->get('username'))->first();
        if ($data) {
            return $this->response->setJSON([
                'data' => $data,
            ]);
        }
        return $this->response->setJSON([
            'message' => 'Data tidak ditemukan',
        ])->setStatusCode(400);
    }

    public function update()
    {
        if (!request()->isAJAX()) {
            return $this->response->setStatusCode(403);
        }

        $rules = [
            'nik' => [
                'label' => 'NIK',
                'rules' => 'required|numeric|exact_length[16]',
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
            ],
            'no-hp' => [
                'label' => 'No. HP',
                'rules' => 'required|regex_match[/^(08|628)[0-9]{8,13}$/]',
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

        $this->employeeModel
            ->where('nip', session()->get('username'))
            ->set([
                'nik'            => $data['nik'],
                'gelar_depan'    => $data['gelar-depan'],
                'gelar_belakang' => $data['gelar-belakang'],
                'email'          => $data['email'],
                'no_hp'          => $data['no-hp'],
            ])
            ->update();

        if ($this->employeeModel->db->affectedRows() > 0) {
            service('logService')->query($this->employeeModel->db->getLastQuery());
            return $this->response->setJSON([
                'message' => 'Profil berhasil diedit',
            ]);
        }

        return $this->response->setJSON([
            'message' => 'Profil gagal diedit',
        ])->setStatusCode(400);
    }
}
