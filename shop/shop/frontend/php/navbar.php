<?php
session_start();
?>

<style>
  .navbar{
    background: linear-gradient(135deg,#0f172a,#1e293b) !important;
    padding:15px 25px;
}

.navbar-brand{
    color:#f8fafc !important;
    font-size:28px;
    font-weight:700;
}

.nav-link{
    color:#e2e8f0 !important;
    font-weight:500;
    margin:0 8px;
    transition:.3s;
}

.nav-link:hover{
    color:#fbbf24 !important;
}

.search-box{
    border-radius:30px;
    border:none;
    padding:10px 15px;
}

#signup_btn{
    background:#fbbf24;
    color:#000;
    border:none;
    margin-left: 20px;
    border-radius:30px;
    font-weight:600;
    padding:8px 20px;
}

#signup_btn:hover{
    background:#f59e0b;
}

#logout_btn{
  margin-left: 20px;
    border-radius:30px;
}
</style>

<nav class="navbar navbar-expand-lg shadow">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">
             C4U SHOP
        </a>

        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse"
             id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" href="index.php">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        About Us
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Contact Us
                    </a>
                </li>
                <li class="nav-item">
    <a class="nav-link" href="your_order.php">
        Your Orders
    </a>
</li>
   <li class="nav-item">
    <a class="nav-link" href="your_profile.php">
        your profile
    </a>
</li>


            </ul>

            <form class="d-flex align-items-center">

                <input
                    class="form-control search-box"
                    type="search"
                    placeholder="Search Products">

                <?php
                if(isset($_SESSION['user_email']))
                {
                ?>
                    <a href="./php/logout.php"
                       class="btn btn-danger"
                       id="logout_btn">
                        Logout
                    </a>
                <?php
                }
                else
                {
                ?>
                    <button type="button"
                            class="btn btn-light"
                            id="signup_btn">
                        Signup
                    </button>
                <?php
                }
                ?>

            </form>

        </div>
    </div>
</nav>