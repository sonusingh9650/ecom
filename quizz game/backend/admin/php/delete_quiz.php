<?php
require("../php/db.php");

$id = $_POST['id'];

$delete = $db->query("DELETE FROM quiz WHERE id='$id'");

if($delete){
    echo "success";
}else{
    echo "failed";
}
?>