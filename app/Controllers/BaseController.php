<?php

namespace App\Controllers;

use App\Models\ReferensiModel;
use App\Services\KamusService;
use App\Services\ValidasiService;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

abstract class BaseController extends Controller
{
    protected ReferensiModel $referensiModel;
    protected KamusService $kamusService;
    protected ValidasiService $validasiService;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        $this->helpers = ['acl', 'hashids'];

        parent::initController($request, $response, $logger);

        $this->referensiModel  = new ReferensiModel();
        $this->kamusService    = new KamusService();
        $this->validasiService = new ValidasiService();
    }

    public function dtResponse($code, $message, $post, $data = null, $extra = null)
    {
        $response = [
            'message'         => $message,
            'draw'            => intval($post['draw']),
            'recordsTotal'    => $code === 200 ? $data['countAll'] : 0,
            'recordsFiltered' => $code === 200 ? $data['countFiltered'] : 0,
            'data'            => $code === 200 ? $data['data'] : [],
            'extra'           => $extra,
        ];

        return $this->response->setJSON($response)->setStatusCode($code);
    }
}
