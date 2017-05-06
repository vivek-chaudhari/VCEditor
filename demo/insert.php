<?php

$con = mysqli_connect('localhost','root','','demo_editor_db') or die('Cannot established connection');

$insert = "insert into demo_content (description) values('".$_POST['myDoc']."')";

$result = mysqli_query($con,$insert);

echo $_POST['myDoc'];

?>