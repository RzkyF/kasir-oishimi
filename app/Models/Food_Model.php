<?php

namespace App\Models;

use CodeIgniter\Model;

class Food_Model extends Model
{

    protected $table = 'masakan';
    protected $primaryKey = 'id_masakan';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $allowedFields = ['nama_masakan', 'harga', 'status_masakan', 'foto'];

    public function get_food()
    {
        return $this->db->table('masakan')
            ->get()->getResultArray();

        // $builder = $this->db->table('masyarakat');
        // $builder->select('*');
        // $builder->join('tb_masyarakat', 'tb_level.id_level = tb_masyarakat.id_level');
        // $query = $builder->get();
        // return $query->getResult();


    }

    public function get_id_food()
    {
        $builder = $this->db->table('id_masakan');
        $query = $builder->countALL();
        return $query;
    }
    public function food_tambah($data)
    {
        $this->db->table('masakan')->insert($data);
    }
    public function food_edit($id_masakan)
    {
        return $this->db->table('masakan')->where('id_masakan', $id_masakan)->get()->getRowArray();
    }
    public function food_update($data, $id_masakan)
    {
        return $this->db->table('masakan')->update($data, array('id_masakan' => $id_masakan));
    }
}
