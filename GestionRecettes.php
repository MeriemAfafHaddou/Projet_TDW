<?php 
require_once "Website\admin.php";
session_start();
if(isset($_SESSION['role'])=='admin'){
$gestion=new admin();
$gestion->build_GestionRecettes();
}else{
    header("Location: Se connecter.php");
}
?>