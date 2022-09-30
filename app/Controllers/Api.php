<?php
 
namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\M_data;
 
class Api extends ResourceController{
    use ResponseTrait;
    // all data
    public function index(){
        echo view('template/head');
        echo view('api');
        echo view('template/foot');
    }

    // all data
    public function all(){
        $model = new M_data();
        $data['data'] = $model->orderBy('id_data', 'ASC')->findAll();
        return $this->respond($data);
    }
    // single data
    public function detail($id_data = null) {
        $model = new M_data();
        $data = $model->where('id_data', $id_data)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
    // create
    public function create(){
        $model = new M_data();
        $data = [
            'nama' => $this->request->getVar('nama'),
            'email'  => $this->request->getVar('email'),
            'posisi' => $this->request->getVar('posisi'),
            'alamat'  => $this->request->getVar('alamat')
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data berhasil ditambahkan.'
            ]
        ];
        return $this->respondCreated($response);
    }
    // update
    public function update($id_data = null){
        $model = new M_data();
        $data = [
            'nama' => $this->request->getVar('nama'),
            'email'  => $this->request->getVar('email'),
            'posisi' => $this->request->getVar('posisi'),
            'alamat'  => $this->request->getVar('alamat')
        ];
        $model->update($id_data, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data berhasil diubah.'
            ]
        ];
        return $this->respond($response);
    }
    // delete
    public function delete($id_data = null){
        $model = new M_data();
        $data = $model->where('id_data', $id_data)->delete($id_data);
        if ($data) {
            $model->delete($id_data);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data berhasil dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}