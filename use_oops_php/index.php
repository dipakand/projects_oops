<?php
error_reporting(0);
session_start();
ob_start();
include("../include/db.php");

$db = new DB;
$cond = 'reg_id = 6' ;

// table, fields, condition, order, limit
$allusers = $db->select('tbl_reg','','','','');

//$fiesd = $db->get_table_fields('tbl_reg');
print_r($allusers);
?>