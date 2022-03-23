<nav class="navbar  navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">BELA EKA PUTRI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active ">
                    <a class="nav-link " href="<?= base_url('/'); ?>">Home </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('/pages/about'); ?>">About</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('/pages/contact'); ?>">Contact</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('/komik'); //karna index adalah method default tidak perlu ditulis indexnya
                                                ?>">Komik</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('/orang'); //karna index adalah method default tidak perlu ditulis indexnya
                                                ?>">Orang</a>
                </li>
            </ul>
        </div>
    </div>
</nav>