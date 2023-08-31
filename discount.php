<?php include "koneksi.php"; ?>
<div class="container4">
  <div class="grid">
    <div class="dh12">
	  <div class="jisi">DISCOUNTED DEVICE</div>
	  <?php
	  $sqld = mysql_query("select * from discount order by iddiscount asc");
	  $no = 1;
	  while($rd = mysql_fetch_array($sqld)){
	  	$sqlmerk = mysql_query("select * from merk where idmerk='$rd[idmerk]'");
	  	$rmerk = mysql_fetch_array($sqlmerk);
	  	$sqls = mysql_query("select * from device where iddevice='$rd[iddevice]'");
	  	$rs = mysql_fetch_array($sqls);
		?>
	  <div class="dh4">
	    <div id="border">
		  <p align="center">
		  <a style="text-decoration:none;" href="<?php echo "?p=device&idd=$rs[iddevice]"; ?>">
		  <img src="<?php echo "cpanel/device/$rs[foto]"; ?>" height='100px'></br>
		  <?php echo "$rs[namadevice]"; ?></br></a>
		  <?php echo "Stok: $rs[stok]"; ?></br>
		  <?php echo "<strike>Harga: Rp.$rd[hargaasli]</strike>"; ?></br>
		  <?php echo "Harga: Rp.$rs[harga]"; ?></br>
		  <b style="color:red"><?php echo "$rd[discount]% Discount"; ?></b></br>
		  <ul id="tombol2" align="center">
		    <li>
		      <a href="<?php echo "?p=keranjangadd&idd=$rs[iddevice]";?>">Tambah ke Keranjang</a>
		    </li>
		  </ul>
		  </p>
		</div>
	  </div>
	  <?php
	  }
	  ?>
	</div>
  </div>
</div>

