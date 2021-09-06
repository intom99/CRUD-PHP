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

<!-- Modal Detail Data-->
<?php foreach ($query as $data) { ?>
    <div id="detail<?php echo $data['id'] ?>" class="modal">
        <div class="modal-content">
            <div class="row">
                <div class="col m2 s12">
                    <div class="card-image">
                        <img src="assets/logo/loo.png">
                    </div>
                </div>
                <div class="col m10 s12">
                    <table class="table">


                        <tr>
                            <td>Judul</td>
                            <td><?php echo $data['judul'] ?></td>
                        </tr>
                        <tr>
                            <td>ISBN</td>
                            <td>
                                <p><?php echo $data['isbn'] ?></p>
                            </td>

                        </tr>

                        <tr>
                            <td>Penulis</td>
                            <td><?php echo $data['penulis'] ?></td>
                        </tr>
                        <tr>
                            <td>Penerbit</td>
                            <td><?php echo $data['penerbit'] ?></td>
                        </tr>
                        <tr>
                            <td>Tahun Terbit</td>
                            <td><?php echo $data['tahun_terbit'] ?></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td><?php echo $data['deskripsi'] ?></td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>

    </div>
<?php } ?>

<?php
include('layouts/footer.php');
?>