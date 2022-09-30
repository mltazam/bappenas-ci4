<?php

namespace App\Controllers;
class Crud extends BaseController{
    public function __construct(){
        $this->db = \Config\Database::connect();
		$this->request = \Config\Services::request();
    }
    
	public function tambah(){
		$builder = $this->db->table('data');	

		$nama = $this->request->getPost('nama'); 
		$email = $this->request->getPost('email'); 
		$alamat = $this->request->getPost('alamat'); 
		$posisi = $this->request->getPost('posisi'); 

		$data = array(
			'nama' => $nama,
			'email' => $email,
			'alamat' => $alamat,
			'posisi' => $posisi,
		);

		$builder->insert($data);
	}

	public function hapus(){
		$builder = $this->db->table('data');	
		$id_data = $this->request->getPost('id_data'); 

		$builder->where('id_data', $id_data);
		$builder->delete();	
	}
    
	public function edit(){
		$builder = $this->db->table('data');	

		$id_data = $this->request->getPost('id_data'); 
		$nama = $this->request->getPost('nama'); 
		$email = $this->request->getPost('email'); 
		$alamat = $this->request->getPost('alamat'); 
		$posisi = $this->request->getPost('posisi'); 

		$data = array(
			'nama' => $nama,
			'email' => $email,
			'alamat' => $alamat,
			'posisi' => $posisi,
		);
		$builder->where('id_data', $id_data);
		$builder->update($data);
	}
    public function db() {
        var_dump($this->M_data->all());
    }
}