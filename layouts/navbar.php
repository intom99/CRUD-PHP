    <!-- navbar -->
    <div class="navbar-fixed">
        <nav class="cyan darken-4">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="#!" class="brand-logo">BacaBuku.id</a>
                    <a href="#" data-target="mobile-navbar" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="index.php">Beranda</a></li>
                        <li><a href="#">Buku</a></li>
                        <li><a href="penulis.php">Penulis</a></li>
                        <li><a href="penerbit.php">Penerbit</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Navbar Mobile -->
    <ul class="sidenav" id="mobile-navbar">
        <li><a href="#">Beranda</a></li>
        <li><a href="#">Buku</a></li>
        <li><a href="<?= ('penulis') ?>">Penulis</a></li>
        <li><a href="#">Penerbit</a></li>
    </ul>