<div class="container4" style="background-color:#229922">
  <div class="grid">
    <div class="jisi">Pemesanan Anda</div></br>
    <div class="dh12">
<?php
$kd="";
include "koneksi.php";
$sqlp = mysql_query("select * from pemesanan where idmember=$rm[idmember] order by kdpemesanan asc");
if(!$rp2=mysql_fetch_array($sqlp)){
  echo "Belum ada Pemesanan Saat ini";
}else{
  $sqlp = mysql_query("select * from pemesanan where idmember=$rm[idmember] order by kdpemesanan asc");
  while($rp = mysql_fetch_array($sqlp)){
    if($kd==$rp["kdpemesanan"]){
  	  continue;
    }
    $kd=$rp["kdpemesanan"];
    if($rp["status"]=="cod"||$rp["status"]=="sudah"){
  	  if($rp["status"]=="cod"){
  	    $stat0="pembayaran:</br>COD";
  	  }else if($rp["status"]=="sudah"){
  	    $stat0="pembayaran:</br>REKENING";
  	  }
  	  $btnmulaitrans="<div id='border' style='background-color:#225522;'><b style='color:#FFFFFF;'>Sedang diproses</b></br><b style='color:#99FF99;font-size:12px;'>$stat0</b></div>";
      }else{
  	    $btnmulaitrans="<input name='$kd' style='background-color:#882222;color:yellow;' type='submit' value='Mulai Transaksi' style='background-position:center;'>";
      }
      echo "<div class='dh6' style='background-color:#FFFFFF;box-shadow:0 0 2px #000000;margin-top:-15px;margin-bottom:20px;min-height:420px;max-height:420px;'>";
      echo "<div id='border' align='center' style='margin-top:-10px;'>";
      echo "<div id='jdlborder'><p align='center'><b>Kode Pemesanan : <b style='color:yellow;'>$rp[kdpemesanan]</b></b></p></div>";
      echo "<div class='dh12' style='margin-top:-10px;'>";
?>
	<table border="1" cellpadding="0.1" align="center" width="100%" style="background-color:#FFFFFF;font-size:12px;">
	  <tr style="background-color:#119922;">
	    <th>No</th>
	    <th>Device</th>
	    <th>Harga</th>
	  </tr>
	  <?php
	  $sqlp2=mysql_query("select * from pemesanan where kdpemesanan='$kd'");
	  $no=0;
	  $total=0;
	  while($rp2 = mysql_fetch_array($sqlp2)){
	    $no++;
	    $sqls = mysql_query("select * from device where iddevice='$rp2[iddevice]'");
	    $rs = mysql_fetch_array($sqls);
	  echo "
	          <tr>
	            <td>$no</td>
	            <td>$rs[namadevice]</td>
	            <td>Rp.$rs[harga]</td>
	          </tr>";
	    $total = $total+$rs["harga"];
	  }
	  ?>
	        </table>
  <?php
  echo "
	        <p align='center' style='margin-top:0px;'>Total yang harus dibayar: <b style='color:red'>Rp.$total,-</b></p>";
  ?>
<?php
  echo "
	        <div class='dh6' style='margin-top:-10px;'>
	          <div id=subborder>
	            <b><u>Data Penerima</u></b>
	            <p>Nama: $rp[nama2]</p>
	            <p>Nohp: $rp[nohp2]</p>
	            <p>Kode Pos: $rp[kdpos2]</p>
	            <p>Provinsi: $rp[prov2]</p>
	            <p>Kota: $rp[kota2]</p>
	            <p>Kecamatan: $rp[kcmt2]</p>
	            <p>Catatan Untuk Penerima : </br><b>$rp[catatan]</b></p>
	          </div>
	        </div>
	        <div class='dh6' style='margin-top:-10px;'>
	          <div id=subborder>
	            <b><u>Data Pemesan</u></b>
	            <p>Nama : $rm[nama]</p>
	            <p>Nohp: $rm[nohp]</p>
	          </div>
			  <form name='formmulaitrans$kd' method='post' action='' enctype='multipart/form-data'>
	          $btnmulaitrans
			  </form>
	        </div>";
  if(isset($_POST["$kd"])){
    if($_POST["$kd"]){
      echo "$rp[kdpemesanan]";
      echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=transaksiadd&kdp=$rp[kdpemesanan]'>";
    }
  }
  	echo "
	      </div>
	    </div>
	  </div>";
  }
  }
?>
	</div>
  </div>
</div>




