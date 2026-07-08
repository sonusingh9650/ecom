<?php
require("./php/database.php");

$category = $_POST['category'];

$answer = $_POST['answer'];

$questions = $db->query("SELECT * FROM questions WHERE quiz_id='$category'");

$total = 0;
$correct = 0;
$wrong = 0;

$i = 1;

while($row = $questions->fetch_assoc()){

    $total++;

    if(isset($answer[$i])){

        if($answer[$i] == $row['correct_answer']){
            $correct++;
        }else{
            $wrong++;
        }

    }else{
        $wrong++;
    }

    $i++;
}

$percentage = ($total>0)?round(($correct/$total)*100):0;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Quiz Result</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

body{
    background:#f4f7fc;
    font-family:Arial;
}

.result-card{
    max-width:900px;
    margin:50px auto;
    background:#fff;
    border-radius:20px;
    padding:40px;
    box-shadow:0 10px 30px rgba(0,0,0,.1);
}

h1{
    font-weight:bold;
    color:#0d6efd;
}

.box{
    border-radius:15px;
    color:#fff;
    padding:20px;
    text-align:center;
}

.total{background:#0d6efd;}
.correct{background:#198754;}
.wrong{background:#dc3545;}
.percent{background:#fd7e14;}

canvas{
    max-width:350px;
    margin:auto;
}

</style>

</head>
<body>

<div class="container">

<div class="result-card">

<h1 class="text-center mb-2">🏆 Quiz Result</h1>

<h5 class="text-center text-secondary mb-5">
Category : <?php echo $category; ?>
</h5>

<div class="row text-center mb-5">

<div class="col-md-3">
<div class="box total">
<h3><?php echo $total; ?></h3>
<p>Total Questions</p>
</div>
</div>

<div class="col-md-3">
<div class="box correct">
<h3><?php echo $correct; ?></h3>
<p>Correct</p>
</div>
</div>

<div class="col-md-3">
<div class="box wrong">
<h3><?php echo $wrong; ?></h3>
<p>Wrong</p>
</div>
</div>

<div class="col-md-3">
<div class="box percent">
<h3><?php echo $percentage; ?>%</h3>
<p>Score</p>
</div>
</div>

</div>

<div class="row">

<div class="col-md-6 text-center">

<canvas id="resultChart"></canvas>

</div>

<div class="col-md-6 d-flex align-items-center">

<div>

<h3>Your Performance</h3>

<?php
if($percentage>=80){
    echo "<div class='alert alert-success'>🎉 Excellent Performance!</div>";
}elseif($percentage>=50){
    echo "<div class='alert alert-warning'>👍 Good Job!</div>";
}else{
    echo "<div class='alert alert-danger'>😔 Better Luck Next Time!</div>";
}
?>

<a href="index.php" class="btn btn-primary mt-3">
Home
</a>

<a href="categories.php" class="btn btn-success mt-3">
Play Again
</a>

</div>

</div>

</div>

</div>

</div>

<script>

new Chart(document.getElementById('resultChart'),{

type:'doughnut',

data:{
labels:['Correct','Wrong'],
datasets:[{
data:[
<?php echo $correct; ?>,
<?php echo $wrong; ?>
],
backgroundColor:[
'#198754',
'#dc3545'
]
}]
},

options:{
responsive:true,
plugins:{
legend:{
position:'bottom'
}
}
}

});

</script>

</body>
</html>