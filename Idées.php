<?php 
require_once "Website\all.php";
session_start();
$idees=new website();
$idees->build_idees();
?>