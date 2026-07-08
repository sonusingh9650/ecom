<?php
require("db.php");

$quiz_id = $_POST['quiz_id'];

$check_table = $db->query("SHOW TABLES LIKE 'questions'");

if($check_table->num_rows == 0)
{
    $create = $db->query("CREATE TABLE questions(
        id INT AUTO_INCREMENT PRIMARY KEY,
        quiz_id VARCHAR(255) NOT NULL,
        question TEXT NOT NULL,
        option1 VARCHAR(255) NOT NULL,
        option2 VARCHAR(255) NOT NULL,
        option3 VARCHAR(255) NOT NULL,
        option4 VARCHAR(255) NOT NULL,
        correct_answer VARCHAR(255) NOT NULL
    )");

    if(!$create){
        die("Table Error : ".$db->error);
    }
}

for($i=0; $i<count($_POST['question']); $i++)
{
    $question = $_POST['question'][$i];
    $option1 = $_POST['option1'][$i];
    $option2 = $_POST['option2'][$i];
    $option3 = $_POST['option3'][$i];
    $option4 = $_POST['option4'][$i];
    $correct_answer = $_POST['correct_answer'][$i];

    $db->query("INSERT INTO questions
    (quiz_id,question,option1,option2,option3,option4,correct_answer)
    VALUES
    ('$quiz_id','$question','$option1','$option2','$option3','$option4','$correct_answer')");
}

echo "success";
?>