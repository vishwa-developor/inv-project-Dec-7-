<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Register</title>
    <link rel="stylesheet" type="text/css" href="../css files/customer-register-style.css">
</head>

<body>
    <div class="login">
        <h1>Customer Register</h1>
        <form method="post" action="" target="_self">
           Name: <p><input type="text" name="name" id="name"value="" placeholdinsertSignInValidateer="mail"></p><br>
          Mail:<p><input type="email" name="mail" id="mail-id"value="" placeholdinsertSignInValidateer="mail"></p><br>
          Number:<p><input type="number" name="number" id="number"value="" placeholdinsertSignInValidateer="mail"></p><br>
          Password:<p><input type="password" name="password" value="password" placeholder="Password"></p>
          <p class="remember_me">
            <label>
              <input type="checkbox" name="remember_me" id="remember_me">
              Remember me 
            </label>
          </p>
          <p class="submit"><input type="submit" name="commit" value="Register"></p>
    </div>
      
    <div class="login-help">
        <p>Forgot your password? <a href="#">Click here to reset it</a>.</p>
    </div>
</body>
</html>
<?php  
    if(isset($_POST['commit']))
    {    
        include('connection1.php');  
        
        $userName = $_POST['name'];  
        $userMail=$_POST['mail'];
        $userPhoneNumber=$_POST['number'];
        $userPassword = $_POST['password'];  
        

        $userName = stripcslashes($userName);  
        $userMail=stripcslashes($userMail);
        $userPhoneNumber = stripcslashes($userPhoneNumber);
        $userPassword = stripcslashes($userPassword);  
        

        $userName = mysqli_real_escape_string($con, $userName);
        $userMail = mysqli_real_escape_string($con, $userMail);
        $userPhoneNumber= mysqli_real_escape_string($con, $userPhoneNumber);  
        $userPassword = mysqli_real_escape_string($con, $userPassword);  

        if(empty($userName) && empty($userPassword) && empty($userMail) && empty($userPhoneNumber)) echo"<script> alert('Please fill the fields')</script>";
        else if(empty($userName)) echo"<script> alert('Please enter your name')</script>";
        else if(empty($userMail)) echo"<script> alert('Please enter your mail')</script>";
        else if(empty($userPhoneNumber))echo"<script> alert('Please enter your phonenumber')</script>";
        else if(empty($userPassword)) echo"<script> alert('Please enter the Password')</script>";
        else
        {
            
                
                    $insert_query="insert into customers_DB (cust_name,cust_mail,cust_number,cust_password) values('$userName','$userMail','$userPhoneNumber','$userPassword')";
                    if(mysqli_query($con,$insert_query)) echo "<script> alert('Registered Successfully')</script>";
                    else "<script> alert('Registration Failed')</script>";
                
            
        }
    }
?> 
