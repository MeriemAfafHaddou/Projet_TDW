<?php 
require_once "Website\admin.php";
session_start();
if(isset($_SESSION['role'])=='admin'){
$gestionusers=new admin();
$gestionusers->build_user();
}else{
header("Location: Se connecter.php");
}
?>