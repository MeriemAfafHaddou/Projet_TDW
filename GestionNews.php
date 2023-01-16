<?php 
require_once "Website\admin.php";
session_start();
if(isset($_SESSION['role'])=='admin'){
    $gestionnews=new admin();
    $gestionnews->build_GestionNews();
}else{
    header("Location: Se connecter.php");
}
?>