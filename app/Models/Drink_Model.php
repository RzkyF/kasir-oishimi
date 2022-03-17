<?php

namespace App\Models;

use CodeIgniter\Model;

class Drink_Model extends Model
{

    protected $table = 'minuman';
    protected $primaryKey = 'id_minuman';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $allowedFields = ['nama_minuman', 'harga', 'status_minuman', 'foto'];

    public function get_drink()
    {
        return $this->db->table('minuman')
            ->get()->getResultArray();

        // $builder = $this->db->table('masyarakat');
        // $builder->select('*');
        // $builder->join('tb_masyarakat', 'tb_level.id_level = tb_masyarakat.id_level');
        // $query = $builder->get();
        // return $query->getResult();


    }

    public function get_id_drink()
    {
        $builder = $this->db->table('id_minuman');
        $query = $builder->countALL();
        return $query;
    }
    public function drink_tambah($data)
    {
        $this->db->table('minuman')->insert($data);
    }
    public function drink_edit($id_minuman)
    {
        return $this->db->table('minuman')->where('id_minuman', $id_minuman)->get()->getRowArray();
    }
    public function drink_update($data, $id_minuman)
    {
        return $this->db->table('minuman')->update($data, array('id_minuman' => $id_minuman));
    }
}
