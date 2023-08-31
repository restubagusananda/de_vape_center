<?php
if(!empty($_SESSION["usermbr"]) and !empty($_SESSION["passmbr"])){
  include "koneksi.php";
  $sqls = mysql_query("select * from device where iddevice='$_GET[idd]'");
  $rs = mysql_fetch_array($sqls);
  if($rs["stok"]>0){
	$sqlk = mysql_query("select * from keranjang where idmember = '$rm[idmember]' and iddevice='$rs[iddevice]'");
	$status=0;
	while($rk = mysql_fetch_array($sqlk)){
	  if($rk["iddevice"]==$rs["iddevice"]){
		$status = 1;
	  }else if($rk["iddevice"]!=$rs["iddevice"]){
	    $status = 0;
	  }
	}
	if($status == 0){
	  $sqlk2 = mysql_query("insert into keranjang (idmember, iddevice) values ('$rm[idmember]', '$rs[iddevice]')");
      if($sqlk2){
        echo "Keranjang anda telah ditambah";
      }else{
        echo "gagal menambah";
      }
    }else{
	  echo "Device $rs[namadevice] sudah ada dalam keranjang, silahkan cari yg lain";
	}
  }else{
	echo "Device Sudah Habis!!!";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=keranjang'>";
}else{
  echo "Anda Harus Login atau Register Terlebih Dahulu";
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=register'>";
}
?>