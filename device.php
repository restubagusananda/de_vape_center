<?php
include "koneksi.php";
$sqls=mysql_query("select * from device where iddevice = '$_GET[ids]'");
$rs=mysql_fetch_array($sqls);
if($rs["status"]=="diskon"){
  $sqld=mysql_query("select * from discount where iddevice='$rs[iddevice]'");
  $rd=mysql_fetch_array($sqld);
  $harga="<b style='color:red;'>Discounted by $rd[discount]%</b></br><strike>Harga : Rp.$rd[hargaasli]</strike></br>Harga : Rp.$rs[harga]";
}else{
  $harga="Harga : Rp.$rs[harga]";
}
?>
<div class="container4">
  <div class="grid">
    <div class="jisi"><big><?php echo "$rs[namadevice]"; ?></big></div>
	<?php
	    if($rs["status"]=="diskon"){
	      echo "
	    <p style='position:absolute;margin-top:0px;margin-left:460px;'><img src='images/diskon.png' width='200px'</p>";
	  }
	  ?>
    <div class="dh12">
	  <div class="dh6">
	    <div>
		  <p>Nama : <?php echo "$rs[namadevice]"; ?></p>
		  <p>Stok : <?php echo "$rs[stok]"; ?></p>
		  <p><?php echo "$harga"; ?></p>
		  <p>Spesifikasi :</br>
		  <?php echo "$rs[spesifikasi]"; ?></p>
		</div>
	  </div>
	  <div class="dh6">
		<div id="border">
		  <p align="center"><img src="<?php echo "cpanel/device/$rs[foto]"; ?>" width="250px"></p>
		  <p align="center" style="margin-top:0px;">
		  <ul id="tombol" align="center">
		    <li>
		      <a href="<?php echo "?p=keranjangadd&ids=$rs[iddevice]";?>">Tambah ke Keranjang</a>
		    </li>
		  </ul>
		  </p>
		</div>
	  </div>
	</div>
  </div>
</div>