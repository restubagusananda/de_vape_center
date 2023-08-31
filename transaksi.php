<?php
include "koneksi.php";
$sqlt=mysql_query("select * from transaksi where idmember='$rm[idmember]'");
?>
<div class="container4">
  <div class="transtop">Riwayat Transaksi Anda</div>
  <table id="wborder2" border="1" cellpadding="0.1" align="center" width="100%">
    <tr>
	  <th>No</th>
	  <th>Jenis Transaksi</th>
	  <th>Total Bayar</th>
	  <th>Tanggal Transaksi</th>
	</tr>
<?php
$no=0;
while($rt=mysql_fetch_array($sqlt)){
  $no++;
  if($rt["jenisbayar"]=="cod"){
	$jenisbayar="COD";
  }else{
	$jenisbayar="Rekening";
  }
  $sqlp=mysql_query("select * from pemesanan where kdpemesanan='$rt[kdpemesanan]'");
  $rp=mysql_fetch_array($sqlp);
  echo "
	<tr>
	  <td>$no</td>
	  <td>$jenisbayar</td>
	  <td>$rt[totalbayar]</td>
	  <td>$rt[tgltransaksi]</td>
	</tr>";
}
?>
  </table>
</div>