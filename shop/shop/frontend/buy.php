<?php
  

    require("php/database.php");
    $product_id = $_GET['id'];

    $get_pro = $db->query("SELECT * FROM addproduct WHERE id = '$product_id'");

    $aa = $get_pro->fetch_assoc();
    




?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title><?php  echo $aa['product_name']?></title>


</head>
<body>




    <div class="container-fluid">
        <div class="row">

        <?php

        require("php/navbar.php");

        ?>

        </div>

        <div class="container mt-5">
    <?php
    $get_pro = $db->query("SELECT * FROM addproduct WHERE id='$product_id'");
    $aaa = $get_pro->fetch_assoc();

    ?>

    <div class="row">

        <!-- Product Image -->
        <div class="col-md-5">
            <div class="card border-0">
                <img src="../backend/managment/upload/<?php echo $aaa['product_image']; ?>"
                     class="img-fluid border rounded"
                     alt="">
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-4 border shadow">
            <h2><?php echo $aaa['product_name']; ?></h2>

            <hr>

            <h3 class="text-success">
                ₹<?php echo number_format($aaa['amount']); ?>
            </h3>

            <p class="text-muted">
                Inclusive of all taxes
            </p>

            <hr>

            <h5>Description</h5>

            <p>
                <?php echo $aaa['product_description']; ?>
            </p>

            <div class="mt-4">
                <div class="mt-4">

    <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" class="form-control" id="customer_name" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Phone Number</label>
        <input type="text" class="form-control" id="customer_phone" required>
    </div>

  <div class="mb-3">
    <label class="form-label">Address</label>
    <textarea class="form-control" id="customer_address" rows="3" required></textarea>
</div>

<button type="button" class="btn btn-success mb-3" id="get_location">
    Get Current Location
</button>
<input type="hidden" id="latitude">
<input type="hidden" id="longitude">

 <input type="hidden" id="user_email" value="<?php echo $_SESSION['user_email']; ?>">

                <?php 

                if($aaa['quantity'] == 0)
                {
                        echo '<span class="btn btn-danger w-100 mt-3">Out Of Stock</span>';
                }
                else

                {
                    echo '<span class="btn btn-primary w-100 mt-3 buy_product">Buy Now</span>';
                }


                ?>
                <!-- <span class="btn btn-primary w-100 mt-3">Buy Now</span> -->
            </div>
        </div>

        <!-- Buy Box -->
        
        </div>

    </div>
</div>
        
    </div>





<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
$(document).ready(function(){

    // Get Current Location
    $("#get_location").click(function(){

        if(navigator.geolocation){

            navigator.geolocation.getCurrentPosition(function(position){

                var lat = position.coords.latitude;
                var lon = position.coords.longitude;

                $("#latitude").val(lat);
                $("#longitude").val(lon);

                $.get(
                    "https://nominatim.openstreetmap.org/reverse?format=json&lat="+lat+"&lon="+lon,
                    function(data){

                        if(data.display_name){
                            $("#customer_address").val(data.display_name);
                        }

                    }
                );

            },function(){

                alert("Location permission denied.");

            });

        }else{

            alert("Geolocation not supported.");

        }

    });

    // Buy Product
    $(".buy_product").click(function(e){

        e.preventDefault();

        var email = $("#user_email").val();
        var customer_name = $("#customer_name").val();
        var customer_phone = $("#customer_phone").val();
        var customer_address = $("#customer_address").val();
        var latitude = $("#latitude").val();
        var longitude = $("#longitude").val();

        if(customer_name=="" || customer_phone=="" || customer_address=="")
        {
            alert("Please fill all details.");
            return false;
        }

        if(latitude=="" || longitude=="")
        {
            alert("Please click on 'Get Current Location' first.");
            return false;
        }

        var options = {

            key: "rzp_test_T2jjXeFFGO3pTn",

            amount: "<?php echo $aaa['amount'] * 100; ?>",

            currency: "INR",

            name: "Coach 4 U Computer Institute",

            description: "<?php echo $aaa['product_name']; ?>",

            handler: function (response){

                $.ajax({

                    url:"./php/payment_success.php",

                    type:"POST",

                    data:{

                        payment_id:response.razorpay_payment_id,

                        product_id:"<?php echo $aaa['id']; ?>",

                        amount:"<?php echo $aaa['amount']; ?>",

                        customer_name:customer_name,

                        customer_phone:customer_phone,

                        customer_address:customer_address,

                        email:email,

                        latitude:latitude,

                        longitude:longitude

                    },

                    success:function(res){

                        if(res.trim()=="success")
                        {

                            Swal.fire({
                                icon:"success",
                                title:"Payment Successful",
                                text:"Order Placed Successfully"
                            }).then(()=>{
                                window.location="your_order.php";
                            });

                        }
                        else
                        {

                            Swal.fire({
                                icon:"error",
                                title:"Error",
                                text:"Payment Failed"
                            });

                        }

                    }

                });

            },

            theme:{
                color:"#3399cc"
            }

        };

        var rzp = new Razorpay(options);

        rzp.open();

    });

});
</script>

</body>
</html>