<?php
	$id_buku = $_GET['id_buku'];
	$sql = $koneksi->query("SELECT * FROM tb_buku WHERE id_buku = '$id_buku'");
	$data = $sql->fetch_assoc();
?>

<div class="panel panel-default">
    <div class="panel-heading"> Ubah Data Buku </div> 
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST">
                        <div class="form-group">
                            <label> ID Buku </label>
                            <input class="form-control" name="id_buku" value="<?php echo $data['id_buku'];?>" readonly/>
                        </div>
                        <div class="form-group">
                            <label> Judul </label>
                            <input class="form-control" name="judul" value="<?php echo $data['judul'];?>"/>
                        </div>
                        <div class="form-group">
                            <label> Pengarang </label>
                            <input class="form-control" name="pengarang" value="<?php echo $data['pengarang'];?>"/>
                        </div>
                        <div class="form-group">
                            <label> Penerbit </label>
                            <input class="form-control" name="penerbit" value="<?php echo $data['penerbit'];?>"/>
                        </div>
                        <div class="form-group">
                            <label> Tahun Terbit </label>
                            <select class="form-control" name="tahun">
                                <?php
                                $tahun = date("Y");
                                for ($i = $tahun-32; $i <= $tahun; $i++) { 
                                    echo'<option value="'.$i.'">'.$i.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> ISBN </label>
                            <input class="form-control" name="isbn" value="<?php echo $data['isbn'];?>"/>
                        </div>
                        <div class="form-group">
                            <label> Jumlah Buku </label>
                            <input class="form-control" type="number" name="jumlah" value="<?php echo $data['jumlah_buku'];?>"/>
                        </div>
                        <div class="form-group">
                            <label> Lokasi </label>
                            <select class="form-control" name="lokasi">
                                <option>== Pilih ==</option>
                                <?php
                                    $query = $koneksi->query("SELECT * FROM tb_lokasi ORDER by id_lokasi");
                                    
                                    while ($lokasi=$query->fetch_assoc()) {
                                        echo "<option value='$lokasi[lokasi]'>$lokasi[lokasi]</option>";
                                    }
                                ?>
                            </select>
                        </div> 
                        <div class="col-md-12 bg-light text-right" >
                            <a href="?page=buku&aksi=cancel" class="btn btn-danger"> Kembali</a>
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
        $sql = $koneksi->query("UPDATE tb_buku SET 
        id_buku = '$_POST[id_buku]', judul = '$_POST[judul]', pengarang = '$_POST[pengarang]', penerbit = '$_POST[penerbit]', tahun_terbit = '$_POST[tahun]', isbn = '$_POST[isbn]', jumlah_buku = '$_POST[jumlah]', lokasi = '$_POST[lokasi]'
        WHERE id_buku = '$id_buku'");

        if ($sql) {
            ?>
                <script type="text/javascript">
                    alert ("Data Berhasil Diubah");
                    window.location.href="?page=buku";
                </script>
            <?php
        }
    }
?>