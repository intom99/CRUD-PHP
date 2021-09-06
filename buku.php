<?php
include('layouts/header.php');
include('layouts/navbar.php');

$query = mysqli_query($connect, "SELECT * FROM buku JOIN penulis ON penulis.id = buku.id_penulis JOIN penerbit ON penerbit.id = buku.id_penerbit");

?>

<!-- content buku-->
<div class="container">
    <!-- card -->
    <div class="row">
        <div class="col s12 m12">
            <h3>Buku</h3>
            <div class="row">
                <?php foreach ($query as $row) { ?>
                    <div class="col s12 m3">
                        <div class="card">
                            <div class="card-image">
                                <img src="assets/logo/logo.png">
                            </div>
                            <div class="card-content">
                                <b><?php echo $row['judul'] ?></b>
                                <p><?php echo $row['deskripsi'] ?></p>
                            </div>
                            <div class="card-action">
                                <a class="modal-trigger" href="#detail<?php echo $row['id'] ?>" title="Detail"> Detail</a>
                                <a class="btn-small btn-floating modal-trigger" href="#edit<?php echo $row['id'] ?>" title="Edit"><i class="material-icons">create</i></a>
                                <a onclick="javascript:return confirm('apakah anda yakin akan dihapus ?');" href="buku.php?delete=<?php echo $row['id'] ?>" class="waves-effect waves-light red darken-4 btn-small btn-floating" title="Hapus"><i class="material-icons">delete</i></a>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>

</div>



<?php
include('layouts/footer.php');
?>