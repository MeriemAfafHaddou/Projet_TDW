<?php 
require_once "Website\all.php";
session_start();
$id=$_GET['id'];
$profile=new Website();
$profile->build_profile($id);
?>