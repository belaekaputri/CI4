<?php

namespace App\Controllers;

use App\Models\OrangModel;

class Orang extends BaseController
{
    protected $orangModel;
    public function __construct()
    {

        $this->orangModel = new OrangModel(); //meinstans atau membuat objek baru  untuk menjalankan otomatis claass komik model
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;
        //ini mendapatkan id beberapa halaman yg tampil di http
        //d($this->request->getVar('keyword'));
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $orang = $this->orangModel->search($keyword); //jika nilai keywor bernilai benar atau ada maka arahkan ke method search didalam orangModel
        } else {
            $orang = $this->orangModel; //jika tidak ada tampilkan saja datanya
        }
        $data = [
            'title' => 'Daftar Orang',
            //'orang' => $this->orangModel->findAll()
            'orang' => $orang->paginate(6, 'orang'),
            'pager' => $this->orangModel->pager,
            'currentPage' => $currentPage
        ]; //untuk title


        // dd($komik);
        return view('orang/index', $data);
    }
}
