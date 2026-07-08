<?php
session_start();
require("php/database.php");

if(!isset($_SESSION['user_email']))
{
    header("Location:index.php");
    exit();
}

$email = $_SESSION['user_email'];

$user = $db->query("SELECT * FROM users WHERE email='$email'");
$row = $user->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f1f5f9;
        }

        .profile-card{
            max-width:700px;
            margin:50px auto;
            border:none;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 10px 30px rgba(0,0,0,.1);
        }

        .profile-header{
            background:linear-gradient(135deg,#0f172a,#1e293b);
            color:white;
            text-align:center;
            padding:40px 20px;
        }

        .profile-img{
            width:120px;
            height:120px;
            border-radius:50%;
            background:white;
            color:#0f172a;
            font-size:50px;
            display:flex;
            align-items:center;
            justify-content:center;
            margin:auto;
            margin-bottom:15px;
        }

        .profile-body{
            padding:30px;
        }

        .info-box{
            background:#f8fafc;
            padding:15px;
            border-radius:12px;
            margin-bottom:15px;
        }

        .info-title{
            font-size:13px;
            color:#64748b;
            margin-bottom:5px;
        }

        .info-value{
            font-size:18px;
            font-weight:600;
            color:#0f172a;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="card profile-card">

        <div class="profile-header">

            <div class="profile-img">
                👤
            </div>

            <h3>
                <?php echo $row['full_name']; ?>
            </h3>

            <p class="mb-0">
                Welcome to your profile
            </p>

        </div>

        <div class="profile-body">

            <div class="info-box">
                <h6>Full name</h6>
        <?php echo $row['full_name']; ?>
            </div>

          
            <div class="info-box">
               <h6>Email address</h6>
                    <?php echo $row['email']; ?>
            </div>
            
            

            <div class="info-box">
               <h6>Phone Number</h6>
                    <?php echo $row['phone']; ?>
            </div>
          


            
             <div class="info-box">
            <h6>address</h6>
           <?php echo $row['address']; ?>
         </div>
      

            <div class="text-center mt-4">
                <a href="index.php" class="btn btn-primary">
                    Back To Home
                </a>

                <a href="./php/logout.php"
                   class="btn btn-danger">
                    Logout
                </a>
            </div>

        </div>

    </div>

</div>

</body>
</html>