<?php
session_start();
require("./php/database.php");

if(!isset($_SESSION['user_email']))
{
    header("Location: signuplogin.php");
    exit();
}

$email = $_SESSION['user_email'];

$orders = $db->query("
    SELECT * FROM orders
    WHERE email='$email'
");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Orders</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Your Orders</h3>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped">

                    <thead class="table-dark">
                        <tr>
                            
                            <th>Payment ID</th>
                            <th>Product ID</th>
                            <th>Amount</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>delivery_Date</th>
                        </tr>
                    </thead>
                    <div class="mb-3">
    <a href="index.php" class="btn btn-primary">
        ← Back
    </a>
</div>

                    <tbody>

                    <?php
                    if($orders->num_rows > 0)
                    {
                        while($row = $orders->fetch_assoc())
                        {
                    ?>
                        <tr>
                           
                            <td><?php echo $row['payment_id']; ?></td>
                            <td><?php echo $row['product_id']; ?></td>
                            <td>₹<?php echo $row['amount']; ?></td>
                            <td><?php echo $row['customer_name']; ?></td>
                            <td><?php echo $row['customer_phone']; ?></td>
                            <td><?php echo $row['customer_address']; ?></td>
                            <td><?php echo $row['delivery_date']; ?></td>
                        </tr>
                    <?php
                        }
                    }
                    else
                    {
                        echo "<tr><td colspan='8' class='text-center'>No Orders Found</td></tr>";
                    }
                    ?>

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</div>

</body>
</html>
