<?php 
require_once "Website\admin.php";
session_start();
if(isset($_SESSION['role'])=='admin'){
$principale=new admin();
$principale->build_principale();
}else{
    header("Location: Se connecter.php");
}
?>