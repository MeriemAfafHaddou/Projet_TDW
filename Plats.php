<?php 
require_once "Website\all.php";
session_start();
$plats=new website();
$plats->build_plats();
?>