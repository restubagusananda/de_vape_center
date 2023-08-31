<?php
include "koneksi.php";
$sqlp=mysql_query("select * from pemesanan where kdpemesanan='$_GET[kdp]'");
$total=0;
while($rp2=mysql_fetch_array($sqlp)){
  $total=$total+$rp2["harga2"];
  $kdpemesanan=$rp2["kdpemesanan"];
}
$sqlp=mysql_query("select * from pemesanan where kdpemesanan='$_GET[kdp]'");
$rp=mysql_fetch_array($sqlp);
?>
<div class="container4">
  <div class="transtop">Cash On delivery</div>
  <div class="grid">
    <p align="center" style="margin-top:-0px;">
    COD / Pembayaran ditempat akan dilakukan ketika kurir kami telah memberikan barangnya kepada penerima.</br>
    Kurir kami akan mengirim barang ke alamat sesuai dengan alamat penerima.</br>
    </p>
    <div class="dh12">
	  <div class="dh6">
	    <div id="border" style="min-height:280px;">
          <div class="transtop">Penerima Barang</div>
          <p style="padding-left:10px;">Nama : <?php echo "$rp[nama2]"; ?></p>
          <p style="padding-left:10px;">Prov : <?php echo "$rp[prov2]"; ?></p>
          <p style="padding-left:10px;">Kota : <?php echo "$rp[kota2]"; ?></p>
          <p style="padding-left:10px;">Alamat : <?php echo "$rp[alamat2]"; ?></p>
          <p style="padding-left:10px;">Nohp : <?php echo "$rp[nohp2]"; ?></p>
          <p style="padding-left:10px;">Catatan : <?php echo "$rp[catatan]"; ?></p>
		</div>
	  </div>
	  <div class="dh6">
	    <div id="border" style="min-height:280px;">
          <div class="transtop">Pemesan Barang</div>
          <p style="padding-left:10px;">Nama : <?php echo "$rm[nama]"; ?></p>
          <p style="padding-left:10px;">Prov : <?php echo "$rm[prov]"; ?></p>
          <p style="padding-left:10px;">Kota : <?php echo "$rm[kota]"; ?></p>
          <p style="padding-left:10px;">Alamat : <?php echo "$rm[alamat]"; ?></p>
          <p style="padding-left:10px;">Nohp : <?php echo "$rm[nohp]"; ?></p>
		</div>
	  </div>
    </div>
	<p style="font-size:14px;padding-left:10px;">Nb:</br>
	dengan melakukan pembayaran dengan COD, status transaksi anda masih <b style="color:red">belum disubmit</b>, sampai anda membayarnya melalui kurir kami. COD dapat dibatalkan oleh admin, selama produk belum dibayar.</p>
	<p align="center">Apakah anda yakin akan melakukan COD?</p>
	<form name="formyakin" method="post" action="" enctype="multipart/form-data">
	<div class="dh6" align="center">
	  <p><input name="ryakin" type="radio" value="yes"></p>
	  <p style="margin-top:-10px;">YES</p>
	</div>
	<div class="dh6" align="center">
	  <p><input name="ryakin" type="radio" value="no"></p>
	  <p style="margin-top:-10px;">NO</p>
	</div>
	<div align="center"><input type="submit" name="submitcod" value="SUBMIT"/></div>
	</form>
  </div>
  <?php
  if(isset($_POST["submitcod"])){
  if($_POST["submitcod"]&&$_POST["ryakin"]=="yes"){
	$sqlp=mysql_query("update pemesanan set status='cod' where kdpemesanan='$kdpemesanan'");
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=pemesanan'>";
	echo "yes";
  }else if($_POST["submitcod"]&&$_POST["ryakin"]=="no"){
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=pemesanan'>";
  }
  }
  ?>
</div>