<?php
namespace App\Models;
use CodeIgniter\Model;
class M_dataApi extends Model{
    protected $table = 'data';
    protected $primaryKey = 'id_data';
    protected $allowedFields = ['nama','email','posisi','alamat'];
}