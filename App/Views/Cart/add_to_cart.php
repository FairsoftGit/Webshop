<?php
/**
 * Created by PhpStorm.
 * User: SightVision
 * Date: 12-6-2018
 * Time: 11:23
 */
if(isset($_POST['productName'])){
	print $_POST['productName'];
} else {
	print 'Helaas';
}


$productId = $_POST['productId'];
$productName = $_POST['productName'];
$salesPrice = $_POST['salesPrice'];
$amount = $_POST['amount'];
?>

