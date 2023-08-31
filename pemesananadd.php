<div class="container-pesan">
  <div class="top-pesan">
    Pesan Sekarang
  </div>
  <div class="grid">
    <div class="dh12">
      <div class="dh6">
	    <b>Produk</b>
		<table id='wborder2' border="0" width="100%" cellpadding="10" align="center">
		  <tr>
		    <th>No</th>
			<th>Device</th>
			<th>Harga</th>
		  </tr>
		  <?php
		  $sqlk = mysql_query("select * from keranjang where idmember = '$rm[idmember]'");
		  $total = 0;
		  $no=0;
		  while($rk = mysql_fetch_array($sqlk)){
		  	$sqls = mysql_query("select * from device where iddevice='$rk[iddevice]'");
		  	$rs=mysql_fetch_array($sqls);
		  	$no++;
		  	echo "<tr>";
		  	echo "<td>$no</td>";
		  	echo "<td>$rs[namadevice]</td>";
		  	echo "<td>Rp. $rs[harga]</td>";
		  	echo "</tr>";
			echo "<input name='iddevice' id='iddevice' type='hidden' value='$rs[iddevice]'>";
		  	$total = $total+$rs["harga"];
		  }
		  ?>
		</table>
	  </div>
	  <div class="dh6">
	    <p><b>Nama Pemesan : </b><b style="color:red;"><?php echo"$rm[nama]"; ?></b></p>
		<p><b>Nohp : </b><b style="color:red;"><?php echo"$rm[nohp]"; ?></b></p>
	    <p><b>Total Harga : </b><b style="color:red;"><?php echo"Rp.$total"; ?></b></p>
		<form name="formmasukkandatasaya" method="post" action="" enctype="multipart/form-data">
		<input name="btn0" id="btn0" type="submit" value="Masukkan Data Saya">
		</form>
		<?php
		$nama2="";
		$nohp2="";
		$kdpos2="";
		$prov2="";
		$kota2="";
		$kcmt2="";
		$alamat2="";
		if(isset($_POST["btn0"])){
		if($_POST["btn0"]){
		  $nama2="$rm[nama]";
		  $nohp2="$rm[nohp]";
		  $kdpos2="$rm[kdpos]";
		  $prov2="$rm[prov]";
		  $kota2="$rm[kota]";
		  $kcmt2="$rm[kcmt]";
		  $alamat2="$rm[alamat]";
		}
		}
		$kd = "ORDER";
		$d = date("d");
		$m = date("m");
		$y = date("Y");
		$j = date("h");
		$mi = date("i");
		$s = date("s");
		?>
	  </div>
	</div>
	<div class="dh12">
	  <div class="isipesan">
	    <form name="formpesan" method="post" action="" enctype="multipart/form-data">
		<input name="idmember" id="idmember" type="hidden" value="<?php echo "$rm[idmember]"; ?>">
		<input name="kdpemesanan" type="hidden" value="<?php echo "$kd-$y$m$d$j$mi$s"; ?>">
	    <p>
	    <div class="dh4">
		  Nama Penerima :
		  <input name="nama2" id="nama2" type="input" value="<?php echo "$nama2"; ?>">
		</div>
		<div class="dh4">
		  No.Hp Penerima :
		  <input name="nohp2" id="nohp2" type="input" value="<?php echo "$nohp2"; ?>">
		</div>
		<div class="dh4">
		  Kode Pos :
		  <input name="kdpos2" id="kdpos2" type="input" value="<?php echo "$kdpos2"; ?>">
		</div>
		</p>
		<p style="padding-top:30px;"></p>
		<p>
	    <div class="dh4">
		  Provinsi Penerima :
		  <input name="prov2" id="prov2" type="input" value="<?php echo "$prov2"; ?>">
		</div>
		<div class="dh4">
		  Kota Penerima :
		  <input name="kota2" id="kota2" type="input" value="<?php echo "$kota2"; ?>">
		</div>
		<div class="dh4">
		  Kecamatan Penerima :
		  <input name="kcmt2" id="kcmt2" type="input" value="<?php echo "$kcmt2"; ?>">
		</div>
		</p>
		<p style="margin-top:10px;"></p>
		<div class="dh12">
		  <p>Alamat Penerima
		    <textarea name="alamat2" id="alamat2"><?php echo "$alamat2"; ?></textarea>
		  </p>
		</div>
		<p style="padding-top:10px;"></p>
		<div class="dh12">
		  <p>Catatan Untuk penerima
		    <textarea name="catatan" id="catatan"></textarea>
		  </p>
		</div>
		<p style="padding-top:10px;"></p>
		<div class="dh12">
		  <p>
		  <input name="submit" id="submit" type="submit" value="SUBMIT">
		  </p>
		</div>
		</form>
		<p>&nbsp;
		<?php
		if(isset($_POST["submit"])){
		if($_POST["submit"]){
		  if($_POST["nama2"]!=null&&$_POST["nohp2"]!=null&&$_POST["kdpos2"]!=null&&$_POST["prov2"]!=null&&$_POST["kota2"]!=null&&$_POST["kcmt2"]!=null&&$_POST["alamat2"]!=null){
			$sqlk2 = mysql_query("select * from keranjang where idmember = '$rm[idmember]'");
			while($rk2=mysql_fetch_array($sqlk2)){
			  $sqls0 = mysql_query("select * from device where iddevice='$rk2[iddevice]'");
			  $rk0 = mysql_fetch_array($sqls0);
			  $sqlp = mysql_query("insert into pemesanan (idmember, iddevice, kdpemesanan, nama2, nohp2, kdpos2, prov2, kota2, kcmt2, alamat2, harga2, catatan, tglpemesanan) values ('$_POST[idmember]', '$rk2[iddevice]', '$_POST[kdpemesanan]', '$_POST[nama2]', '$_POST[nohp2]', '$_POST[kdpos2]', '$_POST[prov2]', '$_POST[kota2]', '$_POST[kcmt2]', '$_POST[alamat2]', '$rk0[harga]', '$_POST[catatan]', NOW())");
			  if($sqlp){
				$sqls = mysql_query("select * from device where iddevice='$rk2[iddevice]'");
				$stoknow = $rs[stok]-1;
				$sqls2 = mysql_query("update device set stok='$stoknow' where iddevice='$rs[iddevice]'");
				$sqlk3 = mysql_query("delete from keranjang where idkeranjang='$rk2[idkeranjang]'");
				echo "Pesanan berhasil ditambah!!!";
			  }
			}
		  }else{
			echo "Data Tidak Lengkap!!!";
		  }
		  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=pemesanan'>";
		}
		}
		?>
		</p>
	  </div>
	</div>
  </div>
</div>