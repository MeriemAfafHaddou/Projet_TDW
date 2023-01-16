<?php 
require_once "Website\all.php";
session_start();
$accueil=new website();
$accueil->build_accueil();
?>