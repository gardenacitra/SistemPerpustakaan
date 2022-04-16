<?php
    $sql = "SELECT max(id_anggota) as maxKode FROM tb_anggota";
    $data = mysqli_query($koneksi, $sql);
    $hasil = mysqli_fetch_array($data);
    $idAnggota = $hasil['maxKode'];
    $noUrut = (int) substr($idAnggota, 3, 3);
    $noUrut++;
    $char = "AG";
    $idAnggota = $char . sprintf("%03s", $noUrut);
?>

<div class="panel panel-default">
    <div class="panel-heading"> Tambah Data Anggota </div> 
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" onsubmit="return validasi(this)">
                        <div class="form-group">
                            <label> ID </label>
                            <input class="form-control" name="id" value="<?php echo $idAnggota?>" readonly/>                       
                        </div>
                        <div class="form-group">
                            <label> Nama </label>
                            <input class="form-control" name="nama"/>                       
                        </div>
                        <div class="form-group">
                            <label> Tempat Lahir </label>
                            <input class="form-control" name="tempat"/>                          
                        </div>
                        <div class="form-group">
                            <label> Tanggal Lahir </label>
                            <input class="form-control" type="date" name="tanggal"/>                            
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
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </div>
                    </form>
                </div>                
            </div>
        </div>  
    </div>  
</div>

<?php
 	if (isset($_POST ['simpan'])) {
 		
 		$sql = $koneksi->query("INSERT INTO tb_anggota (id_anggota, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, kelas) VALUES 
        ('$_POST[id]', '$_POST[nama]', '$_POST[tempat]', '$_POST[tanggal]', '$_POST[jk]', '$_POST[kelas]')");

 		if ($sql) {
 			?>
 				<script type="text/javascript">
 					alert ("Data Berhasil Disimpan");
 					window.location.href="?page=anggota";
 				</script>
 			<?php
 		}
 	} 
?>