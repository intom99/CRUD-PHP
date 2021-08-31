<?php
include('layouts/header.php');
include('layouts/navbar.php');

$query = mysqli_query($connect, "SELECT * FROM penerbit");

// Tambah
if (isset($_POST['submit'])) {
    $penerbit = $_POST['penerbit'];
    $email_penerbit = $_POST['email_penerbit'];
    $sosmed_penerbit = $_POST['sosmed_penerbit'];
    $alamat_penerbit = $_POST['alamat_penerbit'];

    mysqli_query($connect, "INSERT INTO penerbit(penerbit,email_penerbit,sosmed_penerbit,alamat_penerbit) VALUES('$penerbit','$email_penerbit','$sosmed_penerbit','$alamat_penerbit')");
    header('location: penerbit.php');
}

?>

<!-- content penerbit-->
<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <h3>Penerbit</h3>
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
                                <th>Social Media</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($query as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['penerbit'] ?></td>
                                    <td><?php echo $row['email_penerbit'] ?></td>
                                    <td><?php echo $row['sosmed_penerbit'] ?></td>
                                    <td><?php echo $row['alamat_penerbit'] ?></td>
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
            <h4>Form Penerbit</h4>
            <form action="penerbit.php" method="POST">

                <div class="input-field col s12 m12">
                    <input id="penerbit" name="penerbit" type="text" class="validate">
                    <label for="penerbit">Nama Penerbit</label>
                </div>
                <div class="input-field col s12 m12">
                    <input id="email_penerbit" name="email_penerbit" type="email" class="validate">
                    <label for="email_penerbit">Email</label>
                </div>
                <div class="input-field col s12 m12">
                    <input id="sosmed_penerbit" name="sosmed_penerbit" type="text" class="validate">
                    <label for="sosmed_penerbit">Sosial Media</label>
                </div>
                <div class="input-field col s12 m12">
                    <textarea id="alamat_penerbit" name="alamat_penerbit" class="materialize-textarea"></textarea>
                    <label for="alamat_penerbit">Alamat</label>
                </div>

        </div>
    </div>
    <div class="modal-footer">
        <a href="#" class="modal-close waves-effect waves-light grey btn-small" title="Batal"><i class="material-icons left">cancel</i> Batal</a>
        <button type="submit" name="submit" title="Simpan" class="waves-effect waves-light light-blue darken-4 btn-small"><i class="material-icons left">save</i> Simpan</button>
        </form>
    </div>
</div>



<?php
include('layouts/footer.php');
?>