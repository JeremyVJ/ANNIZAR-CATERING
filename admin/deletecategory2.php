<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

// sending query
mysqli_query($db,"DELETE FROM dishes_category WHERE rs_id = '".$_GET['cat_del']."'");
header("location:packageCat.php");  
?>