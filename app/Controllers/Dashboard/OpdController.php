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
        // dd($getData);
        $data['getData'] = $getData;
        $data['page'] = 'Form ' . $this->title;
        return view('dashboard/opd/FormView', $data);
    }

    public function save()
    {
        $opdmodel = new \App\Models\OpdModel();
        
        if (! $this->request->is('post')) {
            return view('dashboard/opd/formView');
        }
        
        $rules = $opdmodel->getValidationRules();
        $error = $opdmodel->getValidationMessages();
        
        if (! $this->validate($rules,$error)){
            return redirect()->back()->withInput();
        }

        $save = $opdmodel->save($this->request->getPost());
        if ($save){
            return redirect()->to('opd')->with('success','Data Berhasil di Simpan');
        } else {
           
            $opdmodel->save($this->request->getPost('id_opd'));
        }

        // $data = $this->request->getPost(array_keys($rules));
        // // dd($data);
        // $opdmodel->save($data);
    }

   


    // public function save()
    // {
    //     $opdmodel = new \App\Models\OpdModel();
    //     // $save = $opdmodel->save($this->request->getPost());

    //     if (! $this->request->is('post')) {
    //         return view('dashboard/opd/formView');
    //     }

    //     $rules = $opdmodel->getValidationRules();
    //     $error = $opdmodel->getValidationMessages();

    //     if (! $this->validate($rules,$error)){
    //         return redirect()->back()->withInput();
    //     }

    //     $data = $this->request->getPost(array_keys($rules));
    //     // dd($data);
    //     $opdmodel->save($data);
    //     return redirect()->to('opd')->with('success','Data Berhasil disimpan');
    // }

    public function delete($id_opd)
    {
        $this->OpdModel->delete($id_opd);
        return redirect()->back()->with('success','Data Berhasil hapus');
    }
}
