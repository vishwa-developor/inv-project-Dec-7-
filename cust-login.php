<?php
function cust_login_validate()
{
    include('connection1.php');  
        $usermail = $_POST['mail'];  
        $password = $_POST['password'];  
      
     
        $usermail = stripcslashes($usermail);  
        $password = stripcslashes($password);  

        $usermail = mysqli_real_escape_string($con, $usermail);  
        $password = mysqli_real_escape_string($con, $password);  

        if(empty($usermail) && empty($password)) echo"<script> alert('Please fill the fields')</script>";
        else if(empty($usermail) || empty($password))
        {
            if(empty($usermail) && !empty($password)) echo"<script> alert('Please enter the id')</script>";
            else echo"<script> alert('Please enter the password')</script>";
        }
        else
        {
            $sql = "select *from customers_DB where cust_mail = '$usermail' and cust_password = '$password'";  
            $result = mysqli_query($con, $sql);  
            //$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
              
            if($count == 1){  
                echo "<script> alert('Login Successfull !')</script>";  
                header("location:../php files/customerdashboard.php");
            }  
            else{  
                echo "<script> alert('Login Failed !')</script>";  
            }
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer  Signin</title>
    <link rel="stylesheet" type="text/css" href="../css files/customerSignIn2style.css">
</head>
<body>
    <div class="login">
        <h1>Customer LOGIN</h1>
        <form method="post" action="" target="_self">
          <p><input type="email" name="mail" id="mail-id"value="" placeholder="mail"></p>
          <p><input type="password" name="password" value="password" placeholder="Password"></p>
          <p class="remember_me">
            <label>
              <input type="checkbox" name="remember_me" id="remember_me">
              Remember me 
            </label>
          </p>
          <p class="submit"><input type="submit" name="commit" value="Login"></p>
          
        </form>
        <p>Don't have an account ? <button class="register-btn" onclick="location.href='cust-register.php'"></button></p>
    </div>
      
    <div class="login-help">
        <p>Forgot your password? <a href="#">Click here to reset it</a>.</p>
    </div>
</body>
</html>
<?php      
if(array_key_exists('commit',$_POST))
{
    cust_login_validate();
}
    // if(isset($_POST['commit']))
    // {
    //     cust_login_validate();
    // }
         
     
?> 
