<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>De_Vape_Center</title>
</head>
<body>
<div class="container0">
  <div class="container1">
    <div class="grid" style="padding:0;">
	  <div class="dh6">
		  <?php
		  if(!empty($_SESSION["usermbr"]) and !empty($_SESSION["passmbr"])){
		  ?>
		  <div align="center" class="grid" style="margin-top:-10px;color:#FFFFFF;margin-bottom:-20px;padding-top:5px;">
		    <a href="<?php echo "?p=home"; ?>">
		    <div class="dh2"><p id="sun">Home</p></div>
			</a>
			<a href="<?php echo "?p=pemesanan"; ?>">
		    <div class="dh2"><p id="sun">Pemesanan</p></div>
			</a>
			<a href="<?php echo "?p=transaksi"; ?>">
		    <div class="dh2"><p id="sun">Transaksi</p></div>
			</a>
			<a href="<?php echo "?p=aboutus"; ?>">
			<div class="dh2"><p id="sun">About Us</p></div>
			</a>
		  </div>
		  
		  <?php
		  }else{
		  ?>
		  <div align="center" class="grid" style="margin-top:-10px;color:#FFFFFF;margin-bottom:-20px;padding-top:5px;">
		    <a href="<?php echo "?p=home"; ?>">
		    <div class="dh2"><p id="sun">Home</p></div>
			</a>
			<a href="<?php echo "?p=register"; ?>">
		    <div class="dh2"><p id="sun">Register</p></div>
			</a>
			<a href="<?php echo "?p=aboutus"; ?>">
		    <div class="dh2"><p id="sun">About Us</p></div>
			</a>
		  </div>
		  <?php
		  }
		  ?>
	  </div>
	  <div class="dh6" align="right">
  <?php
  if(!empty($_SESSION["usermbr"]) and !empty($_SESSION["passmbr"])){
	include "koneksi.php";
    $sqlm = mysql_query("select * from member where username='$_SESSION[usermbr]'");
    $rm = mysql_fetch_array($sqlm);
  ?>
  <div class="dh10" id="menulogout">
  <p>Selamat Datang <?php echo "<b>$rm[nama]</b>"; ?></p>
  </div>
  <div class="dh2">
  <form name="formlogout" method="post" action="" enctype="multipart/form-data">
	<input name="logout" type="submit" id="logout0" value="Logout">
  </form>
  <?php
  if(isset($_POST["logout"])){
    if($_POST["logout"]){
      echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=logout'>";
    }
  }
  ?>
  </div>
  <?php
  }else{
  ?>
  <form name="formlogin" method="post" action="" enctype="multipart/form-data">
    <div class="dh10" style="color:#FFFFFF">
      <p style="margin-top:5px">Username
        <input name="username" type="text" id="username">
	  </p>
	  <p style="margin-bottom:5px">Password
        <input name="password" type="password" id="password">
	  </p>
    </div>
    <div class="dh2">
      <input name="login" type="submit" id="login0" value="Login">
    </div>
  </form>
  <?php
  if(isset($_POST["login"])){
      if($_POST["login"]){
    	if($_POST["username"]!=null&&$_POST["password"]!=null){
    	  //echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=login'>";
    	  include "koneksi.php";
          $sqlm = mysql_query("select * from member where username='$_POST[username]' and password ='$_POST[password]'");
    	  $rm = mysql_fetch_array($sqlm);
    	  $row = mysql_num_rows($sqlm);
    	  if($row > 0){
    	    $sqlon = mysql_query("update lastonline set laston = NOW(), status='on' where idmember = $rm[idmember]");
    	    session_start();
    	    $_SESSION["usermbr"]=$rm["username"];
    	    $_SESSION["passmbr"]=$rm["password"];
    	    echo "Login Berhasil";
    	  }else{
    	    echo "Login Gagal $_POST[username]";
    	  }
    	  echo "<META HTTP-EQUIV='Refresh' Content='2; URL=?p=home'>";
    	}else{
    	  echo "Form login belum diisi!!!";
    	  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=home'>";
        }
      }
    }
  }
  ?>
      </div>
	</div>
  </div>
  <div class="container2">
  <a href="<?php echo"?p=home";?>">
    <img src="images/dvp.jpeg" width="130px">
  </a>
  </div>
  <div class="container3">
    <div class="grid" style="padding:0;margin:0;">
	  <div class="dh2" style="margin-left:0;">
		<a href="<?php echo "?p=merks"; ?>" style="text-decoration:none;">
		  <p id="aditmenu">Device</p>
		</a>
		<a href="<?php echo "?p=discount"; ?>" style="text-decoration:none;">
		  <p id="aditmenu">Discount</p>
		</a>
		<a href="<?php echo "?p=keranjang"; ?>" style="text-decoration:none;">
		  <p id="aditmenu">Keranjang</p>
		</a>
		<a href="<?php echo "?p=mydata&idm=$rm[idmember]"; ?>" style="text-decoration:none;">
		  <p id="aditmenu">My Account</p>
		</a>
	  </div>
	  <div class="dh8">
	    <div class="grid" style="padding-top:0;margin-top:0;box-shadow:0 0 1px #000000;">
		  <?php
		if(isset($_GET["p"])){
		if($_GET["p"] == "merks"){
		  include "merks.php";
		}else if($_GET["p"] == "pilihdevice"){
		  include "pilihdevice.php";
		}else if($_GET["p"] == "device"){
		  include "device.php";
		}else if($_GET["p"] == "register"){
		  include "register.php";
		}else if($_GET["p"] == "login"){
		  include "login.php";
		}else if($_GET["p"] == "logout"){
		  include "logout.php";
		}else if($_GET["p"] == "keranjang"){
		  include "keranjang.php";
		}else if($_GET["p"] == "keranjangadd"){
		  include "keranjangadd.php";
		}else if($_GET["p"] == "keranjangdel"){
		  include "keranjangdel.php";
		}else if($_GET["p"] == "register"){
		  include "register.php";
		}else if($_GET["p"] == "pemesanan"){
		  include "pemesanan.php";
		}else if($_GET["p"] == "pemesananadd"){
		  include "pemesananadd.php";
		}else if($_GET["p"] == "transaksi"){
		  include "transaksi.php";
		}else if($_GET["p"] == "transaksiadd"){
		  include "transaksiadd.php";
		}else if($_GET["p"] == "transaksicod"){
		  include "transaksicod.php";
		}else if($_GET["p"] == "transaksicard"){
		  include "transaksicard.php";
		}else if($_GET["p"] == "discount"){
		  include "discount.php";
		}else if($_GET["p"] == "updatedata"){
		  include "updatedata.php";
		}else if($_GET["p"] == "mydata"){
		  include "mydata.php";
		}else if($_GET["p"] == "confirmupdate"){
		  include "confirmupdate.php";
		}else if($_GET["p"] == "aboutus"){
		  include "aboutus.php";
		}else{
		  include "home.php";
		}
		}else{
		  include "home.php";
		}
		?>
		</div>
	  </div>
	  <div class="dh2">
	  <div class="kanan-bar">
	    <div class="bar" style="font-size:14px;">
	      <div class="judul-bar">Pembayaran</div>
		  <img src="logobank/mandiri.jpg" style="width:130px"></br>
		  <span>Rek : 888888888</br></span>
		  <span>A/N: De_Vape_Center</br></span>
	    </div>
		<div class="bar" style="font-size:14px;">
		  <img src="logobank/bri.jpg" style="width:100px;"></br>
		  <span>Rek : 8888888888</br></span>
		  <span>A/N: De_Vape_Center</br></span>
	    </div>
		<div class="bar" style="font-size:14px;">
		  <img src="logobank/nagari.jpg" style="width:130px;"></br>
		  <span>Rek : 8888888888</br></span>
		  <span>A/N: De_Vape_Center</br></span>
	    </div>
		</p>
		
		  <?php
		  include "koneksi.php";
		  $sqlpr = mysql_query("select * from promo where jenispromo='promovp'");
		  $rpr = mysql_fetch_array($sqlpr);
		  $row = mysql_num_rows($sqlpr);
		  if($row<1){
			echo "";
		  }else{
			$sqls = mysql_query("select * from device where iddevice='$rpr[iddevice]'");
		    $rs=mysql_fetch_array($sqls);
		    echo "
		<a href='?p=device&idd=$rpr[iddevice]' style='text-decoration:none'>
		<div class='bar'>
	      <div class='judul-bar'>Promotion</div>
		  <img src='cpanel/device/$rs[foto]' style='width:130px;'></br>
		  <span>$rpr[judulpromo]</br></span>
		  <span>$rs[namadevice]</br></span>
	    </div>
		</a>
		";
		  }
		?>
		</p>
	  </div>
	</div>
	</div>
  </div>
  <div class="container5">
    <div class="grid">
      <?php include "footer.php"; ?>
    </div>
  </div>
</div>
</body>
</html>
