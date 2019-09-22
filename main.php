<?php 
    session_start();
    include("inc/db_connect.php");
    include("inc/head_element.php");
?>
<title>Way2Gift</title>
<link rel="stylesheet" href="style/css.css">
<?php include("inc/header.php"); ?>



<nav class="navbar navbar-expand-lg d-xl-flex d-none py-3 " style="background-color: rgb(129, 123, 216)">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a href="#Anniversary" class="flex-grow-1 font-weight-bold text-white">
            <span class="nav-hover">Anniversary Gifts</span>
        </a>
        <a href="#Birthday" class="flex-grow-1 font-weight-bold text-white">
            <span class="nav-hover">Birthday Gifts</span>
        </a>
        <a href="#Mother" class="flex-grow-1 font-weight-bold text-white">
            <span class="nav-hover">Gifts for Mother</span>
        </a>
        <a href="#Father" class="flex-grow-1 font-weight-bold text-white">
            <span class="nav-hover">Gifts for Father</span>
        </a>
        <a href="#Husband" class="flex-grow-1 font-weight-bold text-white">
            <span class="nav-hover">Gifts for Husband</span>
        </a>
        <a href="#Wife" class="flex-grow-1 font-weight-bold text-white">
            <span class="nav-hover">Gifts for Wife</span>
        </a>
        <a href="#Friend" class="flex-grow-1 font-weight-bold text-white">
            <span class="nav-hover">Gifts for Friend</span>
        </a>
        <a href="#Brother" class="flex-grow-1 font-weight-bold text-white">
            <span class="nav-hover">Gifts for Brother</span>
        </a>
        <a href="#Sister" class="flex-grow-1 font-weight-bold text-white">
            <span class="nav-hover">Gifts for Sister</span>
        </a>
        <a href="#Best_Selling" class="flex-grow-1 font-weight-bold text-white">
            <span class="nav-hover">Best Selling</span>
        </a>
    </div>
</nav>
<main>
    

    
        

    <div class="products-container text-center position-relative">
        <?php
                $sql_query = "SELECT product_name, product_image, product_price FROM products";	
                $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
                while( $row = mysqli_fetch_assoc($resultset) ) {
            ?>
        <div class="d-inline-block border m-3 box-shadow" style="border-radius: 10px;">
            <form action="product.php" method="GET"  style="cursor: pointer">
                <button class="bg-white border-0 outline-none p-1" type="submit" style="border-radius: 10px;" name="Submit">
                    <div>
                        <img class="img-fluid w-100" name="product_image" src="Images/<?php echo $row["product_image"]; ?>.jpg">
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