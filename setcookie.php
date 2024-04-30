<?php
  if(isset($_GET['c'])) {
    if($_GET['c']=="lederle") {setcookie("cname", "", time(), "/");}
    setcookie("cname", $_GET['c'], time() + (86400 * 3), "/");
  } else {
    setcookie("cname", "", time(), "/");
  }
  header("Location: ../counter");
?>