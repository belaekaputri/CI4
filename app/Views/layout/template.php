<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title><?= $title; ?></title>
</head>

<body>
    <?= $this->include('layout/navbar'); //menampilkan layout navbar
    ?>
    <?= $this->renderSection('content'); //mencetak sebuah section yang memanggil halaman ini maksudnyo memanggil halaman konten yang diinginkan
    //iko yang paling pantiang malatak an content lah tetap dari ci4

    ?>



















    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script>
        function tampilgambar() {
            //membuat gambar default
            const sampul = document.querySelector('#sampul');
            const sampullabel = document.querySelector('.custom-file-label'); //nemanggil tag
            const imgpreview = document.querySelector('.img-preview');

            sampullabel.textContent = sampul.files[0].name; //file yang diupload yg diambil namanya urlnya          
            const filesampul = new FileReader(); //mengambil file yg diupload
            filesampul.readAsDataURL(sampul.files[0]); //ambih alamat penyimpana atau nama filenya?
            filesampul.onload = function(e) {
                imgpreview.src = e.target.result; //jika img load img pervie source nya diganti menjadi mengati preview
            }
        }
    </script>
</body>

</html>