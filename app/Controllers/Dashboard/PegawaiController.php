<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;

class PegawaiController extends BaseController
{
    public function index()
    {
        helper(['form']);
        $data = [
        'title' => 'Data Pegawai',
        'pegawai' => $this->PegawaiModel->findAll(),
        ];

        return view('dashboard/pegawai/index', $data);
    }

    public function pegawai_form()
    {
        $data = [
            'title' => 'Tambah Pegawai',
        ];

        return view('dashboard/pegawai/pegawai_form', $data);
    }

    public function tambah()
    {
        $PegawaiModel = new PegawaiModel();      
        $data = [
            'title' => 'Tambah Data',
            'nip' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'eselon' => $this->request->getVar('eselon'),
        ];
        $PegawaiModel->save($data);
        return redirect('pegawai');
        
    }
    
}
