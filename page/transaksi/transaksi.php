<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading"> Data Transaksi Peminjaman </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <div>
                            <a href="?page=transaksi&aksi=tambah" class="btn btn-success" style="margin-top: 8px;"><i class="fa fa-plus"></i> Tambah Data </a>
                        </div><br>
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Pinjam</th>
                                    <th>ID Anggota</th>
                                    <th>Nama</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                    <th>Terlambat</th>
                                    <th width="21%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            $no = 1;
                            $sql = "SELECT * FROM tb_transaksi INNER JOIN tb_buku ON tb_transaksi.id_buku = tb_buku.id_buku INNER JOIN tb_anggota ON tb_transaksi.id_anggota = tb_anggota.id_anggota";
                            $data = mysqli_query($koneksi, $sql);
                            $hasil = mysqli_fetch_array($data);
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $hasil['id_pinjam'] ?></td>
                                    <td><?php echo $hasil['id_anggota']; ?></td>
                                    <td><?php echo $hasil['nama']; ?></td>
                                    <td><?php echo date('d - m - Y', strtotime($hasil['tgl_pinjam'])); ?></td>
                                    <td><?php echo date('d - m - Y', strtotime($hasil['tgl_kembali'])); ?></td>
                                    <td><?php echo $hasil['status']; ?></td>
                                    <td>
                                    
                                    </td>
                                    <td>
                                        <a href="?page=transaksi&aksi=&id=" class="btn btn-warning"><i class="fa fa-sign-out"></i> Kembalikan </a>
                                        <a href="?page=transaksi&aksi=&id=" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                        <a href="?page=transaksi&aksi=&id=" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        <!-- <a href="?page=transaksi&aksi=perpanjang&id=&tgl_kembali=&lambat=" class="btn btn-danger"> Perpanjang </a> -->
                                    </td>
                                </tr>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                          