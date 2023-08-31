<?php
if(!empty($_SESSION["usermbr"]) and !empty($_SESSION["passmbr"])){
?>

<?php
include "koneksi.php";
$sqlm = mysql_query("select * from member where idmember = '$_GET[idm]'");
$rm=mysql_fetch_array($sqlm);
$d = substr($rm["tgllahir"],8,2);
$m = substr($rm["tgllahir"],5,2);
$y = substr($rm["tgllahir"],0,4);
?>
<fieldset style="width:100%;padding:0px 0px 0px 0px;margin:-20px 0px 0px 0px;">
<form name="form2" method="post" action="" enctype="multipart/form-data">
  <p align="center" style="background-color:#494949;color:#fff;font-family:Hobo Std;font-size:20px;box-shadow:0 0 2px #000;width:99.8%;"><u>MY DATA</u></p>
  <input type="hidden" name="idmember" value="<?php echo "$rm[idmember]"; ?>">
  <p>Username</br>
    <input name="username" type="text" style="width:97.2%;" value="<?php echo "$rm[username]" ?>" disabled>
  </p>
  <p>Password Baru (Abaikan Jika anda tidak ingin mengubah Password anda)</br> 
    <input name="password" type="password" style="width:97.2%;" value="<?php echo "$rm[password]" ?>">
  </p>
  <p>Konfirmasi Password (Abaikan Jika anda tidak ingin mengubah Password anda)</br>
    <input name="password2" type="password" style="width:97.2%;" value="<?php echo "$rm[password]" ?>">
  </p>
  <p>Nama</br>
    <input name="nama" type="text" style="width:97.2%;" value="<?php echo "$rm[nama]" ?>">
  </p>
  <p>Email</br>
    <input name="email" type="text" style="width:97.2%;" value="<?php echo "$rm[email]" ?>">
  </p>
  <p>Nohp</br>
    <input name="nohp" type="text" style="width:97.2%;" value="<?php echo "$rm[nohp]" ?>">
  </p>
  <p>TEMPAT / TGL LAHIR 
    <input name="tmplahir" type="text" id="tmplahir" value="<?php echo "$rm[tmplahir]"; ?>">
    / 
    <select name="tgl" id="tgl">
	<?php
	for($i=1; $i<=31; $i++){
	  if($d == $i){ $sel = " selected"; }
	  else{ $sel = ""; }
	  echo "<option value='$i' $sel>$i</option>";
	}
	?>
    </select>
    <select name="bln" id="bln">
	<?php
	for($j=1; $j<=12; $j++){
	  if($m == $j){ $sel = " selected"; }
	  else{ $sel = ""; }
	  echo "<option value='$j' $sel>$j</option>";
	}
	?>
    </select>
    <input name="thn" type="text" id="thn" value="<?php echo "$y"; ?>">
  </p>
  <?php
  if($rm["jk"] == "L"){
  	$l = " checked";   $p = "";
  }else if($rm["jk"] == "P"){
  	$l = "";   $p = " checked";
  }else{
  	$l = "";   $p = "";
  }
  ?>
  <p>JENIS KELAMIN 
    <input name="jk" type="radio" value="L" <?php echo "$l"; ?> >
    Laki-Laki
    <input name="jk" type="radio" value="P" <?php echo "$p"; ?> >
    Perempuan
  </p>
  <p>Provinsi</br>
    <input name="prov" type="text" style="width:97.2%;" value="<?php echo "$rm[prov]" ?>">
  </p>
  <p>Kota</br>
    <input name="kota" type="text" style="width:97.2%;" value="<?php echo "$rm[kota]" ?>">
  </p>
  <p>Kecamatan</br>
    <input name="kcmt" type="text" style="width:97.2%;" value="<?php echo "$rm[kcmt]" ?>">
  </p>
  <p>Alamat</br>
    <textarea name="alamat"><?php echo "$rm[alamat]" ?></textarea>
  </p>
  <p>Kode Pos</br>
    <input name="kdpos" type="text" style="width:97.2%;" value="<?php echo "$rm[kdpos]" ?>">
  </p>
  <p>
    <input name="updatenow" type="submit" id="update" value="UPDATE DATA SAYA">
</p>
</form>
<p align="center" style="color:#F00;">
<?php
if(isset($_POST["updatenow"])){
if($_POST["updatenow"]){
  if($_POST["password"]!=null&&$_POST["nama"]!=null){
	if($_POST["password"]==$_POST["password2"]){
	  $sqlm = mysql_query("update member set password='$_POST[password]', nama='$_POST[nama]', email='$_POST[email]', nohp='$_POST[nohp]', tmplahir='$_POST[tmplahir]', tgllahir='$_POST[thn]-$_POST[bln]-$_POST[tgl]', jk='$_POST[jk]', prov='$_POST[prov]', kota='$_POST[kota]', kcmt='$_POST[kcmt]', alamat='$_POST[alamat]', kdpos='$_POST[kdpos]' where idmember='$_POST[idmember]'");
	  if($sqlm){
		echo "Data Berhasil Diupdate";
		echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=mydata&idm=$rm[idmember]'>";
	  }else{
		echo "Gagal update data!!!";
		echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=mydata&idm=$rm[idmember]'>";
	  }
	}else{
	  echo "Password tidak Cocok!!!";
	}
  }else{
	echo "Data Tidak Lengkap!!!";
  }
}
}
?>

<?php
}else{
  echo "Anda Harus Login atau Register Terlebih Dahulu";
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=register'>";
}
?>