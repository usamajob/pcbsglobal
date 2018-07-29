<?php
require_once('conn.php'); 
$stock_al_id = $_GET['stock_al_id'];
$stock_id = $_GET['stock_id'];
$sql = "DELETE FROM stock_allocation WHERE id = ".$stock_al_id;
mysql_query($sql);
header('location:add_stock.php?stkid='.$stock_id);


	?>