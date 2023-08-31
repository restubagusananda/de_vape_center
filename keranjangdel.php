<?php
include "koneksi.php";
$sqlk = mysql_query("delete from keranjang where idkeranjang='$_GET[idk]'");
if($sqlk){
  	echo "Produk ini telah dihapus dari keranjang anda";
  }else{
  	echo "Gagal menghapus produk ini dari keranjang";
  }
echo "<META HTTP-EQUIV='Refresh' Content='1; url=?p=keranjang'>";
?>