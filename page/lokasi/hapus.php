<?php
	$id_lokasi = $_GET ['id_lokasi'];
	$koneksi->query("DELETE FROM tb_lokasi WHERE id_lokasi ='$id_lokasi'");
?>

<script type="text/javascript">
	alert ("Data Berhasil Dihapus");
	window.location.href="?page=lokasi";
</script>