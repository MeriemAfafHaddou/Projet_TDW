<?php 
require_once "Website\admin.php";
session_start();
$principale=new admin();
$principale->build_principale();
?>