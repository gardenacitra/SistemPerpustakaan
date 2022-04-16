<?php
    $id_pengguna = $_GET['id'];
    $sql = $koneksi->query("SELECT * FROM tb_pengguna WHERE id = '$id_pengguna'");
    $data = $sql->fetch_assoc();
?>

<div class="panel panel-default">
    <div class="panel-heading"> Ubah Data Pengguna </div> 
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label> Nama Lengkap </label>
                            <input class="form-control" name="nama" value="<?php echo $data['nama'];?>"/>  
                        </div>
                        <div class="form-group">
                            <label> Tempat Lahir </label>
                            <input class="form-control" name="tempat" value="<?php echo $data['tempat_lahir'];?>"/>  
                        </div>
                        <div class="form-group">
                            <label> Tanggal Lahir </label>
                            <input type = "date" class="form-control" name="tanggal" value="<?php echo $data['tgl_lahir'];?>"/>  
                        </div>
                        <div class="form-group">
                            <label> Username </label>
                            <input class="form-control" name="username" value="<?php echo $data['username'];?>"/>      
                        </div>
                        <div class="form-group">
                            <label> Password </label>
                            <input class="form-control" name="pass" type="Password" value="<?php echo $data['password'];?>"/>    
                        </div>
                        <div class="form-group">
                            <label> Level Akses </label>
                            <select class="form-control" name="level" value="<?php echo $data['level'];?>">
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
                            <input class="form-control" name="telepon" value="<?php echo $data['telepon'];?>"/>  
                        </div>
                        <div class="form-group">
                            <label> Ganti Foto </label>
                            <input type="file" name="foto" id="foto" value="<?php echo $data['foto'];?>"/>
                        </div>
                        <div class="form-group">
                            <label> Alamat </label>
                            <input class="form-control" name="alamat" value="<?php echo $data['alamat'];?>"/>  
                        </div>
                        <div class="form-group">
                            <label> Tanggal Bergabung </label>
                            <input type = "date" class="form-control" name="tgl_bergabung" value="<?php echo $data['tgl_bergabung'];?>"/>  
                        </div>
                        <div class="col-md-12 bg-light text-right" >
                            <a href="?page=pengguna&aksi=cancel" class="btn btn-danger"> Kembali</a>
                            <input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </div>  
</div>

<?php

  	if (isset($_POST ['simpan'])) {
        if (!empty($lokasi)) {
        $foto = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
        $upload = move_uploaded_file($lokasi, "images/".$foto);

        $sql = $koneksi->query("UPDATE tb_pengguna SET username ='$_POST[username]', password = '$_POST[password]', level = '$_POST[level]', nama = '$_POST[nama]', tempat_lahir = '$_POST[tempat]', tgl_lahir = '$_POST[tanggal]', jenis_kelamin = '$_POST[jk]', alamat = '$_POST[alamat]', telepon = '$_POST[telepon]', tgl_bergabung = '$_POST[tgl_bergabung]', foto = '$foto' WHERE id = '$id_pengguna'");
 		
 			?>
 				<script type="text/javascript">
 					alert ("Data Berhasil Diubah");
 					window.location.href="?page=pengguna";
 				</script>
 			<?php
 		
 	}else{
        $sql = $koneksi->query("UPDATE tb_pengguna SET username ='$_POST[username]', password = '$_POST[password]', level = '$_POST[level]', nama = '$_POST[nama]', 
        tempat_lahir = '$_POST[tempat]', tgl_lahir = '$_POST[tanggal]', jenis_kelamin = '$_POST[jk]', alamat = '$_POST[alamat]', telepon = '$_POST[telepon]', tgl_bergabung = '$_POST[tgl_bergabung]' WHERE id = '$id_pengguna'");

            ?>
                <script type="text/javascript"> 
                    alert ("Data Berhasil Diubah");
                    window.location.href="?page=pengguna";
                </script>
            <?php
        }
    }
 ?>