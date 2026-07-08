<?php
session_start();

if(!isset($_SESSION['user_email'])){
    header("Location: signuplogin.php");
    exit;
}

require("./php/database.php");

$category = $db->query("SELECT category_name FROM category");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Add Quiz</title>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#eef2f7;
}

.main-box{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:30px;
}

.quiz-card{
    width:100%;
    max-width:650px;
    background:#fff;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.1);
}

.card-header{
    background:linear-gradient(90deg,#2563eb,#0ea5e9);
    color:#fff;
    text-align:center;
    padding:20px;
}

.card-header h3{
    margin:0;
    font-weight:600;
}

.card-body{
    padding:30px;
}

label{
    font-weight:600;
    color:#444;
    margin-bottom:8px;
}

.form-control{
    height:50px;
    border-radius:12px;
    margin-bottom:20px;
}

textarea.form-control{
    height:120px;
}

.btn-custom{
    width:100%;
    height:50px;
    border:none;
    border-radius:12px;
    background:linear-gradient(90deg,#2563eb,#0ea5e9);
    color:#fff;
    font-size:18px;
    font-weight:600;
    transition:.3s;
}

.btn-custom:hover{
    transform:translateY(-2px);
}

</style>

</head>

<body>


	

    <div class="card shadow-lg border-0">
        
       
        <div class="main-box">

<div class="quiz-card">

<div class="card-header">
<h3><i class="fa-solid fa-circle-question"></i> category</h3>
</div>
   <table class="table table-hover table-striped mb-0 align-middle">
                
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                      
                        <th>Category</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                require("./php/database.php");

                $categroies= $db->query("SELECT * FROM category");

                if ($categroies->num_rows > 0) {
                    while ($row = $categroies->fetch_assoc()) {
                ?>

                    <tr>
                        <td><span class="badge bg-secondary"><?php echo $row['id']; ?></span></td>
                        
                        
                        <td>
                            <span class="badge bg-info text-dark">
                                <?php echo $row['category_name']; ?>
                            </span>
                        </td>

                       <td class="text-center">
    <a href="start_quizz.php?category=<?php echo $row['category_name']; ?>"
       class="btn btn-sm btn-success px-3">
        <i class="fa fa-play"></i> Start
    </a>
</td>
                    </tr>

                <?php
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">
                            ❌ No Quiz Found
                        </td>
                    </tr>
                <?php
                }
                ?>

                </tbody>
            </table>

<div class="card-body">


</div>

</div>






</body>
</html>