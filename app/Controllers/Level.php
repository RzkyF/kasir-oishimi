<?php

namespace App\Controllers;

use App\Models\Level_Model;
use App\Models\Model_Auth;

class Level extends BaseController
{
    public function __construct()
    {
        $this->Level_Model = new Level_Model();
        $Level_Model = new Level_Model();
        $Level = $Level_Model->findAll();
        helper('number');
        helper('form');
        helper('filesystem');
    }

    public function index()
    {

        $data = [
            'title' => 'Halaman Level'

        ];
        return view('templates/level', $data);
    }

    public function level()
    {
        $level = $this->Level_Model->findALL();


        $data = [
            'title' => 'Halaman Levels',
            'level' => $level,
            'level' => $this->Level_Model->get_level()


        ];
        return view('templates/level', $data);
    }
    public function level_new()
    {
        // session();
        $level = $this->Level_Model->findALL();


        $data = [
            'title' => 'Form Tambah Data Levels',
            'level' => $level,
            'level' => $this->Level_Model->get_level(),
            'validation' => \Config\Services::validation()


        ];
        return view('templates/level/tambah', $data);
    }


    public function level_edit($id_level)
    {
        $data = [
            'title' => 'Form Ubah Data Levels',
            'level' => $this->Level_Model->get_level(),
            'validation' => \Config\Services::validation(),
            'level' => $this->Level_Model->level_edit($id_level),



        ];
        return view('templates/level/edit', $data);
    }





    // fungsi CRUD

    public function level_tambah()
    {
        if (!$this->validate([
            'nama_level' => [
                'label' => 'Nama Level',
                'rules' => 'required|is_unique[level.nama_level]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'is_unique' => '{field} Tidak Boleh Sama !!!',

                ]
            ],


        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/level/level_new')->withInput();
        }

        //jika Valid
        $data = array(
            'nama_level' => $this->request->getVar('nama_level'),
        );
        $this->Level_Model->level_tambah($data);
        session()->setFlashdata('pesan', 'Tambah Data Berhasil');
        return redirect()->to(base_url('level/level'));
    }

    public function level_update($id_level)
    {
        $levellama = $this->Level_Model->get_level($this->request->getVar('id_level'));
        if ($levellama['nama_level' == $this->request->getVar('nama_level')]) {
            $rule_level = 'required';
        } else {
            $rule_level = 'required|is_unique[level.nama_level,id_level,{id_level}]';
        }

        if (!$this->validate([
            'nama_Level' => [
                'label' => 'Nama Level',
                'rules' => $rule_level,
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'is_unique' => '{field} Sudah Terdaftar!!!'
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/level/level_edit/' . $this->request->getVar('id_level'))->withInput();
        }


        //jika Valid
        // $level_Model = new level_Model();
        $data = [
            'nama_level' => $this->request->getVar('nama_level'),
        ];
        // dd($data);
        $this->Level_Model->level_update($data, $id_level);
        session()->setFlashdata('pesan', 'Ubah Data Berhasil');
        return redirect()->to(base_url('level/level'));
    }

    public function level_hapus($id_level)
    {
        $level = $this->Level_Model->find($id_level);

        $this->Level_Model->where('id_level', $id_level)->delete();
        session()->setFlashdata('pesan', 'Hapus Data Berhasil');
        return redirect()->to(base_url('level/level'));
    }
}
