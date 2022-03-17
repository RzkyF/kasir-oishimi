<?php

namespace App\Controllers;

use App\Models\Drink_Model;


class Drink extends BaseController
{
    public function __construct()
    {
        $this->Drink_Model = new Drink_Model();
        $Drink_Model = new Drink_Model();
        $drink = $Drink_Model->findAll();
        helper('number');
        helper('form');
        helper('filesystem');
    }

    public function index()
    {

        $data = [
            'title' => 'Halaman Drinks'

        ];
        return view('templates/drink', $data);
    }

    public function drink()
    {
        $drink = $this->Drink_Model->findALL();


        $data = [
            'title' => 'Halaman Minuman',
            'drink' => $drink,
            'drink' => $this->Drink_Model->get_drink()


        ];
        return view('templates/drink', $data);
    }
    public function drink_new()
    {
        // session();
        $drink = $this->Drink_Model->findALL();


        $data = [
            'title' => 'Form Tambah Data Minuman',
            'drink' => $drink,
            'drink' => $this->Drink_Model->get_drink(),
            'validation' => \Config\Services::validation()


        ];
        return view('templates/drink/tambah', $data);
    }


    public function drink_edit($id_masakan)
    {
        $data = [
            'title' => 'Form Ubah Data Minuman',
            'drink' => $this->Drink_Model->get_drink(),
            'validation' => \Config\Services::validation(),
            'drink' => $this->Drink_Model->drink_edit($id_masakan),



        ];
        return view('templates/drink/edit', $data);
    }





    // fungsi CRUD

    public function drink_tambah()
    {
        if (!$this->validate([
            'nama_minuman' => [
                'label' => 'Nama Minuman',
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
            'status_minuman' => [
                'label' => 'Status Minuman',
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
            return redirect()->to('/drink/drink_new')->withInput();
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
            $filefoto->move(ROOTPATH . 'public/foto/drink/', $namafoto);
        }

        //jika Valid
        $data = array(
            'nama_minuman' => $this->request->getVar('nama_minuman'),
            'harga' => $this->request->getVar('harga'),
            'status_minuman' => $this->request->getVar('status_minuman'),
            'foto' => $namafoto
        );
        $this->Drink_Model->drink_tambah($data);
        session()->setFlashdata('pesan', 'Tambah Data Berhasil');
        return redirect()->to(base_url('drink/drink'));
        // else {
        //     // jika tidak valid
        //     session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        //     return redirect()->to(base_url('drink/drink_new'));
        // }
    }

    public function drink_update($id_minuman)
    {
        if (!$this->validate([
            'nama_minuman' => [
                'label' => 'Nama Minuman',
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
            'status_minuman' => [
                'label' => 'Status Minuman',
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
            return redirect()->to('drink/drink_edit/' . $this->request->getVar('id_masakan'))->withInput();
        }
        $filefoto = $this->request->getFile('foto');
        // cek gambar, apakah tetap gambar lama
        if ($filefoto->getError() == 4) {
            $namafoto = $this->request->getVar('fotolama');
        } else {
            // generate nama file random
            $namafoto = $filefoto->getRandomName();
            // pindahkan gambar
            $filefoto->move('foto/drink/', $namafoto);
            //hapus file yang lama
            unlink('foto/drink/' . $this->request->getVar('fotolama'));
        }

        //jika Valid
        // $Drink_Model = new Drink_Model();
        $data = [
            'nama_minuman' => $this->request->getVar('nama_minuman'),
            'harga' => $this->request->getVar('harga'),
            'status_minuman' => $this->request->getVar('status_minuman'),
            'foto' => $namafoto
        ];
        // dd($data);
        $this->Drink_Model->drink_update($data, $id_minuman);
        session()->setFlashdata('pesan', 'Ubah Data Berhasil');
        return redirect()->to(base_url('drink/drink'));
        // else {
        //     // jika tidak valid
        //     session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        //     return redirect()->to(base_url('drink/drink'));
        // }
    }

    public function drink_hapus($id_minuman)
    {
        $drink = $this->Drink_Model->find($id_minuman);
        // $drink = $this->Drink_Model->find($id_masakan);
        if ($drink['foto'] != 'default.png') {
            // Hapus foto
            unlink('foto/drink/' . $drink['foto']);
        }

        $this->Drink_Model->where('id_minuman', $id_minuman)->delete();
        session()->setFlashdata('pesan', 'Hapus Data Berhasil');
        return redirect()->to(base_url('drink/drink'));
    }
}
