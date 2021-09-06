<?php
include('layouts/header.php');
include('layouts/navbar.php');

// Tampil
$query = mysqli_query($connect, 'SELECT * FROM penulis');

//Tambah
if (isset($_POST['submit'])) {
    $penulis = $_POST['penulis'];
    $email_penulis = $_POST['email_penulis'];
    $alamat_penulis = $_POST['alamat_penulis'];
    $sosmed_penulis = $_POST['sosmed_penulis'];

    // if (empty($penulis && $email_penulis)) {
    //     $err = 'You';
    // } else {}
    mysqli_query($connect, "INSERT INTO penulis(penulis, email_penulis, alamat_penulis, sosmed_penulis) VALUES ('$penulis', '$email_penulis', '$alamat_penulis','$sosmed_penulis')");
    header('location:penulis.php');
}

// Update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $penulis = $_POST['penulis'];
    $email_penulis = $_POST['email_penulis'];
    $sosmed_penulis = $_POST['sosmed_penulis'];
    $alamat_penulis = $_POST['alamat_penulis'];

    mysqli_query($connect, "UPDATE penulis SET penulis='$penulis', email_penulis = '$email_penulis', alamat_penulis = '$alamat_penulis', sosmed_penulis = '$sosmed_penulis' WHERE id = '$id'");
    header('location: penulis.php');
}

//Hapus
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    mysqli_query($connect, "DELETE FROM penulis WHERE id = '$id'");
    header('location: penulis.php');
}

?>

<!-- content penulis-->
<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <h3>Penulis</h3>
            <div class="card white">
                <div class="card-content black-text">
                    <span class="card-title">
                        <!-- Modal Tambah -->
                        <a class="waves-effect waves-light cyan darken-4 btn btn-small modal-trigger" href="#tambah"><i class="material-icons left">add</i> Tambah</a>
                    </span>
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Social Media</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($query as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['penulis'] ?></td>
                                    <td><?php echo $row['email_penulis'] ?></td>
                                    <td><?php echo $row['alamat_penulis'] ?></td>
                                    <td><?php echo $row['sosmed_penulis'] ?></td>
                                    <td>
                                        <a class="waves-effect waves-light blue darken-4 btn btn-small modal-trigger" href="#edit<?php echo $row['id'] ?>" title="Edit"><i class="material-icons">create</i></a>
                                        <a onclick="javascript:return confirm('apakah anda yakin akan dihapus ?');" href="penulis.php?delete=<?php echo $row['id'] ?>" class="waves-effect waves-light red darken-4 btn-small" title="Hapus"><i class="material-icons">delete</i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Data-->
<div id="tambah" class="modal">
    <div class="modal-content">
        <div class="row">
            <h4>Form Penulis</h4>
            <form action="penulis.php" method="POST">
                <?php if (isset($err)) { ?>
                    <p><?php echo $err; ?></p>
                <?php } ?>
                <div class="input-field col s12 m12">
                    <input id="penulis" name="penulis" type="text" class="validate">
                    <label for="penulis">Nama Penulis</label>
                </div>
                <div class="input-field col s12 m12">
                    <input id="email_penulis" name="email_penulis" type="email" class="validate">
                    <label for="email_penulis">Email</label>
                </div>
                <div class="input-field col s12 m12">
                    <input id="sosmed_penulis" name="sosmed_penulis" type="text" class="validate">
                    <label for="sosmed_penulis">Sosial Media</label>
                </div>
                <div class="input-field col s12 m12">
                    <textarea id="alamat_penulis" name="alamat_penulis" class="materialize-textarea"></textarea>
                    <label for="alamat_penulis">Alamat</label>
                </div>

        </div>
    </div>
    <div class="modal-footer">
        <a href="#" class="modal-close waves-effect waves-light grey btn-small" title="Batal"><i class="material-icons left">cancel</i> Batal</a>
        <button type="submit" name="submit" title="Simpan" class="waves-effect waves-light light-blue darken-4 btn-small"><i class="material-icons left">save</i> Simpan</button>
        </form>
    </div>
</div>

<!-- Modal Edit Data-->
<?php foreach ($query as $data) { ?>
    <div id="edit<?php echo $data['id'] ?>" class="modal">
        <div class="modal-content">
            <div class="row">
                <h4>Form Penulis</h4>
                <form action="penulis.php" method="POST">
                    <input type="hidden" name="id" id="id" value="<?php echo $data['id'] ?>">
                    <div class="input-field col s12 m12">
                        <input name="penulis" value="<?php echo $data['penulis'] ?>" type="text" class="validate">
                        <label for="penulis">Nama Penulis</label>
                    </div>
                    <div class="input-field col s12 m12">
                        <input id="email_penulis" name="email_penulis" value="<?php echo $data['email_penulis'] ?>" type="email" class="validate">
                        <label for="email_penulis">Email</label>
                    </div>
                    <div class="input-field col s12 m12">
                        <input id="sosmed_penulis" name="sosmed_penulis" value="<?php echo $data['sosmed_penulis'] ?>" type="text" class="validate">
                        <label for="sosmed_penulis">Sosial Media</label>
                    </div>
                    <div class="input-field col s12 m12">
                        <textarea id="alamat_penulis" name="alamat_penulis" class="materialize-textarea"><?php echo $data['alamat_penulis'] ?></textarea>
                        <label for="alamat_penulis">Alamat</label>
                    </div>

            </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="modal-close waves-effect waves-light grey btn-small" title="Batal"><i class="material-icons left">cancel</i> Batal</a>
            <button type="submit" name="update" title="Update" class="waves-effect waves-light light-blue darken-4 btn-small"><i class="material-icons left">save</i> Update</button>
            </form>
        </div>
    </div>
<?php } ?>

<?php
include('layouts/footer.php');
?>