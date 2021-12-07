<?php
echo"Login Successfull !"."<br>";
echo "<h1> INVENTORY DASHBOARD </h1>";
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css files/invMainDashBoardStyle.css">
    </head>
    <body> 
        <div class="trackOrder">
            <h4> Track The Order </h4>
            <form method="post" action="">
            <input type="number" name="orderId" >
            <button class="trackOrderbtn" type="submit" name="track" value="submit">Track</button><br>
            </form>
        </div>
        <button class="button createOrderButton" onclick="location.href='create_order.php'">Create an Order</button>
        <button class="button addProductButton" onclick="location.href='add_product.php'">Add Product</button>       
        <button class="button checkAvailabilityButton" onclick="location.href='check_product_availability.php'">Check Availability</button>
        <button class="button checkAvailabilityButton" onclick="location.href='filter_products.php'">Filter Products</button>
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
//if(isset($_SESSION['con']))
//{
else
{
    if(isset($_POST['track']))
    {
        $id=$_POST['orderId'];
        $sql = "SELECT *  FROM orders where o_id='$id'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) 
        {
             
            while($row = mysqli_fetch_assoc($result)) 
            {
                echo "customer_id: " . $row["c_id"]. " - Customer Name: " . $row["c_name"]. " p_id :".$row['p_id']." p_name: ".$row['p_name']."p_type: ".$row['p_type']."dlagId: ".$row['dl_ag_id']." Status: " . $row["status"]. "<br>";
            }
        } 
        else 
        {
            echo "0 results";
        } 
    }
}
?>