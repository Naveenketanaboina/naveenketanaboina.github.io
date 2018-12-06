<?php 
    session_start();
    include("inc/db_connect.php");
    include("inc/head_element.php");
?>
<title>Product</title>
<link rel="stylesheet" href="style/css.css">
<link rel="stylesheet" href="style/product_page.css">
<?php include("inc/header.php"); ?>

<?php

if(isset($_GET['Submit']))
{
    $unique = $_GET['product_image'];
    $unique_lower = strtolower($unique);
    $unique_nospace = str_replace(" ", "", $unique_lower);
    $query = "SELECT * FROM products WHERE product_image = '$unique_nospace'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 py-3">
                    <div class="show w-100 index" href="Images/<?php echo $row['product_image'];?>.jpg" id="product_image_zoom">
                        <img src="Images/<?php echo $row['product_image'];?>.jpg" name="image" id="product_image" alt="" class="img-fluid img-thumbnail">
                    </div>
                    <div class="small-img">
                        <div class="small-container">
                            <div id="small-img-roll">
                                <img src="Images/<?php echo $row['product_image'];?>.jpg" class="show-small-img" alt="">
                                <img src="Images/<?php echo $row['product_image'];?>.jpg" class="show-small-img" alt="">
                                <img src="Images/<?php echo $row['product_image'];?>.jpg" class="show-small-img" alt="">
                                <img src="Images/<?php echo $row['product_image'];?>.jpg" class="show-small-img" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="py-3 text-danger font-weight-bold lead pl-2">RS. <?php echo $row['product_price'];?></div>
                    <form class="product-form">
                        <input type="hidden" name="product_qty" value="1">
                        <input name="product_image" id="product_image_hidden" type="hidden" value="<?php echo $row['product_image'];?>">
                        <button class="btn btn-danger btn-block"  type="submit" name="Add" name="AddToCart">Add To Cart</button>
                        <button class="btn btn-primary btn-block my-2" type="button">Buy</button>
                    </form>
            </div>
            <div class="col-8 py-3">
                <div class="h-50">
                    <h2><div id="product_name" name="name"><?php echo $row['product_name'];?></div><hr class=""></h2>
                    <div class="py-3 text-danger font-weight-bold lead" name="cost">RS. <?php echo $row['product_price'];?></div>
                    <div id="product_description" name="description"><?php echo $row['product_description'];?></div>
                </div>
                <hr>
                <div>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim at quae, non repellendus corporis deleniti itaque libero adipisci consequatur unde sit blanditiis necessitatibus minima pariatur eaque omnis? Id molestiae labore expedita sapiente ipsam dignissimos voluptatum, recusandae quo quis, repellat provident aut reiciendis maxime excepturi laudantium repudiandae quaerat quod delectus tenetur aliquid omnis animi! Ipsam quidem eaque vel saepe voluptate incidunt labore beatae, ut, porro obcaecati soluta. Adipisci earum suscipit id a aut? Et provident vel est suscipit numquam nulla minus quo assumenda id error cumque molestiae, laborum animi dolor, excepturi earum. Aspernatur cumque sit, commodi quos corrupti sequi nemo hic.</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT"
        crossorigin="anonymous"></script>
    <script src="script/zoom-image.js"></script>
    <script src="script/main.js"></script>

    <div class="products-container text-center ">
        <?php
            $product_image = $unique;
            $sql_query = "SELECT * FROM products WHERE product_image LIKE '%$product_image%'";
            if(!$sql_query && mysqli_num_rows($sql_query) < 1){
                $sql_query = "SELECT * FROM products WHERE product_image LIKE '$product_image%'";
                if(!$sql_query && mysqli_num_rows($sql_query) < 1){
                    $sql_query = "SELECT * FROM products WHERE product_image LIKE '%$product_image'";
                }
            }
            $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
            while( $row = mysqli_fetch_assoc($resultset) ) {
        ?>
        <div class="d-inline-block border m-3 box-shadow" style="border-radius: 10px;">
            <form action="product.php" method="GET"  style="cursor: pointer">
                <button class="bg-white border-0 outline-none p-1" type="submit" style="border-radius: 10px;" name="Submit">
                    <div>
                        <img class="img-fluid " name="product_image" width="200px  " src="Images/<?php echo $row["product_image"]; ?>.jpg">
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
                    <input name="product_image" id="<?php echo $row["product_image"]; ?>" type="hidden" value="<?php echo $row["product_image"]; ?>">
                    <button type="submit" name="Add" id="product_id"  class="btn btn-outline-primary m-2">Add to Cart</button>
                </div>
            </form>
            </div>
            <?php } 
        }?>
    </div>

<?php include("inc/footer.php"); ?>






<?php

    if(isset($_GET['Submit']))
    {
        $unique = $_GET['product_image'];
        $unique_lower = strtolower($unique);
        $unique_nospace = str_replace(" ", "", $unique_lower);
        $query = "SELECT * FROM products WHERE product_image = '$unique_nospace'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);

        $img_src = "Images/".$row['product_image'].".jpg";
        echo "<script>
                document.getElementById('product_name').innerHTML='".$row['product_name']."';
                document.getElementById('product_description').innerHTML='".$row['product_description']."';
             </script>";
    }
?>