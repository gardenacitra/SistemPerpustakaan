<?php
error_reporting(0);
$koneksi = new mysqli("localhost","root","","db_perpus");

$content ='
    <style type="text/css">
        .tabel{border-collapse: collapse;}
        .tabel th{padding: 8px 5px;  background-color:  #cccccc;  }
        .tabel td{padding: 8px 5px;   }
    </style>
';


$content .= '
<page>
    <h1>Laporan Data Buku</h1>
    <br>
    <table border="1px" class="tabel"  >
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>ISBN</th>
            <th>Jumlah Buku</th>
            <th>Lokasi</th>
        </tr>';

        if (isset($_POST['cetak'])) {
            
            $tgl1 = $_POST['tanggal1'];
            $tgl2 = $_POST['tanggal2'];

            $no = 1;
            $sql = $koneksi->query("SELECT * FROM tb_buku WHERE tanggal_input BETWEEN '$tgl1' AND '$tgl2' ");
            while ($tampil = $sql->fetch_assoc()) {

            $content .='
                <tr>
                    <td align="center">'.$no++.'</td>
                    <td align="center">'.$tampil['judul'].'</td>
                    <td align="center">'.$tampil['pengarang'].'</td>
                    <td align="center">'.$tampil['penerbit'].'</td>
                    <td align="center">'.$tampil['tahun_terbit'].'</td>
                    <td align="center">'.$tampil['isbn'].'</td>
                    <td align="center">'.$tampil['jumlah_buku'].'</td>
                    <td align="center">'.$tampil['lokasi'].'</td>
                </tr>
            ';	
            }
       
        } else {

            $no = 1;
            $sql = $koneksi->query("SELECT * FROM tb_buku");
            while ($tampil = $sql->fetch_assoc()) {
                $content .='
                    <tr>
                        <td align="center">'.$no++.'</td>
                        <td align="center">'.$tampil['judul'].'</td>
                        <td align="center">'.$tampil['pengarang'].'</td>
                        <td align="center">'.$tampil['penerbit'].'</td>
                        <td align="center">'.$tampil['tahun_terbit'].'</td>
                        <td align="center">'.$tampil['isbn'].'</td>
                        <td align="center">'.$tampil['jumlah_buku'].'</td>
                        <td align="center">'.$tampil['lokasi'].'</td>
                    </tr>
                ';
            }
        }

        $content .='


    </table>
</page>';

require_once('../assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P','A4','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('exemple.pdf');
?>
