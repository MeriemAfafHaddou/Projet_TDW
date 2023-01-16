<?php 
require_once "Website\all.php";
session_start();
$recette=new website();
$recette->build_recette($id);
?>