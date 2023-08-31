<?php
//post

//include
if($_GET["p"] == "merks"){
  include "merks.php";
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
}else{
  include "home.php";
}

?>