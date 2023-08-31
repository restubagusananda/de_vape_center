<?php
include "koneksi.php";
$sqlm = mysql_query("select * from member where idmember = '$_GET[idm]'");
$rm=mysql_fetch_array($sqlm);
?>
<fieldset style="width:100%;padding:0px 0px 0px 0px;margin:-20px 0px 0px 0px;">
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <p align="center" style="background-color:#494949;color:#fff;font-family:Hobo Std;font-size:20px;box-shadow:0 0 2px #000;width:99.8%;"><u>Konfirmasi Ulang Data Anda</u></p>
  <input type="hidden" name="idmember" value="<?php echo "$rm[idmember]"; ?>">
  <div align="center" style="margin:10px 120px 10px 120px; box-shadow:0 0 1px #000;padding:1px 5px 1px 5px;">
  <p>Username : <input name="username" id="username" type="text"></p>
  <p>Password : <input name="password" id="password" type="password"></p>
  <p align="center">
    <input name="confirmpass" type="submit" id="update" value="Konfirmasi" style="background-color:#339933;color:#fff;box-shadow:0 0 1px #000;font-size:18px;">
  </p>
  </div>
</form>
<p align="center" style="color:#F00;">
<?php
if(isset($_POST["confirmpass"])){
if($_POST["confirmpass"]){
  if($_POST["username"]=="$rm[username]"&&$_POST["password"]=="$rm[password]"){
	echo "Data Cocok, Silahkan Ubah data anda...";
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=updatedata&idm=$_POST[idmember]'>";
  }else{
	echo "Data Yang anda Input Salah!!!";
  }
}
}
?>
</p>
</fieldset>