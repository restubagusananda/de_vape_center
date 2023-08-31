<?php
include "koneksi.php";
$sqlp2=mysql_query("select * from pemesanan where kdpemesanan='$_GET[kdp]'");
$total=0;
while($rp2=mysql_fetch_array($sqlp2)){
  $total=$total+$rp2["harga2"];
  $kdpemesanan=$rp2["kdpemesanan"];
}
$sqlp=mysql_query("select * from pemesanan where kdpemesanan='$_GET[kdp]'");
$rp=mysql_fetch_array($sqlp);
?>
<div class="container4">
  <div class="transtop">Pembayaran dengan Kartu debit</div>
  <div class="grid">
    <p align="center" style="margin-top:-0px;">
    Harap periksa kembali data pengiriman anda</br>
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
	
	
	<p align="center">Mohon <b style="color:red">periksa kembali</b> data pengiriman anda.</p>
	<p align="center">Silahkan transfer ke rekening dibawah </p>
	<p align="center"><input type="text" name="norek" value="88888888888" disabled style="text-align:center"></p>
	<p align="center">Sejumlah <b style="color:red">Rp.<?php echo "$total,-";?></b></p>
	
	
	
	
	
	<form name="formupload" method="post" action="" enctype="multipart/form-data">
	<div align="center">
	  <p>Silahkan upload foto bukti transfer anda</br>
	  <input type="file" name="bukti"/></p>
	</div>
	<div align="center"><input type="submit" name="submitcard" value="Upload"/></div>
	</form>
  </div>
  <?php
  if(isset($_POST["submitcard"])){
  if($_POST["submitcard"]){
	$nmbukti  = $_FILES["bukti"]["name"];
	$lokbukti = $_FILES["bukti"]["tmp_name"];
	if(!empty($lokbukti)){
		move_uploaded_file($lokbukti, "cpanel/bukti/$nmbukti");
		$bukti = ", bukti='$nmbukti'";
	}else{
		$bukti = "";
	}
	$sqlp=mysql_query("update pemesanan set status='sudah' $bukti where kdpemesanan='$kdpemesanan'");
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=pemesanan'>";
	echo "Pembayaran berhasil";
  }
  }
  ?>
</div>