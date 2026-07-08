<?php
 
    $db = new mysqli("localhost","root","","quizz");
   if($db->connect_error)
    {
    	echo "not";
    }
    
?>