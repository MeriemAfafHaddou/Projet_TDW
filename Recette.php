<?php 
require_once "Website\all.php";
session_start();
$id=$_GET['id'];
$recette=new website();
$recette->build_recette($id);
?>