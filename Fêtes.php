<?php 
require_once "Website\all.php";
session_start();
$fetes=new website();
$fetes->build_fetes();
?>