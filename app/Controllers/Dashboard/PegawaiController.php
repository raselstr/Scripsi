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

    public function pegawai_form($id='')
    {
        $pegawaimodel = new \App\Models\PegawaiModel();

        if($id!='')
        {
            $getData = $pegawaimodel->asArray()->find($id);
        }
        else {
            $getData = null;
        }

        $data['getData'] = $getData;
        
        $data['title'] = 'Form Tambah Pegawai';

        if (! $this->request->is('post')) {
            return view('dashboard/pegawai/pegawai_form', $data);
        }
        $rules = [
            'nip' => [
                'rules' => 'required|min_length[18]|is_unique[pegawai.nip]',
                'errors' => [
                    'required' => 'nip tidak boleh kosong',
                    'min_length' => 'Minimal 18 karekter',
                    'is_unique' => 'NIP sudah ada'
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
            'foto' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[foto]',
                    'is_image[foto]',
                    'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[foto,100]',
                    'max_dims[foto,1024,768]',
                ],
                'errors' => [
                    'uploaded' => 'Data harus diupload',
                ]
            ],
            
        ];

        if (! $this->validate($rules)){
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
 
        //upload foto
        $file = $this->request->getFile('foto');
        
        if($file->isValid() && ! $file->hasMoved()){
            $namafoto = $file->getRandomName();
            $file->move(FCPATH, 'upload/'. $namafoto);
            $data['foto'] = $namafoto;    
        }    
        
        
        $save = $pegawaimodel->save($data);

        if ($save){
            return redirect()->to('pegawai')->with('success','Data Berhasil di Simpan');
        } else {
           
            $pegawaimodel->save($this->request->getPost('id_pegawai'));
        } 
        // $data = $this->request->getPost(array_keys($rules));
        // $this->PegawaiModel->save($data);
        // return redirect()->to('pegawai')->with('success','Data Berhasil disimpan');

    }
    
    public function delete($id_pegawai)
    {
        $pegawaimodel = new \App\Models\PegawaiModel();
        // dd($id_pegawai);
        // $pegawai = $this->PegawaiModel->find($id_pegawai);
    //    $pegawaimodel->delete($id_pegawai);
       $pegawaimodel->delete($id_pegawai);
        return redirect()->back()->with('success','Data Berhasil hapus');
    }
}
