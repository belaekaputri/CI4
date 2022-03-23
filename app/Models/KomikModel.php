<?php
//membuat model dengan tabel komik
namespace App\Models;

use CodeIgniter\Model;

class KomikModel extends Model
{ // nama class dan file biasanya diikuti namatabeldan diakhiri dengan Model
    protected $table = 'komik';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul']; //memberitahukan ci bahwa field ini boleh dipakai
    public function getKomik($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
