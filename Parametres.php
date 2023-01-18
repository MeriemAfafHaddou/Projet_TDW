<?php 
require_once "Website\admin.php";
session_start();
if(isset($_SESSION['role'])=='admin'){
$parameres=new admin();
$parameres->build_parametres();
}else{
    header("Location: Se connecter.php");
}
?>