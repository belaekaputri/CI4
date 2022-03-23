<?php
//membuat model dengan tabel komik
namespace App\Models;

use CodeIgniter\Model;

class OrangModel extends Model
{ // nama class dan file biasanya diikuti namatabeldan diakhiri dengan Model
    protected $table = 'orang';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'alamat']; //memberitahukan ci bahwa field ini boleh dipakai



    public function search($keyword)
    {
        /* $builder = $this->table('orang'); 
        $builder->like('nama', $keyword);
        return $builder;*/
        return $this->table('orang')->like('nama', $keyword)->orLike('alamat', $keyword);
    }
}
