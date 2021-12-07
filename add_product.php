<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Product</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css files/dashboardstyles.css">
</head>
<body>
	<div class="insertOrders">
        <h4> Add Product </h4>
        <form method="post" action="" class="container">
        	<div class="row">

	        	<div class="col-md-4 form-row">
	                <label>Product Id :</label> <br>
	                <input type="number" name="pId" placeholder="product id">
	            </div>

	            <div class="col-md-4 form-row">
	                <label>Product Name :</label> <br>
	                <input type="text" name="pName" placeholder="product name">
	            </div>

	            <div class="col-md-4 form-row">
	                <label>Product Brand :</label> <br>
	                <input type="text" name="pBrand" placeholder="product brand">
	            </div>
	            
	            <div class="col-md-4 form-row">
	                <label>Product Category :</label> <br>
	                <input type="text" name="pCategory" placeholder="product category">
	            </div>

                <div class="col-md-4 form-row">
	                <label>Product Quantity :</label> <br>
	                <input type="number" name="pQuantity" placeholder="product quantity">
	            </div>

                <div class="col-md-4 form-row">
	                <label>Product Supplier :</label> <br>
	                <input type="text" name="pSupplier" placeholder="product supplier">
	            </div>



                <div class="col-md-4 form-row">
	                <label>Product Damaged :</label> <br>
	                <input type="text" name="pDamaged" placeholder="product damaged">
	            </div>

	            <div class="col-md-4 form-row">
	                <label>Product Perishable :</label> <br>
	                <input type="text" name="pPerishable" placeholder="product perishable">
				</div>
				
	            
	            <div class="col-md-4 from-row">
	                <label>Product Arrived Date :</label> <br>
	                <input type="date" name="pDateIn" placeholder="arrival date">
	            </div>

                <div class="col-md-4 form-row">
	                <label>Product Price :</label> <br>
	                <input type="number" name="pPrice" placeholder="product price">
	            </div>

                <div class="col-md-4 form-row">
	                <label>Product Availability :</label> <br>
	                <input type="text" name="pAvailable" placeholder="product available">
	            </div>

				<div class="col-md-4 form-row">
	                <label>Product Expiry date :</label> <br>
	                <input type="date" name="pExpiryDate" placeholder="product expiry date">
	            </div>
	           
	        </div>
	        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Insert" name="addProducts">
        </form>
    </div>
</body>
</html>
<?php
//session_start();
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
	if(isset($_POST['addProducts']))
	{
	
		$pId=$_POST['pId'];
		$pName=$_POST['pName'];
		$pBrand=$_POST['pBrand'];
		$pCategory=$_POST['pCategory'];
        $pQuantity=$_POST['pQuantity'];
        $pSupplier=$_POST['pSupplier'];
		$pDamaged=$_POST['pDamaged'];
        $pPerishable=$_POST['pPerishable'];
        $pDateIn=$_POST['pDateIn'];
        $pPrice=$_POST['pPrice'];
		$pAvailable=$_POST['pAvailable'];
		$pExpiryDate=$_POST['pExpiryDate'];
	
		$sql="insert into products_db(p_id,p_name,p_brand,p_category,p_quantity,p_supplier,p_damaged,p_perishable,p_date_in,p_price_per_item,p_available,p_expiry_date)
        values('$pId','$pName','$pBrand','$pCategory','$pQuantity','$pSupplier','$pDamaged','$pPerishable','$pDateIn','$pPrice','$pAvailable','$pExpiryDate')";
        if(mysqli_query($con,$sql))
        {
            echo "<script> alert('Product Added Successfully !')</script>"; 
        }
        else echo "<script> alert('Inserting Products Failed !')</script>";
	}
}
?>