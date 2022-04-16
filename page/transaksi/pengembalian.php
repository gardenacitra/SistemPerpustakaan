<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading"> Data Transaksi Pengembalian </div>
                <div class="panel-body">
                    <div class="table-responsive">
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
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>
                                        <a href="?page=transaksi&aksi=detail&id=" class="btn btn-primary"><i class="fa fa-eye"></i> Detail Pinjam </a>
                                        <a onclick="return confirm('Anda yakin ingin menghapus ?')" href="?page=transaksi&aksi=hapus&id=" class="btn btn-danger" ><i class="fa fa-trash"></i> Hapus </a>
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