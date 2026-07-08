<?php
require("../php/db.php");

$quiz = $db->query("SELECT * FROM category");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Multiple Questions</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

<div class="container mt-5">

<h2>Add Multiple Questions</h2>

<form id="question_form">

<label>Select Quiz</label>

<select name="quiz_id" class="form-control mb-3" required>

<option value="">Select Quiz</option>

<?php while($row = $quiz->fetch_assoc()){ ?>

<option value="<?php echo $row['category_name']; ?>">
<?php echo $row['category_name']; ?>
</option>

<?php } ?>

</select>

<div id="question_box">

<div class="border p-3 mb-3">

<h5>Question 1</h5>

<input type="text" name="question[]" class="form-control mb-2" placeholder="Question">

<input type="text" name="option1[]" class="form-control mb-2" placeholder="Option 1">

<input type="text" name="option2[]" class="form-control mb-2" placeholder="Option 2">

<input type="text" name="option3[]" class="form-control mb-2" placeholder="Option 3">

<input type="text" name="option4[]" class="form-control mb-2" placeholder="Option 4">

<select name="correct_answer[]" class="form-control">
    <option value="option1">Option 1</option>
    <option value="option2">Option 2</option>
    <option value="option3">Option 3</option>
    <option value="option4">Option 4</option>
</select>

</div>

</div>

<button type="button" id="add_more" class="btn btn-success">
+ Add More Question
</button>

<button type="submit" class="btn btn-primary">
Save Questions
</button>

</form>

</div>

<script>

let count = 2;

$("#add_more").click(function(){

$("#question_box").append(`

<div class="border p-3 mb-3">

<h5>Question ${count}</h5>

<input type="text" name="question[]" class="form-control mb-2" placeholder="Question">

<input type="text" name="option1[]" class="form-control mb-2" placeholder="Option 1">

<input type="text" name="option2[]" class="form-control mb-2" placeholder="Option 2">

<input type="text" name="option3[]" class="form-control mb-2" placeholder="Option 3">

<input type="text" name="option4[]" class="form-control mb-2" placeholder="Option 4">

<select name="correct_answer[]" class="form-control">
<option value="option1">Option 1</option>
<option value="option2">Option 2</option>
<option value="option3">Option 3</option>
<option value="option4">Option 4</option>
</select>

</div>

`);

count++;

});

$("#question_form").submit(function(e){

          e.preventDefault();

         $.ajax({

			type:"POST",
			url:"admin/php/add_question.php",
			data:new FormData(this),
			processData:false,
			contentType:false,

			success:function(response){

			alert(response);



			}

			});

});

</script>

</body>
</html>