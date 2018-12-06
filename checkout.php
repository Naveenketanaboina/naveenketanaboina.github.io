<?php 
    session_start();
    include("inc/db_connect.php");
    include("inc/head_element.php");
    include("inc/user.php");
?>
<title>Checkout</title>
<link rel="stylesheet" href="style/css.css">
<?php include("inc/header.php"); ?>


<h2 class="text-center my-3">Billing</h2>
<div class="container row mx-auto mt-3">
    <div class="col-8">
        <br>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs border border-0" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#address">Address</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#payment">Payment Mode</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#confirm">Place Order</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="address" class="container tab-pane active"><br>
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="mobile">Mobile</label>
                            <input type="tel" class="form-control" id="mobile" placeholder="9874563210">
                            <div class="invalid-feedback">
                                Please enter a valid Mobile Number for shipping updates.
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="email">Email
                                <span class="text-muted">(Optional)</span>
                            </label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Address 2
                            <span class="text-muted">(Optional)</span>
                        </label>
                        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                    </div>

                    <div class="row ">
                        <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100" id="state" required>
                                <option value="">Choose...</option>
                                <option>Telangana</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="country">City</label>
                            <select class="custom-select d-block w-100" id="country" required>
                                <option value="">Choose...</option>
                                <option>Hyderabad</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" placeholder="" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                        <button class="btn btn-primary w-25 ml-auto">Continue</button>
                    </div>
                </form>
            </div>
            <div id="payment" class="container tab-pane fade"><br>
                <h3>Menu 1</h3>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div id="confirm" class="container tab-pane fade"><br>
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>
        </div>
    </div>

    <div class="col-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill" id="cart-container">
                <?php 
                        if(isset($_SESSION["products"])){
                            echo count($_SESSION["products"]); 
                        } else {
                            echo 0; 
                        }
                    ?>
            </span>
        </h4>
        <ul class="list-group mb-3">
            <?php 
				$total = 0; 
                foreach($_SESSION["products"] as $product){					
					$product_name = $product["product_name"]; 
					$product_price = $product["product_price"];
					$product_qty = $product["product_qty"];
                    $subtotal = ($product_price * $product_qty);
					$total = ($total + $subtotal);
            ?>
            <li class="list-group-item d-flex justify-content-between lh-condensed row mx-0" style="font-size: 15px">
                <div class="col-5 p-0">
                    <h6 class="my-0" style="font-size: 14px"><?php echo $product_name; ?></h6>
                </div>
                <span class="col-4 p-0">x<?php echo $product_qty; ?> Rs.<?php echo $product_price; ?></span>
                <span class="text-muted col-3">Rs.<?php echo $product_price * $product_qty; ?> </span>
            </li>
            <?php } ?>
            <li class="list-group-item d-flex justify-content-end lh-condensed">
                Total: <?php echo $total; ?>
            </li>
        </ul>
    </div>
</div>


<?php include("inc/footer.php"); ?>