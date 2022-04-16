<?php
	$id_anggota = $_GET ['id_anggota'];
	$koneksi->query("DELETE FROM tb_anggota WHERE id_anggota ='$id_anggota'");
?>

<script type="text/javascript">
    alert ("Data Berhasil Dihapus");
	window.location.href="?page=anggota";
</script>