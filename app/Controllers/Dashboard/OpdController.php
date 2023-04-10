<?php

namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;

helper(['form']);

class OpdController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'OPD',
            'opd'   => $this->OpdModel->findAll(),
        ];
        return view('dashboard/opd/index', $data);
    }

    public function save()
    {
        $OpdModel = new \App\Models\OpdModel();
        $save = $OpdModel->save($this->request->getVar());
        // session()->getFlashdata('success','Data Berhasil disimpan');
            

        if(!$save){
            //menampilkan data Old
            session()->setFlashdata('hasForm',$this->request->getVar());

            //menampilkan error validation model
            session()->setFlashdata('validation',$OpdModel->errors());
            return redirect()->to('opd'.$this->request->getVar('id'));
        } else {
            return redirect()->back()->with('success','Berhasil disimpan');
        }

        // dd($save);

        // $data = [
        //     'title' => 'OPD',
        //     'nama_opd' => $this->request->getVar('nama_opd'),
        // ];
        // $this->OpdModel->save($data);
        // return redirect('opd');
    }
}
