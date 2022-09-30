<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_data extends Model{
    protected $table = 'data';
    protected $primaryKey = 'id_data';
    protected $allowedFields = ['nama','email','posisi','alamat'];
    
    // function __construct() {
    //     $this->db = \Config\Database::connect();
    // }

    public function all(){
        $result =  $this->db->query("SELECT * FROM data order by id_data='ASC'");
        return $result->getResultArray();
    }
    public function detail($id_data){
        $result =  $this->db->query("SELECT * FROM data where id_data='$id_data'");
        return $result->getRowArray();
    }
}