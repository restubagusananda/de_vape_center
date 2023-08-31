<?php
if(!empty($_SESSION["usermbr"]) and !empty($_SESSION["passmbr"])){
?>

	<li><a href="<?php echo "?p=pemesanan"; ?>">Pemesanan</a></li>
    <li><a href="<?php echo "?p=transaksi"; ?>">Transaksi</a></li>
    <li><a href="#">About us</a></li>
  

<?php
}else{
?>
    <li><a href="?p=register">Register</a></li>
    <li><a href="#">About us</a></li>
  

<?php
}
?>