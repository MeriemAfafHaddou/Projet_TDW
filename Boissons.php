<?php 
require_once "Website\all.php";
session_start();
$boissons=new website();
$boissons->build_boissons();
?>