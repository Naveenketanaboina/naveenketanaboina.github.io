<?php 
    session_start();
    include("inc/db_connect.php");
    include("inc/head_element.php");
?>
<title>Cart</title>
<link rel="stylesheet" href="style/css.css">
<?php include("inc/header.php"); ?>

<div class="container" id="view_cart">	
	<div class="text-left">					
		<div class="col-md-8" id="cart-container">
			<h3>My Cart (<span id="cart-items-count"><?PHP if(isset($_SESSION["products"])){echo count($_SESSION["products"]); } ?></span>)</h3>			
			<?php		
			if(isset($_SESSION["products"]) && count($_SESSION["products"])>0) { 
			?>
				<table class="table" id="shopping-cart-results">
				<thead>
				<tr>
				<th>Product</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Subtotal</th>
				<th>&nbsp;</th>
				</tr>
				</thead>
				<tbody>
			<?php
				$cart_box = '<ul class="cart-products-loaded">';
				$total = 0;
				foreach($_SESSION["products"] as $product){					
					$product_name = $product["product_name"]; 
					$product_price = $product["product_price"];
					$product_image = $product["product_image"];
					$product_qty = $product["product_qty"];
					$subtotal = ($product_price * $product_qty);
					$total = ($total + $subtotal);
				?>
				<tr>
				<td><?php echo $product_name; echo "&mdash;"; ?></td>
				<td><?php echo $product_price; ?></td>
				<td><input type="number" data-code="<?php echo $product_image; ?>" class="form-control text-center quantity" value="<?php echo $product_qty; ?>"></td>
				<td class="text-center"><i class="fa fa-inr" aria-hidden="true"></i> <?php  echo ($product_price * $product_qty); ?></td>
				<td>				
				<a href="#" class="px-1 py-0 btn btn-danger remove-item" data-code="<?php echo $product_image; ?>"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
				</td>
				</tr>
			 <?php } ?>
			<tfoot>
			<br>
			<br>
			<tr>
			<td><a href="main.php" class="btn btn-primary"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a></td>
			<td colspan="2"></td>
			<?php 
			if(isset($total)) {
			?>	
			<td class="text-center cart-products-total text-nowrap"><strong>Total <i class="fa fa-inr" aria-hidden="true"></i> <?php echo sprintf("%01.2f",$total); ?></strong></td>
			<td><a href="checkout.php" class="btn btn-success btn-block"> Checkout <i class="glyphicon glyphicon-menu-right"></i></a></td>
			<?php } ?>
			</tr>
			</tfoot>			
			<?php		
			} else {
				echo "Your Cart is empty";
			?>
			<tfoot>
			<br>
			<br>
			<tr>
			<td><a href="main.php" class="btn btn-primary"><i class="glyphicon glyphicon-menu-left"></i>Shop Now</a></td>
			<td colspan="2"></td>
			</tr>
			</tfoot>
			<?php } ?>				
			</tbody>
			</table>			
		</div>			
	</div>
</div>
<?php include('inc/footer.php');?>




