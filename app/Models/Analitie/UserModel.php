<?php

namespace App\Models\Analitie;

use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';

    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $useTimestamps    = true;
    protected $dateFormat       = 'datetime';
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $returnType       = 'array';

    protected $allowedFields    = [
        'username',
        'password',
        'is_aktif',
    ];

    public function getUserWithName($username)
    {
        return $this
            ->select([
                'users.id AS id',
                'users.username AS username',
                'users.password AS password',
                'employees.nama AS nama',
                'employees.gelar_depan AS gelar_depan',
                'employees.gelar_belakang AS gelar_belakang',
            ])
            ->join('employees', 'employees.nip = users.username', 'left')
            ->where('users.username', $username)
            ->where('users.is_aktif', 1)
            ->first();
    }
}
