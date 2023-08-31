<?php
$sqlp=mysql_query("select * from pemesanan where kdpemesanan='$_GET[kdp]'");
$total=0;
while($rp=mysql_fetch_array($sqlp)){
  $total=$total+$rp["harga2"];
  $kdpemesanan=$rp["kdpemesanan"];
}
?>
<div class="container4">
  <div class="transtop">Pilih Metode Pembayaran</div>
  <div class="grid">
    <form name="formpilihpembayaran" method="post" action="" enctype="multipart/form-data">
    <div class="dh12">
	  <div class="dh6" align="center">
	    <img src="cpanel/pembayaran/card.jpg" width="150px">
		<p><input name="rbayar" type="radio" value="CARD"></p>
		<p style="margin-top:-10px;">Card</p>
	  </div>
	  <div class="dh6" align="center">
	    <img src="cpanel/pembayaran/cod.jpeg" width="150px">
		<p><input name="rbayar" type="radio" value="COD"></p>
		<p style="margin-top:-10px;">Cash On Delivery</p>
	  </div>
	</div>
	<div align="center"><input type="submit" name="submit" value="Pilih pembayaran" /></div>
	</form>
  </div>
<?php
if(isset($_POST["submit"])){
if($_POST["submit"]&&$_POST["rbayar"]=="CARD"){
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=transaksicard&kdp=$_GET[kdp]'>";
}else if($_POST["submit"]&&$_POST["rbayar"]=="COD"){
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=transaksicod&kdp=$_GET[kdp]'>";
}
}
?>
</div>


