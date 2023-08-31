<?php
  session_start();
  session_destroy();
  echo "Logging out";
  $sqls = mysql_query("update lastonline set status='off' ,lastoff=NOW() where idmember='$rm[idmember]'");
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=home'>";
?>