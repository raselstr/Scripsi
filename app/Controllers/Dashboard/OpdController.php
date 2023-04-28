<?php

namespace App\Controllers\Dashboard;
use App\Models\OpdModel;
use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;



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
        $opdmodel = new \App\Models\OpdModel();
        $opdmodel->delete($id_opd);
        return redirect()->back()->with('success','Data Berhasil hapus');
    }

    public function export()
    {
        $opdmodel = new \App\Models\OpdModel();
        $opd = $opdmodel->findAll();

        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'No');
        $activeWorksheet->setCellValue('B1', 'Nama OPD');
        $activeWorksheet->setCellValue('C1', 'Kode OPD');

        $kolom_mulai = 2;

        foreach ($opd as $key => $value){
            $activeWorksheet->setCellValue('A'.$kolom_mulai, ($kolom_mulai-1));
            $activeWorksheet->setCellValue('B'.$kolom_mulai, $value->nama_opd);
            $activeWorksheet->setCellValue('C'.$kolom_mulai, $value->kode_opd);
            $kolom_mulai++;
        }

        //Tulisan Judul BOLD
        $activeWorksheet->getStyle('A1:C1')->getFont()->setBold(true);

        //Warna Judul Kolom
        $activeWorksheet->getStyle('A1:C1')->getFill()->setFillType(Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFFF00');
        
        //Border
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $activeWorksheet->getStyle('A1:C'.($kolom_mulai-1))->applyFromArray($styleArray);

        //Autosize kolom
        $activeWorksheet->getColumnDimension('A')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('B')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('C')->setAutoSize(true);


        //membuat file XLSx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data OPD';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');  
    }

    public function import()
    {
        $opdmodel = new \App\Models\OpdModel();

        $file = $this->request->getFile('file_excel');
        $extension = $file->getClientExtension();
        if ($extension == 'xlsx' || $extension == 'xls'){
            if($extension == 'xls'){
                $reader = new Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($file);
            $opd = $spreadsheet->getActiveSheet()->toArray();
            // print_r($opd);
            foreach ($opd as $key=>$value){
                if($key == 0){
                    continue;
                }
                $data = [
                    'nama_opd' => $value[1],
                    'kode_opd' => $value[2],
                ];
                $this->OpdModel->insert($data);
            }
            return redirect()->back()->with('success','File Berhasil di Import');

        } else {
            return redirect()->back()->with('error','Format File Bukan Excel');
        }
    }
}
