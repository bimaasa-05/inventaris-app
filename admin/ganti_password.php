<?php
include '../layout/header.php';
global $conn;

?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Ganti Password
            <small>
                Aplikasi Inventaris Barang Sederhana
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Ganti Password</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-primary">
            <div class="box-header">

            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>OPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Query untuk mengambil data barang keluar beserta nama barang dan nama user  
                        $dt_ganti = mysqli_query($conn, "SELECT * FROM users");
                        $no = 1;
                        while ($password = mysqli_fetch_array($dt_ganti)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>

                                <td><?php echo $password['nama_lengkap']; ?></td>
                                <td><?php echo $password['username']; ?></td>
                                <td><?php echo $password['level']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-xs btn-warning" title="Edit" data-toggle="modal" data-target="#edit-password<?php echo $password['id_user']; ?>">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </button>
                                    <div class="modal fade" id="edit-password<?php echo $password['id_user']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Edit Password</h4>
                                                </div>
                                                <form action="ganti_password_update.php" method="POST">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" name="id_user" value="<?php echo ($password['id_user']); ?>">
                                                            <label>Nama Lengkap</label>
                                                            <input type="text" class="form-control" name="nama_lengkap" value="<?php echo ($password['nama_lengkap']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input type="text" class="form-control" name="username" value="<?php echo ($password['username']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Password</label>

                                                            <div class="input-group">

                                                                <input type="password"
                                                                    class="form-control"
                                                                    name="password"
                                                                    id="password<?php echo $password['id_user']; ?>"
                                                                    value="<?php echo ($password['password']); ?>">

                                                                <span class="input-group-addon"
                                                                    onclick="togglePassword(<?php echo $password['id_user']; ?>)"
                                                                    style="cursor:pointer;">

                                                                    <i class="bi bi-eye"
                                                                        id="icon<?php echo $password['id_user']; ?>"></i>

                                                                </span>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Role/Level</label>
                                                            <select class="form-control" name="level">
                                                                <option value="admin" <?php if ($password['level'] == 'admin') echo 'selected'; ?>>Admin</option>
                                                                <option value="petugas" <?php if ($password['level'] == 'petugas') echo 'selected'; ?>>Petugas</option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary"> Update </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
</div>


<?php

include "../layout/footer.php";

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function togglePassword(id) {

        var password = document.getElementById("password" + id);

        var icon = document.getElementById("icon" + id);

        if (password.type === "password") {

            password.type = "text";

            icon.classList.remove("bi-eye");

            icon.classList.add("bi-eye-slash");

        } else {

            password.type = "password";

            icon.classList.remove("bi-eye-slash");

            icon.classList.add("bi-eye");

        }

    }
</script>

</body>

</html>