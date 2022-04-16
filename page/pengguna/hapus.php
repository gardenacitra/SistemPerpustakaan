<?php
	$ambil = $koneksi->query("SELECT * FROM tb_pengguna WHERE id='$_GET[id]'");
	$data = $ambil->fetch_assoc();
	$foto = $data['foto'];
	if (file_exists("images/$foto_produk")) {
		unlink("images/$foto_produk");
	}
	$koneksi->query("DELETE FROM tb_pengguna WHERE id='$_GET[id]'");
?>

<script type="text/javascript">
	alert ("Data Berhasil Dihapus");
    window.location.href="?page=pengguna";
</script>