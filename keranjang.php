<?php
if(!empty($_SESSION["usermbr"]) and !empty($_SESSION["passmbr"])){
?>
<div class="jisi2" align="center"><big>Keranjang Anda</big></div>
<table id='wborder' border="1" width="100%" cellpadding="10" align="center">
  <tr>
    <th width="10px">NO</th>
    <th width="100px">FOTO</th>
    <th>DEVICE</th>
    <th width="200px">HARGA</th>
	<th width="100px">AKSI</th>
  </tr>
<?php
$sqlk = mysql_query("select * from keranjang where idmember = '$rm[idmember]'");
$total = 0;
$no=0;
while($rk = mysql_fetch_array($sqlk)){
	$sqls = mysql_query("select * from device where iddevice='$rk[iddevice]'");
	$rs=mysql_fetch_array($sqls);
	$no++;
	echo "<tr>";
	echo "<td>$no</td>";
	echo "<td><img src='cpanel/device/$rs[foto]' width='90px' height='80px'></td>";
	echo "<td>$rs[namadevice]</td>";
	echo "<td>Rp. $rs[harga]</td>";
	echo "<td><a href='?p=keranjangdel&idk=$rk[idkeranjang]'>Batalkan Produk ini</a></td>";
	echo "</tr>";
	$total = $total+$rs["harga"];
}

?>
</table>
<div class="botisi">
  <div class="dh12">
    <div class="dh5">
	
<?php
echo "<div id='judulmerk'>Total Harga : <b style='color:red;'>Rp.$total</b></div>";
echo "</div>";
?>
<form name="formkeranjang" method="post" action="" enctype="multipart/form-data">
<div class="dh3">
  <input name="tambahproduk" type="submit" id="btnpemesanan" value="Tambahkan Produk">
</div>
<?php
if($total>0){
?>
    <div class="dh3">
      <input name="mulaipemesanan" type="submit" id="btnpemesanan" value="Pesan Sekarang">
    </div>
<?php
}
?>
</form>
  </div>
</div>
<?php
if(isset($_POST["mulaipemesanan"])){
if($_POST["mulaipemesanan"]){
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=pemesananadd'>";
}
}
if(isset($_POST["tambahproduk"])){
if($_POST["tambahproduk"]){
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=merks'>";
}
}
}else{
  echo "Anda Harus Login atau Register Terlebih Dahulu";
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=register'>";
}
?>
