<div class="panel panel-default">
    <div class="panel-heading"> Tambah Data Lokasi Buku </div> 
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12"> 
                    <form method="POST">
                        <div class="form-group">
                            <label> Lokasi Buku </label>
                            <input class="form-control" name="lokasi" id="lokasi" />
                        </div>
                        <div class="col-md-12 bg-light text-right" >
                            <a href="?page=lokasi&aksi=cancel" class="btn btn-danger"> Kembali</a>
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
        $sql = $koneksi->query("INSERT INTO tb_lokasi (lokasi) VALUES ('$_POST[lokasi]')");

        if ($sql) {
            ?>
            <script type = "text/javascript">
                alert ("Data Berhasil Disimpan");
                window.location.href="?page=lokasi";
            </script>
            <?php
        }
    }
?>