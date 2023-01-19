<?php 
require_once "Website\all.php";
session_start();
$id=$_GET['id'];
$fav=new Website();
$fav->build_fav($id);
?>