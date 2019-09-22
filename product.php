<?php 
    session_start();
    include("inc/db_connect.php");
    include("inc/head_element.php");
?>
<title>Product</title>
<link rel="stylesheet" href="style/css.css">
<?php include("inc/header.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 py-3">
                    <img src="img_avatar.png" width="100%" name="image" id="product_image" alt="">
                    <div class="py-3 text-danger font-weight-bold lead pl-2">RS. <span id="product_cost2">cost</span></div>
                <form class="product-form">
                    <input type="hidden" name="product_qty" value="1">
                    <input name="product_image" id="product_image_hidden" type="hidden" value="">
                    <button class="btn btn-danger btn-block"  type="submit" name="Add" name="AddToCart">Add To Cart</button>
                    <button class="btn btn-primary btn-block my-2" type="button" >Buy</button>
                </form>
            </div>
            <div class="col-8 py-3">
                <div class="h-50">
                    <h2><div id="product_name" name="name">Name</div><hr class=""></h2>
                    <div class="py-3 text-danger font-weight-bold lead" name="cost">RS. <span id="product_cost1">cost</span></div>
                    <div id="product_description" name="description">Description</div>
                </div>
                <hr>
                <div>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim at quae, non repellendus corporis deleniti itaque libero adipisci consequatur unde sit blanditiis necessitatibus minima pariatur eaque omnis? Id molestiae labore expedita sapiente ipsam dignissimos voluptatum, recusandae quo quis, repellat provident aut reiciendis maxime excepturi laudantium repudiandae quaerat quod delectus tenetur aliquid omnis animi! Ipsam quidem eaque vel saepe voluptate incidunt labore beatae, ut, porro obcaecati soluta. Adipisci earum suscipit id a aut? Et provident vel est suscipit numquam nulla minus quo assumenda id error cumque molestiae, laborum animi dolor, excepturi earum. Aspernatur cumque sit, commodi quos corrupti sequi nemo hic.</p>
                </div>
            </div>
        </div>
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
                document.getElementById('product_image_hidden').value='".$row['product_image']."';
                document.getElementById('product_cost1').innerHTML='".$row['product_price']."';
                document.getElementById('product_cost2').innerHTML='".$row['product_price']."';
                document.getElementById('product_name').innerHTML='".$row['product_name']."';
                document.getElementById('product_image').src='".$img_src."';
                document.getElementById('product_description').innerHTML='".$row['product_description']."';
             </script>";
    }
?>