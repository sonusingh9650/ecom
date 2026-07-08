<?php
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">

        <a class="navbar-brand fw-bold" href="index.php">
            🎯 Quiz Game
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="categories.php">Categories</a>
                </li>
                  

                <?php if(isset($_SESSION['user_email'])){ ?>

                

                   
                       <a href="php/logout.php" class="btn btn-danger">
                                    Logout
                                </a>
                                      

                <?php }else{ ?>

                    <li class="nav-item ms-lg-2">
                        <a href="signuplogin.php" class="btn btn-warning">
                            Login
                        </a>
                    </li>

                <?php } ?>

            </ul>

        </div>

    </div>
</nav>