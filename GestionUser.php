<?php 
require_once "Website\admin.php";
session_start();
$gestionusers=new admin();
$gestionusers->build_user();
?>