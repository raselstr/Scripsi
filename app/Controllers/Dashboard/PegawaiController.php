<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;

class PegawaiController extends BaseController
{
    public  function __construct(){
        helper(['url', 'form']);
    }
    

    public function index()
    {
       
        $data = [
        
        'title' => 'Data Pegawai',
        'pegawai' => $this->PegawaiModel->findAll(),
        ];

        return view('dashboard/pegawai/index', $data);
    }

    public function pegawai_form()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'title' => 'Tambah Pegawai',
        ];

        return view('dashboard/pegawai/pegawai_form', $data);
    }

    public function tambah()
    {

        helper(['form']);

        $validation = $this->validate([
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
        ]);
            $data = [
                'nip' => $this->request->getVar('nip'),
                'nama' => $this->request->getVar('nama'),
                'eselon' => $this->request->getVar('eselon'),
            ];

        if(!$validation) {
            echo view('dashboard/pegawai/pegawai_form', [
                'validation' => $this->validator
            ]);
        }else{
            $this->PegawaiModel->save($data);
            return redirect('pegawai');

        }

            
        // if(!$validation){
        //     session()->setFlashdata('error',$this->validator->listErrors());
        //     return redirect()->back()->withInput();
        // }else{
        // }
    }
  
}
