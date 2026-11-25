<?php

namespace App\Models\Analitie;

use CodeIgniter\Model;

class AccessModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'accesses';

    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $useTimestamps    = true;
    protected $dateFormat       = 'datetime';
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $returnType       = 'array';

    protected $allowedFields    = [
        'user_id',
        'role_id',
        'order',
    ];

    public function getRoles($username)
    {
        return $this
            ->select([
                'roles.role AS role',
                'roles.nama AS role_name',
            ])
            ->join('users', 'users.id = accesses.user_id', 'left')
            ->join('roles', 'roles.id = accesses.role_id', 'left')
            ->where('users.username', $username)
            ->orderBy('accesses.order', 'asc')
            ->findAll();
    }
}
