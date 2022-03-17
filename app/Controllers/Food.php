<?php

namespace App\Controllers;

use App\Models\Food_Model;
use App\Models\Model_Auth;

class Food extends BaseController
{
    public function __construct()
    {
        $this->Food_Model = new Food_Model();
        $Food_Model = new Food_Model();
        $food = $Food_Model->findAll();
        helper('number');
        helper('form');
        helper('filesystem');
    }

    public function index()
    {

        $data = [
            'title' => 'Halaman foods'

        ];
        return view('templates/food', $data);
    }

    public function food()
    {
        $food = $this->Food_Model->findALL();


        $data = [
            'title' => 'Halaman foods',
            'food' => $food,
            'food' => $this->Food_Model->get_food()


        ];
        return view('templates/food', $data);
    }
    public function food_new()
    {
        // session();
        $food = $this->Food_Model->findALL();


        $data = [
            'title' => 'Form Tambah Data Foods',
            'food' => $food,
            'food' => $this->Food_Model->get_food(),
            'validation' => \Config\Services::validation()


        ];
        return view('templates/food/tambah', $data);
    }


    public function food_edit($id_masakan)
    {
        $data = [
            'title' => 'Form Ubah Data Foods',
            'food' => $this->Food_Model->get_food(),
            'validation' => \Config\Services::validation(),
            'food' => $this->Food_Model->food_edit($id_masakan),



        ];
        return view('templates/food/edit', $data);
    }





    // fungsi CRUD

    public function food_tambah()
    {
        if (!$this->validate([
            'nama_masakan' => [
                'label' => 'Nama Makanan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'harga' => [
                'label' => 'Harga',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'status_masakan' => [
                'label' => 'Status Makanan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'Foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,10024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Foto Terlalu Besar',
                    'is_image' => 'Yang Anda Pilih Bukan Foto',
                    'mime_in' => 'Yang Anda Pilih Bukan Foto',
                ]
            ],


        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/food/food_new')->withInput();
        }
        //ambil foto
        $filefoto = $this->request->getFile('foto');

        // jika tidak ada gambar yang diupload
        if ($filefoto->getError() == 4) {
            $namafoto = 'default.png';
        } else {
            // genarate nama foto
            $namafoto = $filefoto->getRandomName();

            // pindahkan foto ke folder foto
            $filefoto->move(ROOTPATH . 'public/foto/food/', $namafoto);
        }

        //jika Valid
        $data = array(
            'nama_masakan' => $this->request->getVar('nama_masakan'),
            'harga' => $this->request->getVar('harga'),
            'status_masakan' => $this->request->getVar('status_masakan'),
            'foto' => $namafoto
        );
        $this->Food_Model->food_tambah($data);
        session()->setFlashdata('pesan', 'Tambah Data Berhasil');
        return redirect()->to(base_url('food/food'));
        // else {
        //     // jika tidak valid
        //     session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        //     return redirect()->to(base_url('food/food_new'));
        // }
    }

    public function food_update($id_masakan)
    {
        if (!$this->validate([
            'nama_masakan' => [
                'label' => 'Nama Makanan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'harga' => [
                'label' => 'Harga',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'status_masakan' => [
                'label' => 'Status Makanan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'Foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,10024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Foto Terlalu Besar',
                    'is_image' => 'Yang Anda Pilih Bukan Foto',
                    'mime_in' => 'Yang Anda Pilih Bukan Foto',
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('food/food_edit/' . $this->request->getVar('id_masakan'))->withInput();
        }
        $filefoto = $this->request->getFile('foto');
        // cek gambar, apakah tetap gambar lama
        if ($filefoto->getError() == 4) {
            $namafoto = $this->request->getVar('fotolama');
        } else {
            // generate nama file random
            $namafoto = $filefoto->getRandomName();
            // pindahkan gambar
            $filefoto->move('foto/food/', $namafoto);
            //hapus file yang lama
            unlink('foto/food/' . $this->request->getVar('fotolama'));
        }

        //jika Valid
        // $food_Model = new food_Model();
        $data = [
            'nama_masakan' => $this->request->getVar('nama_masakan'),
            'harga' => $this->request->getVar('harga'),
            'status_masakan' => $this->request->getVar('status_masakan'),
            'foto' => $namafoto
        ];
        // dd($data);
        $this->Food_Model->food_update($data, $id_masakan);
        session()->setFlashdata('pesan', 'Ubah Data Berhasil');
        return redirect()->to(base_url('food/food'));
        // else {
        //     // jika tidak valid
        //     session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        //     return redirect()->to(base_url('food/food'));
        // }
    }

    public function food_hapus($id_masakan)
    {
        $food = $this->Food_Model->find($id_masakan);
        // $food = $this->food_Model->find($id_masakan);
        if ($food['foto'] != 'default.png') {
            // Hapus foto
            unlink('foto/food/' . $food['foto']);
        }

        $this->Food_Model->where('id_masakan', $id_masakan)->delete();
        session()->setFlashdata('pesan', 'Hapus Data Berhasil');
        return redirect()->to(base_url('food/food'));
    }
}
