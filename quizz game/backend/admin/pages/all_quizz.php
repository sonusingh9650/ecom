<?php
require("../php/db.php");

$quiz = $db->query("SELECT * FROM category");
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Quiz</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

<h2>All Quiz</h2>

<table class="table table-bordered table-striped">

<thead class="table-dark">
<tr>
    <th>ID</th>
    <th>Category</th>
    <th>Total Questions</th>
    <th>Action</th>
</tr>
</thead>

<tbody>

<?php
while($row = $quiz->fetch_assoc())
{
    $id = $row['category_name'];

    $count = $db->query("SELECT COUNT(*) AS total FROM questions WHERE quiz_id='$id'");
    $total = $count->fetch_assoc();
?>

<tr>

<td><?php echo $row['id']; ?></td>


<td><?php echo $row['category_name']; ?></td>

<td><?php echo $total['total']; ?></td>

<td>
    <a href="../frontend/start_quizz.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">
        Start Quiz
    </a>
</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</body>
</html>