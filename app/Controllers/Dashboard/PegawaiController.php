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
}
