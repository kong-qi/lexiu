<?php
require("class/connect.php");
include("class/config.php");
include("class/db_sql.php");
include("class/functions.php");
$loginin=getcvar('bakusername');
$rnd=getcvar('bakrnd');
islogin($loginin,$rnd);
$p=$_GET['p'];
$f=$_GET['f'];
$file=$bakzippath."/".$f;
require LoadAdminTemp('eDownZip.php');
?>