<?php 
require_once "Website\admin.php";
session_start();
if(isset($_SESSION['role'])=='admin'){
$gestion=new admin();
$gestion->build_GestionNutrition();
}else{
    header("Location: Se connecter.php");
}
?>