<?php 
include("inc/db_connect.php");//connect the connection page
  
if(empty($_SESSION)) // if the session not yet started 
   session_start();
if(!isset($_POST['submit'])) { // if the form not yet submitted
   header("Location: http://localhost/Way2Gifts/login.php");
   exit; 
} 
//check if the username entered is in the database.s
$test_query = "SELECT * FROM users WHERE email = '".$_POST['username']."'";
$query_result = mysqli_query($conn, $test_query);
//conditions
if(mysqli_num_rows($query_result)==0) {
//if username entered not yet exists
    echo "The username you entered is invalid.";
}else {
//if exists, then extract the password.
    while($row_query = mysqli_fetch_array($query_result)) {
        // check if password are equal
        if($row_query['password']==$_POST['pass']){
            $_SESSION['pass'] = $_POST['pass'];
            $_SESSION['username'] = $row_query['email'];
          
            header("Location: http://localhost/Way2Gifts/main.php");
           
            exit; 
        } else{ // if not
            echo "Invalid Password"; 
        }
    }
}
?>
