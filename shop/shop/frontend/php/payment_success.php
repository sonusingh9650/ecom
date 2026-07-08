<?php
session_start();
require("../php/database.php");

$payment_id = $_POST['payment_id'];
$product_id = $_POST['product_id'];
$amount = $_POST['amount'];
$email = $_POST['email'];
$name = $_POST['customer_name'];
$phone = $_POST['customer_phone'];
$address = $_POST['customer_address'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$google_map = "https://www.google.com/maps?q=".$latitude.",".$longitude;



$check_table = $db->query("SHOW TABLES LIKE 'orders'");

if($check_table->num_rows == 0)
{
   $create_table = $db->query("
    CREATE TABLE orders(
        id INT AUTO_INCREMENT PRIMARY KEY,
        payment_id VARCHAR(255) NOT NULL,
        product_id INT NOT NULL,
        amount DECIMAL(10,2) NOT NULL,
        customer_name VARCHAR(100) NOT NULL,
        customer_phone VARCHAR(20) NOT NULL,
        customer_address TEXT NOT NULL,
         delivery_date DATE,
         email VARCHAR(100),
         latitude VARCHAR(50),
    longitude VARCHAR(50),
    map_link TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
    ");
   if ($create_table) {
            $delivery_date = date('Y-m-d', strtotime('+7 days'));

 $store = $db->query("
INSERT INTO orders
(
 payment_id,
 product_id,
 amount,
 customer_name,
 customer_phone,
 customer_address,
 delivery_date,
 email,
 latitude,
 longitude,
 map_link
)
VALUES
(
 '$payment_id',
 '$product_id',
 '$amount',
 '$name',
 '$phone',
 '$address',
 '$delivery_date',
 '$email',
 '$latitude',
 '$longitude',
 '$google_map'
)
");
            if($store)
            {
            	echo "success";

            }
            else
            { 
            
            echo "failed";	   
   }
}

   else{
   	echo "failed";
   }
            
}
else{
	$delivery_date = date('Y-m-d', strtotime('+7 days'));

 $store = $db->query("
INSERT INTO orders
(
 payment_id,
 product_id,
 amount,
 customer_name,
 customer_phone,
 customer_address,
 delivery_date,
 email,
 latitude,
 longitude,
 map_link
)
VALUES
(
 '$payment_id',
 '$product_id',
 '$amount',
 '$name',
 '$phone',
 '$address',
 '$delivery_date',
 '$email',
 '$latitude',
 '$longitude',
 '$google_map'
)
");
	if($store)
{
    echo "success";
}
else
{
    echo "failed";
}
}
?>