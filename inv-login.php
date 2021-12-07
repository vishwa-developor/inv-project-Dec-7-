<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Login</title>
    <link rel="stylesheet" type="text/css" href="../css files/invLogin.css">
</head>
<body>
    <div class="login"> 
        <h1>INV TEAM LOGIN page</h1>
        <form method="post" action="">
          <p><input type="text" name="invid" value="" placeholder="user id"></p>
          <p><input type="password" name="password" value="" placeholder="Password"></p>
          <p class="remember_me">
            <label>
              <input type="checkbox" name="remember_me" id="remember_me">
              Remember me 
            </label>
            
          </p>
          <p class="submit"><input type="submit" name="commit" value="Login"></p>
        </form>
    </div>
      
    <div class="login-help">
        <p> Forgot your password? <a href="#">Click here to reset it</a>.</p>
    </div>
</body>
</html>
<?php      
    include('connection1.php');  
    if(isset($_POST['commit']))
    {

    
        $userid = $_POST['invid'];  
        $password = $_POST['password'];   
        $userid = stripcslashes($userid);  
        $password = stripcslashes($password);  
        $userid = mysqli_real_escape_string($con, $userid);  
        $password = mysqli_real_escape_string($con, $password);  
        if(empty($userid) && empty($password)) echo"<script> alert('Please fill the fields')</script>";
        else if(empty($userid) || empty($password))
        {
            if(empty($userid) && !empty($password)) echo"<script> alert('Please enter the id')</script>";
            else echo"<script> alert('Please enter the password')</script>";
        }
        else
        {
            $sql = "select *from invTeam_DB where inv_id = '$userid' and inv_password = '$password'";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
                
            if($count == 1){  
                echo "<script> alert('Login Successfull !')</script>";  
                header("location:../php files/invdashboard.php");
            }  
            else{  
                echo "<script> alert('Login Failed !')</script>";  
            }
        }
    }
?> 

