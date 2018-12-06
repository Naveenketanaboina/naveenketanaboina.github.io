<?php 
    session_start();
    include("inc/db_connect.php");
    include("inc/head_element.php");
?>
<title>Way2Gift</title>
<link rel="stylesheet" href="style/css.css">
<?php include("inc/header.php"); 
include("inc/carousel.php"); ?>

<main>
    <div class="products-container text-center position-relative">
        <?php
            $sql_query = "SELECT product_name, product_image, product_price FROM products LIMIT 40";	
            $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
            while( $row = mysqli_fetch_assoc($resultset) ) {
        ?>
        <div class="d-inline-block border m-3 box-shadow" style="border-radius: 10px;">
            <form action="product.php" method="GET"  style="cursor: pointer">
                <button class="bg-white border-0 outline-none p-1" type="submit" style="border-radius: 10px;" name="Submit">
                    <div>
                        <img class="img-fluid" name="product_image" width="400px" src="Images/<?php echo $row["product_image"]; ?>.jpg">
                    </div>
                    <div class="bg-light">
                        <h4 name="product_name">
                            <?php echo $row["product_name"]; ?>
                        </h4>
                        <h5 name="product_price" class="text-danger">
                            Price:
                            <i class="fas fa-rupee-sign"></i>
                            <?php echo $row["product_price"]; ?>
                        </h5>
                    </div>
                    <input name="product_image" id="<?php echo $row["product_image"]; ?>" type="hidden" value="<?php echo $row["product_image"]; ?>">
                </button>
            </form>
            <form class="product-form">
                <div class="product_box d-block text-center my-2">
                    <div class="d-inline-block">
                        Quantity :
                        <select name="product_qty">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <input name="product_image" id="<?php echo $row["product_image"]; ?>" type="hidden" value="<?php echo $row["product_image"]; ?>">
                    <button type="submit" name="Add" id="product_id"  class="btn btn-outline-primary m-2">Add to Cart</button>
                </div>
            </form>
            </div>
            <?php } ?>
   
        </div>

</main>
<?php include('inc/footer.php');?>