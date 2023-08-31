<div class="container4">
  <div class="grid">
<?php
include "koneksi.php";
if(isset($_GET["idmerk"])){
  if($_GET["idmerk"]=="all"){
	$sqls = mysql_query("select * from device");
	$no=0;
	echo "
	<div class='jisi'><big>All Device</big></div>
	";
	while($rs=mysql_fetch_array($sqls)){
	  if($rs["status"]=="diskon"){
	    $sqld=mysql_query("select * from discount where iddevice='$rs[iddevice]'");
	    $rd=mysql_fetch_array($sqld);
	?>
	  <div class="dh4">
	    <div id="border">
		  <a style="text-decoration:none;" href="<?php echo"?p=device&idd=$rs[iddevice]"; ?>">
		  <p align="center"><?php echo "<img class='bulat' src='cpanel/device/$rs[foto]' width='100px' height='100px'>"; ?></br>
		  <?php echo "$rs[namadevice]"; ?></br>
		  </a>
		  Stok : <?php echo "$rs[stok]"; ?></br>
		  </p>
		  <p align="center" style="height:10px;">Harga : <?php echo "<strike>Rp.$rd[hargaasli]</strike></br>Rp.$rs[harga]"; ?></p></br>
		  <ul id="tombol2" align="center">
		    <li>
		      <a href="<?php echo "?p=keranjangadd&ids=$rs[iddevice]";?>">Tambah ke Keranjang</a>
		    </li>
		  </ul>
		</div>
	  </div>
	<?php
		continue;
	  }
	
?>
	<div class="dh4">
	  <div id="border">
	    <a style="text-decoration:none;" href="<?php echo"?p=device&idd=$rs[iddevice]"; ?>">
	    <p align="center"><?php echo "<img class='bulat' src='cpanel/device/$rs[foto]' width='100px' height='100px'>"; ?></br>
	    <?php echo "$rs[namadevice]"; ?></br>
	    </a>
	    Stok : <?php echo "$rs[stok]"; ?></br>
	    </p>
	    <p align="center" style="height:10px;">Harga : <?php echo "Rp.$rs[harga]"; ?></p></br>
	    <ul id="tombol2" align="center">
	      <li>
	        <a href="<?php echo "?p=keranjangadd&idd=$rs[iddevice]";?>">Tambah ke Keranjang</a>
	      </li>
	    </ul>
	  </div>
	</div>
<?php
	  }
	}else{
	  $sqls0 = mysql_query("select * from device where idmerk='$_GET[idmerk]'");
	  $no=0;
	  $rs0=mysql_fetch_array($sqls0);
	  echo "
	  <div class='jisi'><big>$rs0[merk]</big></div>
	  ";
	  $sqls2 = mysql_query("select * from device where idmerk='$_GET[idmerk]'");
	  while($rs2=mysql_fetch_array($sqls2)){
		if($rs2["status"]=="diskon"){
	      $sqld=mysql_query("select * from discount where iddevice='$rs2[iddevice]'");
	      $rd=mysql_fetch_array($sqld);
?>
    <div class="dh4">
	    <div id="border">
		  <a style="text-decoration:none;" href="<?php echo"?p=device&idd=$rs2[iddevice]"; ?>">
		  <p align="center"><?php echo "<img class='bulat' src='cpanel/device/$rs2[foto]' width='100px' height='100px'>"; ?></br>
		  <?php echo "$rs2[namadevice]"; ?></br>
		  </a>
		  Stok : <?php echo "$rs2[stok]"; ?></br>
		  </p>
		  <p align="center" style="height:10px;">Harga : <?php echo "<strike>Rp.$rd[hargaasli]</strike></br>Rp.$rs2[harga]"; ?></p></br>
		  <ul id="tombol2" align="center">
		    <li>
		      <a href="<?php echo "?p=keranjangadd&idd=$rs2[iddevice]";?>">Tambah ke Keranjang</a>
		    </li>
		  </ul>
		</div>
	  </div>
	  <?php
	    continue;
	  }
	?>
	<div class="dh4">
	  <div id="border">
		<a style="text-decoration:none;" href="<?php echo"?p=device&idd=$rs2[iddevice]"; ?>">
		<p align="center"><?php echo "<img class='bulat' src='cpanel/device/$rs2[foto]' width='100px' height='100px'>"; ?></br>
		<?php echo "$rs2[namadevice]"; ?></br>
		</a>
		Stok : <?php echo "$rs2[stok]"; ?></br>
		</p>
		<p align="center" style="height:10px;">Harga : <?php echo "Rp.$rs2[harga]"; ?></p></br>
		<ul id="tombol2" align="center">
		  <li>
		    <a href="<?php echo "?p=keranjangadd&idd=$rs2[iddevice]";?>">Tambah ke Keranjang</a>
		  </li>
		</ul>
	  </div>
	</div>
<?php
	}
  }
}
?>
  </div>
</div>