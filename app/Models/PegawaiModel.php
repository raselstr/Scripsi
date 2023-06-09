<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pegawai';
    protected $primaryKey       = 'id_pegawai';
    protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    // protected $protectFields    = true;
    protected $allowedFields    = ['nip','nama','eselon', 'id_opd'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_input';
    protected $updatedField  = 'tanggal_update';
    protected $deletedField  = 'tanggal_hapus';

    // Validation
    // protected $validationRules      = [
    //     'nip' => 'required',
    //     'nama' => 'required',
    //     'eselon' => 'required',
    // ];
    // protected $validationMessages   = [
    //     'nip' => [
    //         'required' => 'nip tidak boleh kosong'
    //     ],
            
    // ];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

//     // Callbacks
//     protected $allowCallbacks = true;
//     protected $beforeInsert   = [];
//     protected $afterInsert    = [];
//     protected $beforeUpdate   = [];
//     protected $afterUpdate    = [];
//     protected $beforeFind     = [];
//     protected $afterFind      = [];
//     protected $beforeDelete   = [];
//     protected $afterDelete    = [];



    function getAllquery()
    {
        $builder = $this->db->table('pegawai');
        $builder->join('opd','opd.id_opd = pegawai.id_opd');
        $query = $builder->where('pegawai.tanggal_hapus',null)->get();
        return $query->getResult();

    }
}
