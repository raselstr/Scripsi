<?php

namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;

helper(['form']);

class OpdController extends BaseController
{
    public $title = 'OPD';
    

    public function index()
    {
        $data['title'] = $this->title;
        $data['page'] = 'Data '.$this->title;
        $opdmodel = new \App\Models\OpdModel();
        $data['getData'] = $opdmodel->orderBy('tanggal_update','DESC')
                                        ->findAll();
        return view('dashboard/opd/index', $data);
    }


     public function form($id='')
    {
        $opdmodel = new \App\Models\OpdModel();
        $data['title'] = $this->title;
        
        if($id!='')
        {
            $getData = $opdmodel->asArray()->find($id);
        }
        else {
            $getData = null;
        }
        $data['getData'] = $getData;
        $data['page'] = 'Form ' . $this->title;
        return view('dashboard/opd/FormView', $data);
    }

    public function save()
    {
        $opdmodel = new \App\Models\OpdModel();
        $save = $opdmodel->save($this->request->getPost());
        // dd($save);
        if($save)
        {
            session()->setFlashData(['info' => 'success', 'message' => 'Sukses disimpan']);
            return redirect()->to('opd');
        }
        else {
            session()->setFlashdata('hasForm', $this->request->getPost());
            session()->setFlashdata('validation', $opdmodel->errors());
            return redirect()->to('opd'.$this->request->getPost('id'));
        }
    }
}
