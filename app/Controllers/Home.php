<?php

namespace App\Controllers;
use App\Models\M_data;

class Home extends BaseController{
    public function __construct(){
        $this->M_data = new M_data();
        $this->request = \Config\Services::request();
    }
    public function index(){
        echo view('template/head');
        echo view('beranda');
        echo view('template/foot');
    }

    public function tabel(){
        $data['allData'] = $this->M_data->all();
        echo view('tabel',$data);
    }
    public function edit(){
        $id_data = $this->request->getPost('id_data'); 
        $data['detail'] = $this->M_data->detail($id_data);
        echo view('edit',$data);
    }
}
