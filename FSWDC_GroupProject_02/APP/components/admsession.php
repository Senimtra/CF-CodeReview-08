<?php
// if session is not set this will redirect to login page
if( !isset($_SESSION['adm']) && !isset ($_SESSION[ 'user']) ) {
   header("Location: ../index.php");
   exit;
  }
if (isset($_SESSION["user"])) {
header("Location: ../home.php");}
