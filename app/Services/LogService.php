<?php

namespace App\Services;

use App\Models\Analitie\LogModel;

class LogService
{
    protected LogModel $model;

    public function __construct()
    {
        $this->model = new LogModel();
    }

    private function baseData()
    {
        return [
            'username'   => session()->get('username') ?? '-',
            'ip_address' => service('request')->getIPAddress(),
            'user_agent' => is_cli() ? 'CLI Seeder' : service('request')->getUserAgent()->getAgentString(),
        ];
    }

    public function system($query, $queryId = null, $note = null)
    {
        return $this->model->insert([
            'username'   => 'system',
            'ip_address' => service('request')->getIPAddress(),
            'user_agent' => is_cli() ? 'CLI Seeder' : service('request')->getUserAgent()->getAgentString(),
            'query_id'   => $queryId,
            'query'      => $query,
            'note'       => $note,
        ]);
    }

    public function query($query, $queryId = null, $note = null)
    {
        return $this->model->insert(array_merge($this->baseData(), [
            'query_id' => $queryId,
            'query'    => $query,
            'note'     => $note,
        ]));
    }

    public function auth($username, $note)
    {
        return $this->model->insert([
            'username'   => $username,
            'ip_address' => service('request')->getIPAddress(),
            'user_agent' => is_cli() ? 'CLI Seeder' : service('request')->getUserAgent()->getAgentString(),
            'note'       => $note,
        ]);
    }

    public function note($note = null)
    {
        return $this->model->insert(array_merge($this->baseData(), [
            'note' => $note,
        ]));
    }
}
