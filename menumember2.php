<?php
if(!empty($_SESSION["usermbr"]) and !empty($_SESSION["passmbr"])){
	include "koneksi.php";
  $sqlm = mysql_query("select * from member where username='$_SESSION[usermbr]'");
  $rm = mysql_fetch_array($sqlm);
?>
	<div class="dh7" align="right">
	<div id="menulogout">
	<p>
	<?php
	echo "Selamat Datang, <b>$rm[nama]</b>";
	?>
	</p>
	</div>
	</div>
	<div class="dh1" align="right">
	  <input name="logout" type="submit" id="logout0" value="Logout">
	</div>
	<?php
    if($_POST["logout"]){
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=logout'>";
	}	
?>
<?php
  
}else{
?>
    <div class="dh7" align="right">
	  <div id="menulogin">
	    <p>Username
          <input name="username" type="text" id="username">
		</p>
		<p>Password
          <input name="password" type="password" id="password">
		</p>
	  </div>

    </div>
	<div class="dh1" align="right">
	  <input name="login" type="submit" id="login0" value="Login">
	</div>
<?php
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
?>