<?php
require "../config/functions.php";

if (isset($_SESSION['auth'])) {
  logoutSession();
  redirect("../login.php", "Logged out successfully");
} 

?>