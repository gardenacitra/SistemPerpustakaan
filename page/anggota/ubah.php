<?php
    require "./facade/html_purifier.php";

	$id_anggota = $_GET['id_anggota'];
	$sql = $koneksi->query("SELECT * FROM tb_anggota WHERE id_anggota = '$id_anggota'");
	$data = $sql->fetch_assoc();
?>

<div class="panel panel-default">
    <div class="panel-heading"> Ubah Data Anggota </div> 
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" >
                        <div class="form-group">
                            <label> ID </label>
                            <input class="form-control" name="id" value="<?php echo $data['id_anggota'];?>" readonly/>
                        </div>
                        <div class="form-group">
                            <label> Nama </label>
                            <input class="form-control" name="nama" value="<?php echo $data['nama'];?>"/>
                        </div>
                        <div class="form-group">
                            <label> Tempat Lahir </label>
                            <input class="form-control" name="tempat" value="<?php echo $data['tempat_lahir'];?>"/>
                        </div>
                        <div class="form-group">
                            <label> Tanggal Lahir </label>
                            <input class="form-control" type="date" name="tanggal" value="<?php echo $data['tanggal_lahir'];?>"/>
                        </div>
                        <div class="form-group">
                            <label> Jenis Kelamin </label><br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="Laki-Laki" name="jk"/> Laki-laki
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="Perempuan" name="jk"/> Perempuan
                            </label>
                        </div>
                        <div class="form-group">
                            <label> Kelas </label>
                            <select class="form-control" name="kelas">
                                <option> == Pilih Kelas ==</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>                        
                        <div class="col-md-12 bg-light text-right" >
                            <a href="?page=anggota&aksi=cancel" class="btn btn-danger"> Kembali</a>                       
                            <input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </div>  
</div>

<?php
    if (isset($_POST['simpan'])) {

        foreach([
            'nama',
            'tempat'          
        ] as $parameter){
            if(antiXss($_POST[$parameter])){
                require "./page/component/exception_modal.php";
                die();
            }
        }

        $sql = $koneksi->query("UPDATE tb_anggota SET 
        id_anggota = '$_POST[id]', nama = '$_POST[nama]', tempat_lahir = '$_POST[tempat]', tanggal_lahir = '$_POST[tanggal]', jenis_kelamin = '$_POST[jk]', kelas = '$_POST[kelas]' WHERE id_anggota = '$id_anggota'");

        if ($sql) {
            ?>
                <script type="text/javascript">
                    alert ("Data Berhasil Diubah");
                    window.location.href="?page=anggota";
                </script>
            <?php
        }
    }
?>