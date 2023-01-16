<?php 
require_once "Website\all.php";
session_start();
$login=new website();
$login->build_login();
?>