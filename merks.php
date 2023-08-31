<div class="container4">
  <div class="grid">
	<div class="jisi"><big>All Device</big></div>
	<div class="dh4">
      <div class="border">
        <a href="<?php echo"?p=pilihdevice&idmerk=all"; ?>">
        <p align="center"><img class="bulat" src="images/VS.jpg" width="100px" height="100px"></img></p>
        <p align="center">All Device</p>
	  </div>
    </div>
	<?php
	include "koneksi.php";
	$sqlmerk = mysql_query("select * from merk");
	$k=1;
	while($rmerk = mysql_fetch_array($sqlmerk)){
	  $k++;
	?>
	<div class="dh4">
	  <div class="border">
		<a href="<?php echo"?p=pilihdevice&idmerk=$rmerk[idmerk]"; ?>">
		<p align="center"><?php echo "<img class='bulat' src='cpanel/logo/$rmerk[logo]' width='100px' height='100px'>"; ?></p>
		<p align="center"><?php echo "$rmerk[namamerk]"; ?></p>
		</a>
	  </div>
	</div>
	<?php 
	}
	?>
  </div>
</div>