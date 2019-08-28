<?php
session_start();

 $link = mysqli_connect("localhost", "root", "", "cookingCo");

 if (mysqli_connect_errno()) {
	  echo "database error";
	  exit();
 }
?>