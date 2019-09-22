<?php 
    session_start();
    include("inc/db_connect.php");
    include("inc/head_element.php");
?>
<title>OrderSummary</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style/checkout.css">
<link rel="stylesheet" href="style/css.css">
<?php include("inc/header.php"); ?>

<div class="container row mx-auto my-3">
    <div class="col-9">
        <div class="tabbable w-100">
            <ul class="nav nav-tabs wizard">
                <li class="completed active">
                    <a href="#i9" data-toggle="tab"  aria-expanded="true">
                        <span class="nmbr">1</span>Billing</a>
                </li>
                <li class="">
                    <a href="#w4" data-toggle="tab" aria-expanded="false">
                        <span class="nmbr">2</span>Step 02</a>
                </li>
                <li class="">
                    <a href="#stateinfo" data-toggle="tab" aria-expanded="false">
                        <span class="nmbr">3</span>Step 03</a>
                </li>
            
                <li>
                    <a href="#finish" data-toggle="tab" aria-expanded="true">
                        <span class="nmbr">5</span>Step 05</a>
                </li>

            </ul>
            <script src="//static.codepen.io/assets/common/stopExecutionOnTimeout-41c52890748cd7143004e05d3c5f786c66b19939c4500ce446314d1748483e13.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>



            <script>
                $('.wizard li').click(function () {
                    $(this).prevAll().addClass("completed");
                    $(this).nextAll().removeClass("completed")

                });
                //# sourceURL=pen.js
            </script>
            <script src="https://static.codepen.io/assets/editor/live/css_reload-2a5c7ad0fe826f66e054c6020c99c1e1c63210256b6ba07eb41d7a4cb0d0adab.js"></script>
        </div>

        <div id="billing" class="tabcontent" id="">
            <div class="my-2">
                <div class="px-0">
                    <h4 class="mb-3">Billing address</h4>
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

                        <div class="mb-3">
                            <label for="username">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" class="form-control" id="username" placeholder="Username" required>
                                <div class="invalid-feedback" style="width: 100%;">
                                    Your username is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email
                                <span class="text-muted">(Optional)</span>
                            </label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
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
            </div>
        </div>

        <div id="News" class="tabcontent">
            <h3>News</h3>
            <p>Some news this fine day!</p>
        </div>

        <div id="Contact" class="tabcontent">
            <h3>Contact</h3>
            <p>Get in touch, or swing by for a cup of coffee.</p>
        </div>

        <div id="About" class="tabcontent">
            <h3>About</h3>
            <p>Who we are and what we do.</p>
        </div>
    </div>
    <div class="col-3">
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
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">Product name</h6>
                </div>
                <span class="text-muted">$12</span>
            </li>
        </ul>
    </div>
<script>
    function openPage(pageName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.backgroundColor = "";
        }
        document.getElementById(pageName).style.display = "block";

    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
</div>


<?php include("inc/footer.php"); ?>