<?php
session_start();

if(!isset($_SESSION['user_email'])){
    header("Location: signuplogin.php");
    exit;
}
require("./php/database.php");

$category = $_GET['category'];

$questions = $db->query("SELECT * FROM questions WHERE quiz_id='$category'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Play Quiz</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:linear-gradient(135deg,#667eea,#764ba2);
    min-height:100vh;
    padding:40px 0;
    font-family:Arial, Helvetica, sans-serif;
}

.quiz-box{
    max-width:900px;
    margin:auto;
}

.quiz-title{
    background:#fff;
    border-radius:20px;
    padding:25px;
    text-align:center;
    margin-bottom:30px;
    box-shadow:0 15px 35px rgba(0,0,0,.15);
}

.quiz-title h2{
    font-weight:bold;
    color:#0d6efd;
}

.question-card{
    border:none;
    border-radius:18px;
    overflow:hidden;
    margin-bottom:30px;
    box-shadow:0 10px 30px rgba(0,0,0,.15);
}

.question-card .card-header{
    background:#0d6efd;
    color:#fff;
    font-size:22px;
    font-weight:bold;
    padding:15px 20px;
}

.card-body{
    padding:30px;
}

.option{
    display:flex;
    align-items:center;
    padding:15px 20px;
    margin-bottom:15px;
    border:2px solid #ddd;
    border-radius:12px;
    cursor:pointer;
    transition:.3s;
    font-size:18px;
    background:#fff;
}

.option:hover{
    background:#0d6efd;
    color:#fff;
    border-color:#0d6efd;
    transform:translateX(5px);
}

.option input{
    width:20px;
    height:20px;
    margin-right:15px;
}

.submit-btn{
    width:100%;
    padding:16px;
    font-size:22px;
    font-weight:bold;
    border-radius:15px;
}

</style>

</head>
<body>

<div class="container">

<div class="quiz-box">

<div class="quiz-title">
    <h2>🎯 <?php echo $category; ?> Quiz</h2>
    <p class="text-muted mb-0">Choose the correct answer for every question.</p>
</div>

<form action="result.php" method="POST">

<input type="hidden" name="category" value="<?php echo $category; ?>">

<?php
$i=1;

while($row=$questions->fetch_assoc())
{
?>

<div class="card question-card">

<div class="card-header">
Question <?php echo $i; ?>
</div>

<div class="card-body">

<div class="card-body">

<h4 class="mb-4 fw-bold">
    <?php echo $row['question']; ?>
</h4>

<label class="option">
    <input type="radio" name="answer[<?php echo $i; ?>]" value="option1" required>
    A. <?php echo $row['option1']; ?>
</label>

<label class="option">
    <input type="radio" name="answer[<?php echo $i; ?>]" value="option2">
    B. <?php echo $row['option2']; ?>
</label>

<label class="option">
    <input type="radio" name="answer[<?php echo $i; ?>]" value="option3">
    C. <?php echo $row['option3']; ?>
</label>

<label class="option">
    <input type="radio" name="answer[<?php echo $i; ?>]" value="option4">
    D. <?php echo $row['option4']; ?>
</label>

</div>
<?php
$i++;
}
?>

<button class="btn btn-success submit-btn">
🚀 Submit Quiz
</button>

</form>

</div>

</div>

</body>
</html>