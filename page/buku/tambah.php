<?php
    $sql = "SELECT max(id_buku) as maxKode FROM tb_buku";
    $data = mysqli_query($koneksi, $sql);
    $hasil = mysqli_fetch_array($data);
    $idBuku = $hasil['maxKode'];
    $noUrut = (int) substr($idBuku, 3, 3);
    $noUrut++;
    $char = "B";
    $idBuku = $char . sprintf("%03s", $noUrut);
?>

<div class="panel panel-default">
    <div class="panel-heading"> Tambah Data Buku </div> 
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST">
                        <div class="form-group">
                            <label> ID Buku </label>
                            <input class="form-control" name="id_buku" value="<?php echo $idBuku ?>" readonly/>
                        </div>
                        <div class="form-group">
                            <label> Judul </label>
                            <input class="form-control" name="judul"/>
                        </div>
                        <div class="form-group">
                            <label> Pengarang </label>
                            <input class="form-control" name="pengarang"/>
                        </div>
                        <div class="form-group">
                            <label> Penerbit </label>
                            <input class="form-control" name="penerbit"/>
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
                            <input class="form-control" name="isbn" id="isbn"/>
                        </div>
                        <div class="form-group">
                            <label> Jumlah Buku </label>
                            <input class="form-control" type="number" name="jumlah"/>
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
                            <a href="?page=buku&aksi=cancel" class="btn btn-danger"> Kembali </a>
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
        $sql = $koneksi->query("INSERT INTO tb_buku (id_buku, judul, pengarang, penerbit, tahun_terbit, isbn, jumlah_buku, lokasi)
        VALUES ('$_POST[id_buku]', '$_POST[judul]', '$_POST[pengarang]', '$_POST[penerbit]', '$_POST[tahun]', '$_POST[isbn]', '$_POST[jumlah]', '$_POST[lokasi]')");

        if ($sql) {
            ?>
            <script type = "text/javascript">
                alert ("Data Berhasil Disimpan");
                window.location.href="?page=buku";
            </script>
            <?php
        }
    }
?>