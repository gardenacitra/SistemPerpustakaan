<div class="panel panel-default">
    <div class="panel-heading"> Tambah Data Pengguna </div> 
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label> Nama Lengkap </label>
                            <input class="form-control" name="nama"/>  
                        </div>
                        <div class="form-group">
                            <label> Tempat Lahir </label>
                            <input class="form-control" name="tempat"/>  
                        </div>
                        <div class="form-group">
                            <label> Tanggal Lahir </label>
                            <input type = "date" class="form-control" name="tanggal"/>  
                        </div>
                        <div class="form-group">
                            <label> Username </label>
                            <input class="form-control" name="username"/>      
                        </div>
                        <div class="form-group">
                            <label> Password </label>
                            <input class="form-control" name="pass" type="Password"/>    
                        </div>
                        <div class="form-group">
                            <label> Level Akses </label>
                            <select class="form-control" name="level">
                                <option> == Pilih Akses Level == </option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>   
                            </select>
                        </div>
                        <div class="form-group">
                            <label> Jenis Kelamin </label><br>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="L" name="jk"/> Laki-laki
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="P" name="jk"/> Perempuan
                            </label>  
                        </div>
                        <div class="form-group">
                            <label> Telepon </label>
                            <input class="form-control" name="telepon"/>  
                        </div>
                        <div class="form-group">
                            <label> File input </label>
                            <input type="file" name="foto" id="foto" />
                        </div>
                        <div class="form-group">
                            <label> Alamat </label>
                            <input class="form-control" name="alamat"/>  
                        </div>
                        <div class="form-group">
                            <label> Tanggal Bergabung </label>
                            <input type = "date" class="form-control" name="tgl_bergabung"/>  
                        </div>
                        <div class="col-md-12 bg-light text-right" >
                            <a href="?page=pengguna&aksi=cancel" class="btn btn-danger"> Kembali</a>
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </div>  
</div>

<?php

    if (isset($_POST['simpan'])) {

        $foto = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
        $upload = move_uploaded_file($lokasi, "images/".$foto);

        $sql = $koneksi->query("INSERT INTO tb_pengguna (username, password, level, nama, tempat_lahir, tgl_lahir, jenis_kelamin, alamat, telepon, tgl_bergabung, foto)
        VALUES ('$_POST[username]', '$_POST[password]', '$_POST[level]', '$_POST[nama]', '$_POST[tempat]', '$_POST[tanggal]', '$_POST[jk]', '$_POST[alamat]', '$_POST[telepon]', '$_POST[tgl_bergabung]', '$foto')");

        if ($sql) {
            ?>
            <script type = "text/javascript">
                alert ("Data Berhasil Disimpan");
                window.location.href="?page=pengguna";
            </script>
            <?php
        }
    }
?>