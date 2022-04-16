<?php
    $sql = "SELECT max(id_pinjam) as maxKode FROM tb_transaksi";
    $data = mysqli_query($koneksi, $sql);
    $hasil = mysqli_fetch_array($data);

    $idPinjam = $hasil['maxKode'];
    $noUrut = (int) substr($idPinjam, 3, 3);
    $noUrut++;
    $char = "PJ";
    $idPinjam = $char . sprintf("%03s", $noUrut);
?>

<div class="panel panel-default">
    <div class="panel-heading"> Tambah Data Transaksi </div> 
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="#">
                        <div class="form-group">
                            <label> ID Pinjam </label>
                            <input class="form-control" name="id_pinjam" value="<?php echo $idPinjam ?>" readonly/>
                        </div>
                        <div class="form-group">
                        <div class="form-group">
                            <label> ID Buku </label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="id_buku" id="search-box">
                                <span class="input-group-btn">
                                    <a data-toggle="modal" class="btn btn-primary"><i class="fa fa-search"></i></a>
                                </span>
							</div>
                            <!-- <select class="form-control" name="buku">
                                <option>== Pilih ==</option>
                                <?php
                                    // $sql = $koneksi->query("SELECT * FROM tb_buku ORDER by id_buku");
                                    // while ($judul = $sql->fetch_assoc()) {
                                    //     echo "<option value='$judul[id_buku].$judul[judul]'>$judul[judul]</option>";
                                    // }
                                ?>
                            </select> -->
                        </div>  
                        <div class="form-group">
                            <label> Nama Anggota </label>
                            <select class="form-control" name="nama">
                                <option>== Pilih ==</option>
                                <?php 
                                    $sql = $koneksi->query("SELECT * FROM tb_anggota ORDER by id_anggota");       
                                    while ($nama = $sql->fetch_assoc()) {
                                        echo "<option value='$nama[id_anggota].$nama[nama]'>$nama[id_anggota] - $nama[nama]</option>";
                                    }                           
                                ?>  
                            </select>
                        </div>
                        <div class="form-group">
                            <label> Tanggal Pinjam </label>
                            <input class="form-control" type="text" name="pinjam" value="<?php echo date('d - m - Y'); ?>" readonly/>
                        </div>
                        <div class="form-group">
                            <label> Tanggal Kembali </label>
                            <input class="form-control" type="date" name="kembali" value="" />
                        </div>
                        <div class="col-md-12 bg-light text-right" >
                            <a href="?page=transaksi&aksi=cancel" class="btn btn-danger"> Kembali </a>
                            <input type="reset" name="reset" value="reset" class="btn btn-warning">
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </div>  
</div>

<?php
    // if (isset($_POST['simpan'])) 
    // {
    //     $tgl_pinjam		= isset($_POST['pinjam']) ? $_POST['pinjam'] : "";
    //     $tgl_kembali	= isset($_POST['kembali']) ? $_POST['kembali'] : "";

    //     $dapat_buku		= isset($_POST['buku']) ? $_POST['buku'] : "";
    //     $pecah_buku		= explode (".", $dapat_buku);
    //     $id_buku		= $pecah_buku[0];
    //     $judul			= $pecah_buku[1];
    //     // $lokasi			= $pecah_buku[2];

    //     $dapat_siswa	= isset($_POST['nama']) ? $_POST['nama'] : "";
    //     $pecah_siswa	= explode (".", $dapat_siswa);
    //     $id_anggota 	= $pecah_siswa[0];
    //     $nama			= $pecah_siswa[1];
    //     // $kelas  		= $pecah_siswa[2];

    //         $sql = $koneksi->query("SELECT * FROM tb_buku WHERE judul = '$judul'");
    //         while ($hasil = $sql->fetch_assoc()) {
    //             $sisa = $hasil['jumlah_buku'];

    //             $cek = $koneksi->query("SELECT * FROM tb_transaksi WHERE id_anggota = $id_anggota AND id_buku = $id_buku");
    //             $num1 = mysqli_num_rows($cek);

    //             if ($sisa == 0) {
    //                 echo "<script>alert('Stok bukunya telah habis, tidak dapat melakukan transaksi');</script>";
    //                 echo "<meta http-equiv='refresh' content='0; url=?page=transaksi&aksi=tambah'>";
    //             } elseif(!$num1) {
    //                 $qt = $koneksi->query("INSERT INTO tb_transaksi VALUES (null, '$id_buku', '$judul', '$id_anggota', '$nama', '$tgl_pinjam', '$tgl_kembali', 'Pinjam', null)") or die ("Gagal Masuk".mysql_error());

    //                 $qu	= $koneksi->query("UPDATE tb_buku SET jumlah_buku = (jumlah_buku-1) WHERE id_buku = $id_buku");		
    //                     if ($qt && $qu) {
    //                         echo "<script>alert('Transaksi Sukses');</script>";
    //                         echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
    //                     } else {
    //                         echo "<script>alert('Transaksi Gagal');</script>";
    //                         echo "<meta http-equiv='refresh' content='0; url=?page=input-transaksi'>";
    //                     }
    //             } else {
    //                 echo "<script>alert('Anda sudah meminjam buku yang sama');</script>";
    //                 echo "<meta http-equiv='refresh' content='0; url=?page=transaksi&aksi=tambah'>";
    //             }
    //         }
    // }
?>