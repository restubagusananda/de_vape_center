<?php
if(!empty($_SESSION["usermbr"]) and !empty($_SESSION["passmbr"])){
include "koneksi.php";
$sqlm = mysql_query("select * from member where idmember = '$_GET[idm]'");
$rm=mysql_fetch_array($sqlm);
$jk;
if($rm["jk"]=="L"){
  $jk="Laki-Laki";
}else{
  $jk="Perempuan";
}
?>
<fieldset style="width:100%;padding:0px 0px 0px 0px;margin:-20px 0px 0px 0px;">
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <p align="center" style="background-color:#8b0000;color:#fff;font-family:Hobo Std;font-size:20px;box-shadow:0 0 2px #000;width:99.8%;"><u>MY DATA</u></p>
  <input type="hidden" name="idmember" value="<?php echo "$rm[idmember]"; ?>">
  <div style="margin:10px 120px 10px 120px; box-shadow:0 0 1px #000;padding:1px 5px 1px 5px;">
  <p>Username : <input name="username" type="text" value="<?php echo "$rm[username]"; ?>" disabled></p>
  <p>Password : <input name="password" type="password" value="<?php echo "$rm[password]"; ?>" disabled></p>
  <p>Nama : <?php echo "$rm[nama]"; ?></p>
  <p>Email : <?php echo "$rm[email]"; ?></p>
  <p>Nohp : <?php echo "$rm[nohp]"; ?></p>
  <p>TTL : <?php echo "$rm[tmplahir] / $rm[tgllahir] "; ?></p>
  <p>Jenis Kelamin : <?php echo "$jk"; ?></p>
  <p>Provinsi : <?php echo "$rm[prov]"; ?></p>
  <p>Kota : <?php echo "$rm[kota]"; ?></p>
  <p>Kecamatan : <?php echo "$rm[kcmt]"; ?></p>
  <p>Kode Pos : <?php echo "$rm[kdpos]"; ?></p>
  <p align="center">
    <input name="update" type="submit" id="update" value="UPDATE DATA SAYA" style="background-color:#228b22;color:#fff;box-shadow:0 0 1px #000;font-size:18px;">
  </p>
  </div>
</form>
<p align="center" style="color:#F00;">
<?php
if(isset($_POST["update"])){
if($_POST["update"]){
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=confirmupdate&idm=$_POST[idmember]'>";
}
}
?>

<?php
}else{
  echo "Anda Harus Login atau Register Terlebih Dahulu";
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=register'>";
}
?>
</p>
</fieldset>