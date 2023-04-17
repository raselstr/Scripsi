<?php

namespace App\Models;

use CodeIgniter\Model;

class OpdModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'opd';
    protected $primaryKey       = 'id_opd';
    protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['nama_opd'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_input';
    protected $updatedField  = 'tanggal_update';
    protected $deletedField  = 'tanggal_hapus';

    // Validation
    protected $validationRules      = [
        'nama_opd' => 'required|min_length[5]',
    ];
    protected $validationMessages   = [
        'nama_opd' => [
            'required' => 'Nama OPD tidak boleh kosong',
            'min_length' => 'Harus lebih dari 5 karakter',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
}
