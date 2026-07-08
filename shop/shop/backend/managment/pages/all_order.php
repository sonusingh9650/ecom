<?php
session_start();
require("../php/db.php");

// Admin Login Check
if(!isset ($_SESSION['user_email']))
{
   
}

$orders = $db->query("SELECT * FROM orders ");
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Orders</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f5f5;
        }
        .card{
            border:none;
            border-radius:15px;
        }
    </style>
</head>
<body>

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">

            <h3 class="mb-0">All Orders</h3>

            <a href="index.php" class="btn btn-light">
                Dashboard
            </a>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="table-primary">

                      <tr>
    <th>ID</th>
    <th>Payment ID</th>
    <th>Product ID</th>
    <th>Amount</th>
    <th>Customer Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Address</th>
    <th>Latitude</th>
    <th>Longitude</th>
    <th>Delivery Date</th>
    <th>Order Date</th>
    <th>Location</th>
</tr>
                    </thead>

                    <tbody>

                    <?php
                    if($orders->num_rows > 0)
                    {
                        while($row = $orders->fetch_assoc())
                        {
                    ?>

                   <tr>

    <td><?php echo $row['id']; ?></td>

    <td><?php echo $row['payment_id']; ?></td>

    <td><?php echo $row['product_id']; ?></td>

    <td>₹<?php echo $row['amount']; ?></td>

    <td><?php echo $row['customer_name']; ?></td>

    <td><?php echo $row['customer_phone']; ?></td>

    <td><?php echo $row['email']; ?></td>

    <td><?php echo $row['customer_address']; ?></td>

    <td><?php echo $row['latitude']; ?></td>

    <td><?php echo $row['longitude']; ?></td>

    <td><?php echo $row['delivery_date']; ?></td>

    <td><?php echo $row['created_at']; ?></td>

    <td>
        <?php if(!empty($row['map_link'])){ ?>
            <a href="<?php echo $row['map_link']; ?>" target="_blank" class="btn btn-success btn-sm">
                View Map
            </a>
        <?php } else { ?>
            <span class="badge bg-danger">No Location</span>
        <?php } ?>
    </td>

</tr>

                    <?php
                        }
                    }
                    else
                    {
                        echo "<tr>
                                <td colspan='11' class='text-center text-danger'>
                                    No Orders Found
                                </td>
                              </tr>";
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
