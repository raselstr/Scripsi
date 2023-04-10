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

    public function create()
    {
        $data = [
            'title' => 'OPD',
            'nama_opd' => $this->request->getVar('nama_opd'),
        ];
        $this->OpdModel->save($data);
        return redirect('opd');
    }
}
