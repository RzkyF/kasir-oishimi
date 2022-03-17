<?php

namespace App\Models;

use CodeIgniter\Model;

class Level_Model extends Model
{

    protected $table = 'level';
    protected $primaryKey = 'id_level';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $allowedFields = ['nama_level'];

    public function get_level()
    {
        return $this->db->table('level')->get()->getResultArray();
    }

    public function get_id_level()
    {
        $builder = $this->db->table('id_level');
        $query = $builder->countALL();
        return $query;
    }
    public function level_tambah($data)
    {
        $this->db->table('level')->insert($data);
    }
    public function level_edit($id_level)
    {
        return $this->db->table('level')->where('id_level', $id_level)->get()->getRowArray();
    }
    public function level_update($data, $id_level)
    {
        return $this->db->table('level')->update($data, array('id_level' => $id_level));
    }
}
