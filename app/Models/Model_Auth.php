<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Auth extends Model
{
    protected $table      = 'user';

    public function save_register($data)
    {
        $this->db->table('user')->insert($data);
    }

    public function login($username, $tbl)
    {

        //  $builder = $this->db->table('tb_masyarakat');
        $builder = $this->db->table($tbl);
        $builder->where('username', $username);
        $log = $builder->get()->getRow();
        return $log;
    }
}
