<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading"> Data Anggota </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <div>
                    <a href="?page=anggota&aksi=tambah" class="btn btn-success" style="margin-top: 8px;"><i class="fa fa-plus"></i> Tambah Data </a>
                    </div><br>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                                <th width="19%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 1;
                            $sql = $koneksi->query("SELECT * FROM tb_anggota");
                            while ($data = $sql->fetch_assoc()) {
                            ?>                            
                            <tr>
                                <td><?php echo $nomor++; ?></td>
                                <td><?php echo $data['id_anggota']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['tempat_lahir']; ?></td>
                                <td><?php echo date('d - m - Y', strtotime($data['tanggal_lahir'])); ?></td>
                                <td><?php echo $data['jenis_kelamin']; ?></td>
                                <td><?php echo $data['kelas']; ?></td>
                                <td>
                                    <a href="?page=anggota&aksi=ubah&id_anggota=<?php echo $data['id_anggota']; ?>" class="btn btn-warning" ><i class="fa fa-edit"></i> Ubah </a>
                                    <a onclick="return confirm('Anda ingin menghapus ?')" href="?page=anggota&aksi=hapus&id_anggota=<?php echo $data['id_anggota']; ?>" class="btn btn-danger" ><i class="fa fa-trash"></i> Hapus </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>                           