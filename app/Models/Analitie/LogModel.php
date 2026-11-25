<?php

namespace App\Models\Analitie;

use CodeIgniter\Model;

class LogModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'logs';

    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $useTimestamps    = true;
    protected $dateFormat       = 'datetime';
    protected $createdField     = 'created_at';
    protected $updatedField     = '';

    protected $returnType       = 'array';

    protected $allowedFields    = [
        'username',
        'ip_address',
        'user_agent',
        'query_id',
        'query',
        'note',
    ];
}
