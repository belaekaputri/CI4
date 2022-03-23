<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komikModel;
    public function __construct()
    {

        $this->komikModel = new KomikModel(); //meinstans atau membuat objek baru  untuk menjalankan otomatis claass komik model
    }
    public function index()
    {
        /* 
        //cara konek db tanpa model
        $db = \config\Database::connect();
        $komik = $db->query("select * from komik");
        foreach ($komik->getResultArray() as $row) {
            d($row);
        } latihan pertama
 ;
        // dd($komik); vardump tapi script koding tidak dijalankan*/
        //8a $komik = $this->komikModel->findAll(); //memanggiltabel komik di class komikmodel (namespace model) find all adalah method alah jadi
        $data = [
            'title' => 'Daftar Komik',
            'komik' => $this->komikModel->getKomik()
        ]; //untuk title


        // dd($komik);
        return view('komik/index', $data);
    }



    public function detail($slug)
    {
        /* $komik = $this->komikModel->where(['slug' => $slug])->first();
        dd($komik);*/
        $komik = $this->komikModel->getKomik($slug);
        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->komikModel->getKomik($slug)
        ];
        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Komik' . $slug . 'tidak ditemukan');
        }
        return view('komik/detail', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Form Tambah Data Komik',
            'validation' => \Config\Services::validation()
        ];
        return view('komik/create', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus disi',
                    'is_unique' => '{field} komik sudah terdaftar'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus disi',
                ]
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus disi',
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul, 1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    //uploaded[sampul]| ini untuk rules
                    //'uploaded' => 'Pilih gambar sampul terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang ada pilih bukan gambar',
                    'mime_in' => 'Yang ada pilih bukan gambar'
                ]
                // upload foto maksimall 1024 is_image harus gambar dengan mime in aturan gambar yg boleh diupload
            ]
            /* sampul dari nama "name" dilam tipe input */

        ])) {
            // $validation = \Config\Services::validation();
            //return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/komik/detail')->withInput();
        } //diatas dengan if untuk validation
        //mengelola gambar
        $filesampul = $this->request->getFile('sampul');
        if ($filesampul->getError() == 4) {
            $namasampul = 'tes.jpg';
            //jika upload gambar tidak adan atau sama dengan kode 4 maka jadikan gambar default yg diupload
        } else {
            $namasampul = $filesampul->getRandomName();
            //yg diatas apabila ada foto yg sama maka nama fotonya akan otomatis oleh sistem
            //pindahkan file ke folder img
            $filesampul->move('img', $namasampul);
        }


        $slug = url_title($this->request->getVar('judul'), '-', true); //membuat string kecil semua dan spasinya hilang
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namasampul
        ]);
        session()->setFlashdata(
            'pesan',
            'Data berhasil ditambahkan'
        );

        return redirect()->to('/komik'); //pai ka kontroler komik
    }

    public function delete($id)
    {   //cari gambar berdasarkan id
        $komik = $this->komikModel->find($id);
        //cek jika gambarnya bukan default(gambar jika user tidak menggupload gambar )
        if ($komik['sampul'] != 'tes.jpg') {
            unlink('img/' . $komik['sampul']); //hapus gambar
        }

        $this->komikModel->delete($id);
        session()->setFlashdata(
            'pesan',
            'Data berhasil dihapus'
        );
        return redirect()->to('/komik');
    }


    public function edit($slug)
    {
        //method ini digunakan untuk menampilkan data sebelum diedit
        $data = [
            'title' => 'Form Ubah Data Komik',
            'validation' => \Config\Services::validation(),
            'komik' => $this->komikModel->getKomik($slug)
        ];
        return view('komik/edit', $data);
    }
    public function update($id)
    {
        $komiklama = $this->komikModel->getKomik($this->request->getVar('slug'));
        if ($komiklama['judul'] == $this->request->getVar('judul')) {
            // jika judul lama  sama denga judul baru diubah
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[komik.judul]';
        }
        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} komik harus disi',
                    'is_unique' => '{field} komik sudah terdaftar'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul, 1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    //uploaded[sampul]| ini untuk rules
                    //'uploaded' => 'Pilih gambar sampul terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang ada pilih bukan gambar',
                    'mime_in' => 'Yang ada pilih bukan gambar'
                ]
                // upload foto maksimall 1024 is_image harus gambar dengan mime in aturan gambar yg boleh diupload
            ]
            /* sampul dari nama "name" dilam tipe input */

        ])) {
            //$validation = \Config\Services::validation();
            return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput();
        } //diatas dengan if untuk validation
        //method ini untuk menyimpan data ke database
        //dd($this->request->getVar());

        $filesampul = $this->request->getFile('sampul'); //mambil daari id


        //cek gambar, apakah tetap gambar lama
        if ($filesampul->getError() == 4) {
            $namasampul = $this->request->getVar('sampullama');
            //diambil dari views edit dengan input type hidden name=sampullama

        } else {
            //generate file random
            $namasampul = $filesampul->getRandomName();
            //pindahkan gambar
            $filesampul->move('img', $namasampul);
            //hapus file yg lama
            unlink('img/' . $this->request->getVar('sampullama'));
        }



        $slug = url_title($this->request->getVar('judul'), '-', true); //membuat string kecil semua dan spasinya hilang
        $this->komikModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namasampul
        ]);
        session()->setFlashdata(
            'pesan',
            'Data berhasil diubah'
        );

        return redirect()->to('/komik'); //pai ka kontroler komik
    }
}
