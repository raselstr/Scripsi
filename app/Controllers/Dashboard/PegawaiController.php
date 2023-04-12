<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;


class PegawaiController extends BaseController
{
    
    public function index()
    {
       
        $data = [
        
        'title' => 'Data Pegawai',
        'pegawai' => $this->PegawaiModel->findAll(),
        ];

        return view('dashboard/pegawai/index', $data);
    }

    protected $helpers = ['form'];

    public function pegawai_form()
    {
        $judul = [
            'title' => 'Form Tambah Pegawai',
        ];

        if (! $this->request->is('post')) {
            return view('dashboard/pegawai/pegawai_form', $judul);
        }
        $rules = [
            'nip' => [
                'rules' => 'required|min_length[18]',
                'errors' => [
                    'required' => 'nip tidak boleh kosong',
                    'min_length' => 'Minimal 18 karekter',
                ],
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama tidak boleh kosong',
                ],
            ],
            'eselon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Eselon tidak boleh kosong',
                ],
            ],
            
        ];

        if (! $this->validate($rules)){
            return redirect()->back()->withInput();
        }
        

        $data = $this->request->getPost(array_keys($rules));
        $this->PegawaiModel->save($data);
        return redirect('pegawai');

    }  
}
