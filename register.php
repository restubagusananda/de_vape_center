<form name="form1" method="post" action="" enctype="multipart/form-data">
  <div class="jisi"><p><big>Register your Account</big></p></div>
  <p style="margin-left:20px;">Nama Lengkap : 
    <input name="nama" type="text" id="inputregis">
  </p>
  <p style="margin-left:20px;">Username : 
    <input name="username" type="text" id="inputregis">
  </p>
  <p style="margin-left:20px;">Password : 
    <input name="password" type="password" id="inputregis">
  </p>
  <p style="margin-left:20px;">Confirm Password : 
    <input name="cpassword" type="password" id="inputregis">
  </p>
  <p style="margin-left:20px;">Tempat / Tanggal Lahir : </br>
  
    <input name="tmplahir" type="text" id="inputregisdate">
    /
    <select name="tgl" id="inputregisdate">
	<?php
	for($i=1; $i<=31; $i++){
	  echo "<option value='$i'>$i</option>";
	}
	?>
    </select>
    <select name="bln" id="inputregisdate">
	<?php
	for($j=1; $j<=12; $j++){
	  echo "<option value='$j'>$j</option>";
	}
	?>
    </select>
    <input name="thn" type="text" id="inputregisdate">
  </p>
  <p style="margin-left:20px;">Jenis Kelamin : 
    <input name="jk" type="radio" value="L">
    Pria
    <input name="jk" type="radio" value="P">
    Wanita
  </p>
  <p style="margin-left:20px;">Alamat : 
    <textarea name="alamat" id="alamat"></textarea>
  </p>
  <p style="margin-left:20px;">No. Handphone : 
    <input name="nohp" type="text" id="inputregis">
  </p>
  <p style="margin-left:20px;">Email : 
    <input name="email" type="text" id="inputregis">
  </p>
  <p style="margin-left:20px;">
    <input name="register" type="submit" id="btnregis" value="Daftarkan Akun">
  </p>
</form>

<?php
if(isset($_POST["register"])){
if($_POST["register"]){
  include "koneksi.php";
  if($_POST["username"]==null||$_POST["password"]==null||$_POST["nama"]==null){
	echo "<b>Data Username Password dan Nama Harus diisi!!!</b>";
  }else{
	if($password!=$cpassword){
      echo "<b>Password Tidak Cocok!!!</b>";
    }else{
      $sqlm = mysql_query("select * from member where username = '$_POST[username]'");
	  $rm = mysql_fetch_array($sqlm);
      if($_POST["username"]==$rm[username]){
        echo "<b>Username Telah digunakan, Gunakan Username Lain!!!</b>";
      }else{
		$sqlm = mysql_query("insert into member (nama, username, password, tmplahir, tgllahir, jk, alamat, nohp, email, tgldaftar) values 
		('$_POST[nama]', '$_POST[username]', '$_POST[password]', '$_POST[tmplahir]', '$_POST[thn]-$_POST[bln]-$_POST[tgl]', '$_POST[jk]', '$_POST[alamat]', '$_POST[nohp]', '$_POST[email]', NOW())");
		if($sqlm){
		  echo "Pendaftaran Berhasil";
		  $sqlm = mysql_query("select * from member where username = '$_POST[username]'");
		  $rm = mysql_fetch_array($sqlm);
		  $row = mysql_num_rows($sqlm);
		  if($row > 0){
			$sqlon = mysql_query("insert into lastonline (idmember, laston, status) values ('$rm[idmember]', NOW(), 'on')");
			session_start();
			$_SESSION["usermbr"]=$rm["username"];
			$_SESSION["passmbr"]=$rm["password"];
			echo "</br><p>Selamat Datang $rm[nama]</p>";
			echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=home'>";
		  }
		}else{
		  echo "Pendaftaran Gagal";
		}
		//echo "<META HTTP-EQUIV='Refresh' Content='2; URL=?p=mhs'>";
      }
    }
  }
}
  
  
  /*
  
  */
}
?> 