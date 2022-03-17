<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaksi_Model extends Model
{

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $allowedFields = ['id_user', 'tanggal', 'total_bayar', 'no_meja', 'keterangan', 'status_order', 'id_masakan', 'id_minuman'];

    public function get_transaksi()
    {
        return $this->db->table('transaksi')
            ->join('user', 'user.id_user = transaksi.id_user')
            ->join('masakan', 'masakan.id_masakan = transaksi.id_masakan')
            ->join('minuman', 'minuman.id_minuman = transaksi.id_minuman')
            ->get()->getResultArray();
    }

    public function get_id_transaksi()
    {
        $builder = $this->db->table('id_transaksi');
        $query = $builder->countALL();
        return $query;
    }

    public function transaksi_tambah($data)
    {
        $this->db->table('transaksi')->insert($data);
    }
    public function transaksi_edit($id_transaksi)
    {
        return $this->db->table('transaksi')->where('id_transaksi', $id_transaksi)->get()->getRowArray();
    }
    public function transaksi_update($data, $id_transaksi)
    {
        return $this->db->table('transaksi')->update($data, array('id_transaksi' => $id_transaksi));
    }
}
