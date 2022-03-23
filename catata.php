<?php
/*
catatan untuk mysql menghapus data auto increment hapus data dan kembali ke nilai awal kalau manual data tidak direseet pergi ke menu operations pilih empty the table truncate tapi sebelumnya hapus semua data terlebih dahulu
Di ci file yang bertugas sebagar kunci adalah File routes.php ini akan
menidentifikasi intinyo file kunci sabalun maakses controller
//khusus database menggunakan model
untuk membuat database yang harus kau ingat adalah jangan lupa mengaktifkan database di file .env
seperti dibawah atau hilangkan tanda komentar diawal kalimat
database.default.hostname =127.0.0.1 #jika error ubah menjadi localhost 
 database.default.database = ci4 #nama database
 database.default.username = root #user
 database.default.password =     
 database.default.DBDriver = MySQLi
 untuk mengatur file model bisa melakukan konfigurasi sesuai yg dibutuhkan di ctrl+p lalu cari model.php
form action="/komik/save" method="post" enctype="multipart/form-data" enctype=digunakan untuk multipart type data seperti di dalam form ada upload sehingga form tersebut bisa berjalan


DATABASE MIGRATIONS mambuat tabel database dalam ci4
MENNGGUNAKAN COMMAND LINE
php spark migrate untuk mengeksekusi database yg kita buat di kodingan?
php spark migrate:create Orang //membuat class migrate orang
di koding php
method up untuk skema database
method down untuk menghapus
faker u/ menggenerate otomatis\
langkah database migration membuat tabel
1.php spark migrate:create Orang
2.pergi ke folder migration otomasi terubah edit di document ataupun di file
3.buat tabel yg diingginkan.
4. php spark migrate

seeder
mamasukan data ke database melalui kodin ci4
1.buwek seeding di ci4 dokumentasi
2.kopi namo kelasnyo
3.buka di folder migration caliak seeds lalu buwek file baru sasuai jo kebutuha
kopi lalu sesuaikan jo migration tabel
lalu untuk jalanan buwek iko  php spark db:seed nama_fileseedernya
method waktu otomatis di ci4
1. use CodeIgniter\I18n\Time; //untuk menjalan time otomatis
letakkan dibawah namespace
insert data menjadi Time::now()
memasukkan lebih dari satu data
 $data = [
            [
                'nama'       => 'anisa yulia',
                'alamat'     => 'jakarta',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'nama'       => 'heru nopel dio',
                'alamat'     => 'lubuk basung',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]
        ];
         $this->db->table('orang')->insertBatch($data); //lebih dari satu data
         lalu jalankan php spark db:seed nama_fileseedernya
         MENGAMBIL DATA RANDOM DARI FAKER LIBRARY
         1.composer require fakerphp/faker   
         2.lalu letakkan di controler pages  dengan method index atau terserah ==  $faker = \Faker\Factory::create();
         3 $faker = \Faker\Factory::create(); //digunakan library faker untuk memanggil data random
        dd($faker->name);


        MEMBUAT SEEDER DENGAN MENGGUNAKAN LIBRARY FAKER
        1.   u/instal library faker
        2. php spark make:seeder nama_fileseedernya u/membuatfileseedernya
        3. $faker = \Faker\Factory::create();  letakkan didalam method run()
        for ($i = 0; $i < 100; $i++) {
            $data = [

                'nama'       => $faker->name, inidaripemanggilanproperti(variabel) dari librarufaker
                'alamat'     => $faker->address,
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::now()

            ];

            // Simple Queries
            // cara pertama $this->db->query("INSERT INTO Orang (nama, alamat,created_at,updated_at) VALUES(:nama:, :alamat: , :created_at: , :updated_at:)", $data);

            // Using Query Builder cara kedua
            $this->db->table('orang')->insert($data); //suntuk satu data 
        }
        4.lalu jalankan php spark db:seed nama_fileseedernya



        catatan baru
        paginate(10) untuk menentukan berapa data yg akan ditampilkan
        untuk mengubah tampilan pagination arahkan ke file config pilih pager. php dan ada 3 default pagination
        public $templates = [
		'default_full'   => 'CodeIgniter\Pager\Views\default_full',
		'default_simple' => 'CodeIgniter\Pager\Views\default_simple',
		'default_head'   => 'CodeIgniter\Pager\Views\default_head',
	]; kita bisa memilih salah satu
*/
