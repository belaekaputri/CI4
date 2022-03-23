<?php
//seder insrt dalam sql tapi di kodingan


namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class OrangSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID'); //digunakan library faker untuk memanggil data random ja_JP UNTUK TAMBAH DATA DARI JAPAN
        for ($i = 0; $i < 100; $i++) {
            $data = [

                'nama'       => $faker->name,
                'alamat'     => $faker->address,
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::now()

            ];

            // Simple Queries
            // cara pertama $this->db->query("INSERT INTO Orang (nama, alamat,created_at,updated_at) VALUES(:nama:, :alamat: , :created_at: , :updated_at:)", $data);

            // Using Query Builder cara kedua
            $this->db->table('orang')->insert($data); //suntuk satu data 
        }
        // $this->db->table('orang')->insertBatch($data); //lebih dari satu data
    }
}
