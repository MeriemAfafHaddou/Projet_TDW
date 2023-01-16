<?php 
require_once "Website\all.php";
session_start();
$entrees=new website();
$entrees->build_entrees();
?>