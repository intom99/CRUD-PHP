<?php
include('layouts/header.php');
include('layouts/navbar.php');
// Tampil
$query = mysqli_query($connect, "SELECT * FROM buku JOIN penulis ON penulis.id = buku.id_penulis JOIN penerbit ON penerbit.id = buku.id_penerbit");
$query_penulis = mysqli_query($connect, "SELECT * FROM penulis");
$query_penerbit = mysqli_query($connect, "SELECT * FROM penerbit");
// Tambah
if (isset($_POST['submit'])) {
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul'];
    $id_penulis = $_POST['id_penulis'];
    $id_penerbit = $_POST['id_penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query($connect, "INSERT INTO buku (isbn, judul, id_penulis, id_penerbit, tahun_terbit, deskripsi) VALUES ('$isbn','$judul','$id_penulis','$id_penerbit','$tahun_terbit','$deskripsi')");
    header('location: buku.php');
}
// Update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul'];
    $id_penulis = $_POST['id_penulis'];
    $id_penerbit = $_POST['id_penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query($connect, "UPDATE buku SET isbn='$isbn', judul = '$judul', id_penulis = '$id_penulis', id_penerbit = '$id_penerbit', tahun_terbit='$tahun_terbit', deskripsi='$deskripsi' WHERE id = '$id'");
    header('location: buku.php');
}
//Hapus
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    mysqli_query($connect, "DELETE FROM buku WHERE id = '$id'");
    header('location: buku.php');
}
?>

<!-- content buku-->
<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <h3>Buku</h3>
            <hr>
            <a class="waves-effect waves-light cyan darken-4 btn btn-small modal-trigger" href="#tambah"><i class="material-icons left">add</i> Tambah</a>
        </div>
    </div>

    <div class="row">
        <?php while ($row = mysqli_fetch_array($query)) { ?>
            <div class="col m3 s12">
                <div class="card small">
                    <div class="card-image">
                        <img class="materialboxed" width="250" src="assets/img/Nayeon.jpg">
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

<!-- Modal Tambah Data-->
<div id="tambah" class="modal">
    <div class="modal-content">
        <div class="row">
            <h4>Form Buku</h4>
            <form action="buku.php" method="POST" enctype="multipart/form-data">
                <div class="input-field col s12 m12">
                    <input id="isbn" name="isbn" type="text" class="validate">
                    <label for="isbn">ISBN</label>
                </div>
                <div class="input-field col s12 m12">
                    <input id="judul" name="judul" type="text" class="validate">
                    <label for="judul">Judul</label>
                </div>

                <div class="input-field col s12">
                    <select name="id_penulis">
                        <option value="" disabled selected>--Pilih Penulis--</option>
                        <?php foreach ($query_penulis as $row) { ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['penulis'] ?></option>
                        <?php } ?>
                    </select>
                    <label>Penulis</label>
                </div>

                <div class="input-field col s12">
                    <select name="id_penerbit">
                        <option value="" disabled selected>--Pilih Penerbit--</option>
                        <?php foreach ($query_penerbit as $row) { ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['penerbit'] ?></option>
                        <?php } ?>
                    </select>
                    <label>Penerbit</label>
                </div>

                <div class="input-field col s12 m12">
                    <input id="tahun_terbit" name="tahun_terbit" type="text" class="validate">
                    <label for="tahun_terbit">Tahun Terbit</label>
                </div>

                <div class="input-field col s12 m12">
                    <textarea id="deskripsi" name="deskripsi" class="materialize-textarea"></textarea>
                    <label for="deskripsi">Deskripsi</label>
                </div>

                <!-- <div class="file-field input-field col s12 m12">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" name="image" type="text" placeholder="Upload one or more files">
                    </div>
                </div> -->
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
                <h4>Form Buku</h4>
                <div class="col m4 s12">
                    <div class="card-image">
                        <img class="materialboxed" width="250" src="assets/img/Nayeon.jpg">
                    </div>
                </div>

                <div class="col m8 s12">
                    <form action="buku.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id" value="<?php echo $data['id'] ?>">
                        <div class="input-field col s12 m12">
                            <input id="isbn" name="isbn" value="<?php echo $data['isbn'] ?>" type="text" class="validate">
                            <label for="isbn">ISBN</label>
                        </div>
                        <div class="input-field col s12 m12">
                            <input id="judul" name="judul" value="<?php echo $data['judul'] ?>" type="text" class="validate">
                            <label for="judul">Judul</label>
                        </div>

                        <div class="input-field col s12">
                            <select name="id_penulis">
                                <option value="" disabled>--Pilih Penulis--</option>
                                <?php foreach ($query_penulis as $rows) { ?>
                                    <option value="<?php echo $rows['id'] ?>" <?php if ($rows['id'] == $data['id_penulis']) {
                                                                                    echo "selected=\"selected\"";
                                                                                } ?>><?php echo $rows['penulis'] ?></option>
                                <?php } ?>
                            </select>
                            <label>Penulis</label>
                        </div>

                        <div class="input-field col s12">
                            <select name="id_penerbit">
                                <option value="" disabled>--Pilih Penerbit--</option>
                                <?php foreach ($query_penerbit as $rows) { ?>
                                    <option value="<?php echo $rows['id'] ?>" <?php if ($rows['id'] == $data['id_penerbit']) {
                                                                                    echo "selected=\"selected\"";
                                                                                } ?>><?php echo $rows['penerbit'] ?></option>

                                <?php } ?>
                            </select>
                            <label>Penerbit</label>
                        </div>

                        <div class="input-field col s12 m12">
                            <input id="tahun_terbit" name="tahun_terbit" value="<?php echo $data['tahun_terbit'] ?>" type="text" class="validate">
                            <label for="tahun_terbit">Tahun Terbit</label>
                        </div>

                        <div class="input-field col s12 m12">
                            <textarea id="deskripsi" name="deskripsi" class="materialize-textarea"><?php echo $data['deskripsi'] ?></textarea>
                            <label for="deskripsi">Deskripsi</label>
                        </div>
                        <!--  -->
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

<!-- Modal Detail Data-->
<?php foreach ($query as $data) { ?>
    <div id="detail<?php echo $data['id'] ?>" class="modal">
        <div class="modal-content">
            <div class="row">
                <div class="col m4 s12">
                    <div class="card-image">
                        <img class="materialboxed" width="250" src="assets/img/Nayeon.jpg">
                    </div>
                </div>
                <div class="col m8 s12">
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