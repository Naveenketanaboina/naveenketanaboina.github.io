<?php 
session_start();
include_once("inc/db_connect.php");
setlocale(LC_MONETARY,"en_US");
# add products in cart 
if(isset($_POST["product_image"])) {
	foreach($_POST as $key => $value){
		$product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
	}	
	$statement = $conn->prepare("SELECT product_name, product_price FROM products WHERE product_image=? LIMIT 1");
	$statement->bind_param('s', $product['product_image']);
	$statement->execute();
	$statement->bind_result($product_name, $product_price);
	while($statement->fetch()){ 
		$product["product_name"] = $product_name;
		$product["product_price"] = $product_price;		
		
		if(isset($_SESSION["products"])){ 
			if(isset($_SESSION["products"][$product['product_image']])) {				
				$_SESSION["products"][$product['product_image']]["product_qty"] = $_SESSION["products"][$product['product_image']]["product_qty"] + $_POST["product_qty"];				
			} else {
				$_SESSION["products"][$product['product_image']] = $product;
			}			
		} else {
			$_SESSION["products"][$product['product_image']] = $product;
		}	
	}	
 	$total_product = count($_SESSION["products"]);
	die(json_encode(array('products'=>$total_product)));
}
# Remove products from cart
if(isset($_GET["remove_id"]) && isset($_SESSION["products"])) {
	$product_image  = filter_var($_GET["remove_id"], FILTER_SANITIZE_STRING);
	if(isset($_SESSION["products"][$product_image]))	{
		unset($_SESSION["products"][$product_image]);
	}	
 	$total_product = count($_SESSION["products"]);
	die(json_encode(array('products'=>$total_product)));
}
# Update cart product quantity
if(isset($_GET["update_quantity"]) && isset($_SESSION["products"])) {	
	if(isset($_GET["quantity"]) && $_GET["quantity"]>0) {		
		$_SESSION["products"][$_GET["update_quantity"]]["product_qty"] = $_GET["quantity"];	
	}
	$total_product = count($_SESSION["products"]);
	die(json_encode(array('products'=>$total_product)));
}	
