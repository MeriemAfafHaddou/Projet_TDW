<?php 
require_once "Website\all.php";
session_start();
$news=new website();
$news->build_news();
?>