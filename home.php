<?php
include "koneksi.php";
$sqlpr1 = mysql_query("select * from promo where jenispromo='pengumuman'");
$rpr1 = mysql_fetch_array($sqlpr1);
$row1 = mysql_num_rows($sqlpr1);
$sqlpr2 = mysql_query("select * from promo where jenispromo='promovp'");
$rpr2 = mysql_fetch_array($sqlpr2);
$row2 = mysql_num_rows($sqlpr2);
?>
<div class="grid" align="center">
  <div style="border-bottom:1px solid #000;">
  <?php
  if($row1<1){
	echo "
	<p style='background-color:#262626;color:#FFF;margin-top:-20px;font-size:20px;margin-bottom:0px;'><u>Belum ada pengumuman dari admin saat ini</u></p>
	";
  }else{
	echo "
	<p align='center' style='background-color:#8b0000;color:#FFF;margin-top:-20px;font-size:20px;margin-bottom:0px;'>$rpr1[judulpromo]</p>
	<img src='promo/$rpr1[fotopromo]' width='100%'>
	<p style='font-family:Arial;padding-left:5px;'>$rpr1[isipromo]</p>
	";
  }
  ?>
  </div>
  
  <div style="border-bottom:1px solid #000;margin-top:25px;">
  <?php
  if($row2<1){
	echo "";
  }else{
	echo "
	<a href='?p=device&ids=$rpr2[iddevice]' style='text-decoration:none'>
	<p style='background-color:#262626;color:#FFF;margin-top:-20px;font-size:20px;margin-bottom:0px;'>$rpr2[judulpromo]</p>
	<img src='promo/$rpr2[fotopromo]' width='100%' height='350px'>
	<p style='font-family:Arial;padding-left:5px;'>$rpr2[isipromo]</p></a>
	";
  }
  ?>
  </div>
  
</div>