<?php

require("db.php");

$product_name = $_POST['product_name'];
$category = $_POST['category'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$amount = $_POST['amount'];

$product_image = $_FILES['product_image']['name'];
$tmp_name = $_FILES['product_image']['tmp_name'];

move_uploaded_file($tmp_name, "../upload/".$product_image);

$insert = $db->query("INSERT INTO add_product
(name,category,description,quantity, amount, image)

VALUES
('$product_name','$category','$description','$quantity', '$amount', '$product_image')");

if($insert)
{
    echo "success";
}
else
{ 
    echo"failed";
	
    // echo mysqli_error($db);
}

?>