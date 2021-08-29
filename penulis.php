<?php
include('layouts/header.php');
include('layouts/navbar.php');

$query = mysqli_query($connect, 'SELECT * FROM penulis');
?>

<!-- content penulis-->
<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <h3>Penulis</h3>
            <div class="card white">
                <div class="card-content black-text">
                    <span class="card-title">
                        <a href="#" class="waves-effect waves-light cyan darken-4 btn-small" title="Add"><i class="material-icons left">add</i> Add</a>
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
                                    <td><?php echo $row['nama'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['alamat'] ?></td>
                                    <td><?php echo $row['sosmed'] ?></td>
                                    <td>
                                        <a href="#" class="waves-effect waves-light light-blue darken-4 btn-small" title="Edit"><i class="material-icons">create</i></a>
                                        <a href="#" class="waves-effect waves-light red darken-4 btn-small" title="Delete"><i class="material-icons">delete</i></a>
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




<?php
include('layouts/footer.php');
?>