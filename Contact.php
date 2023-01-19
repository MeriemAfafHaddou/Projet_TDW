<?php 
require_once "Website\all.php";
session_start();
$contact=new Website();
$contact->build_contact();
?>