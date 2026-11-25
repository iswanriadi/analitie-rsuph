<?php

namespace App\Models\Analitie;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'employees';

    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $useTimestamps    = true;
    protected $dateFormat       = 'datetime';
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $returnType       = 'array';

    protected $allowedFields    = [
        'nip',
        'nik',
        'nama',
        'gelar_depan',
        'gelar_belakang',
        'email',
        'no_hp',
    ];
}
