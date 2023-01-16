<?php 
require_once "Website\all.php";
session_start();
$healthy=new website();
$healthy->build_healthy();
?>