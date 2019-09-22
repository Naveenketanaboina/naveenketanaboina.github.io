<?php
    // If the values are posted, insert them into the database.
    if (isset($_POST['email']) && isset($_POST['password'])){
        $Fname = $_POST['Fname'];
        $Lname = $_POST['Lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        //$cpassword = $_POST['Cpassword'];
        $connection = mysqli_connect("localhost", "root", "");
        mysqli_select_db($connection,"login");
        
        $slquery = "SELECT 1 FROM users WHERE email = '$email'";
        $selectresult = mysqli_query($connection, $slquery);
        if(!$selectresult || mysqli_num_rows($selectresult) > 0)
        {
            echo "<script>
                    alert('User Already Exist');
                    window.location.href='http://localhost/Way2Gifts/Login.html';
                </script>";
        }
        else{
            $query = "INSERT INTO `users` (username, email, password) VALUES ('$Fname $Lname', '$email', '$password')";
            $result = mysqli_query($connection, $query);
            if($result){
                echo "<script>
                    alert('Registered Successfully');
                </script>";
                header("Location: http://localhost/Way2Gifts/Login.html"); /* Redirect browser */
                exit();
            }
            else{
                echo "not registered";
            }
        }
    }
    
    function test_input($data) 
    {
        if(isset($_POST['Submit']))
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
?>