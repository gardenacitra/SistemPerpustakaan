<?php

require "../config/database_connection.php";

/**
 * searchBookById 
 * 
 * @param int $id
 * @return array
 */
function searchBookById(string $id) {
    $result_set = $koneksi->query("SELECT * FROM `tb_buku` WHERE `id` = $id");
    
}