<?php
include('layouts/header.php');
include('layouts/navbar.php');

$query = mysqli_query($connect, "SELECT * FROM penerbit");

?>

<!-- content penerbit-->
<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <h3>Penerbit</h3>
            <div class="card white">
                <div class="card-content black-text">
                    <span class="card-title">Card </span>
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
                                    <td><?php echo $row['nama'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['sosmed'] ?></td>
                                    <td><?php echo $row['alamat'] ?></td>
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