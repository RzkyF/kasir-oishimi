<?php

namespace App\Models;

use CodeIgniter\Model;

class Home_Model extends Model
{
    public function total_user()
    {
        return $this->db->table('user')->countAll();
    }
    public function total_masakan()
    {
        return $this->db->table('masakan')->countAll();
    }
    public function total_minuman()
    {
        return $this->db->table('minuman')->countAll();
    }
    public function total_transaksi()
    {
        return $this->db->table('transaksi')->countAll();
    }
}
