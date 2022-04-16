<?php
	$id_buku = $_GET ['id_buku'];
	$koneksi->query("DELETE FROM tb_buku WHERE id_buku ='$id_buku'");
?>

<script type="text/javascript">
	alert ("Data Berhasil Dihapus");
	window.location.href="?page=buku";
</script>