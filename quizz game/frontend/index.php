<?php
require("./php/database.php");

// categories from database
$cat = $db->query("SELECT category_name FROM category");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Quiz Game</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f7fc;
}

.navbar{
    background:#4f46e5;
}

.navbar-brand,
.nav-link{
    color:white !important;
}

.hero{
    background:linear-gradient(135deg,#4f46e5,#7c3aed);
    color:white;
    padding:90px 0;
}

.category-card{
    border:none;
    border-radius:15px;
    transition:.3s;
}

.category-card:hover{
    transform:translateY(-8px);
}

footer{
    background:#4f46e5;
    color:white;
    padding:20px;
    margin-top:60px;
}

</style>

</head>
<body>

   <div class="row">
       
    <?php
    require("./php/navbar.php");
    ?>
</div>
 

<!-- HERO -->
<section class="hero">

<div class="container text-center">

<h1>Play Quiz & Win</h1>

<p class="lead">
Test your knowledge with exciting quizzes.
</p>

<a href="categories.php" class="btn btn-warning btn-lg">
Start Quiz
</a>

</div>

</section>

<!-- CATEGORIES -->
<div class="container py-5">

    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">🎯 Quiz Categories</h1>
        <p class="text-muted">Choose your favorite category and start playing.</p>
    </div>

    <div class="row g-4">

        <?php
        if($cat->num_rows > 0){
            while($c = $cat->fetch_assoc()){
        ?>

        <div class="col-lg-3 col-md-4 col-sm-6">

            <div class="card category-card border-0 shadow-lg h-100">

                <div class="card-body text-center d-flex flex-column justify-content-center">

                    <div class="icon mb-3">
                        📚
                    </div>

                    <h4 class="fw-bold mb-3">
                        <?php echo $c['category_name']; ?>
                    </h4>

                    <a href="start_quizz.php?category=<?php echo $c['category_name']; ?>"
                       class="btn btn-primary px-4 rounded-pill">
                        ▶ Play Quiz
                    </a>

                </div>

            </div>

        </div>

        <?php
            }
        }else{
        ?>

        <div class="col-12">
            <div class="alert alert-warning text-center">
                No Categories Found!
            </div>
        </div>

        <?php } ?>

    </div>

</div>

<footer class="text-center">

© 2026 Quiz Game | All Rights Reserved

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>