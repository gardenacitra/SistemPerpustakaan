<?php
    $id_lokasi = $_GET['id_lokasi'];
    $sql = $koneksi->query("SELECT * FROM tb_lokasi WHERE id_lokasi='$id_lokasi'");
    $data = $sql->fetch_assoc();
?>

<div class="panel panel-default">
    <div class="panel-heading"> Ubah Data Lokasi Buku </div> 
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12"> 
                    <form method="POST">
                        <div class="form-group">
                            <label> Lokasi Buku </label>
                            <input class="form-control" name="lokasi" value="<?php echo $data['lokasi'];?>"/>
                        </div>
                        <div class="col-md-12 bg-light text-right" >
                            <a href="?page=lokasi&aksi=cancel" class="btn btn-danger"> Kembali</a>
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
 		
 		$sql = $koneksi->query("UPDATE tb_lokasi SET lokasi='$_POST[lokasi]' WHERE id_lokasi='$id_lokasi'");

 		if ($sql) {
 			?>
 				<script type="text/javascript">
 					alert ("Data Berhasil Diubah");
 					window.location.href="?page=lokasi";
 				</script>
 			<?php
 		}
 	}
?>