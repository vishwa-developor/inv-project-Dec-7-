<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Availability</title>
</head>
<body>
    <form method="post" action="">
        Product Id : <input type="number" name="pId">
        Product Name : <input type="text" name="pName">
        Prduct Quantity : <input type="number" name="pQuantity">
        <input type="submit" value="search" name="checkAvailability">
    </form>
</body>
</html>
<?php
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "mydb";  
$con = mysqli_connect($host, $user, $password, $db_name);  

if(mysqli_connect_errno()) {  
    die("Failed to connect with MySQL: ". mysqli_connect_error());  
}  
else
{
    if(isset($_POST['checkAvailability']))
    {
        $pId=$_POST['pId'];
        $pName=$_POST['pName'];
        $pQuantity=$_POST['pQuantity'];
        $sql="select p_quantity from products_db where p_name='$pName' and p_id='$pId'";
        
        if($q=mysqli_query($con,$sql))
        {
            $t=mysqli_fetch_array($q);
            $availableQuantity=intval($t[0]);
            if($availableQuantity<$pQuantity) 
            {
                $val1=($pQuantity-$availableQuantity);
                echo "<h3> Oops!!! Product is unavailable </h3>";
                echo "<h3> There is a Shortage of  $val1 items</h3>";
            }
            else if($availableQuantity>=$pQuantity)
            {
                $val2=($availableQuantity-$pQuantity);
                echo "<h3> Yes the Product is available .</h3>"."<br>";
                echo "<h3> Still $val2 items left in the inventory </h3>";
            } 
        }
        else "Searching Failed";
        
        
    }
}
?>