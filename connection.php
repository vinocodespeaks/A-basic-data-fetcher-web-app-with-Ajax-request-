<?php
$con=mysql_connect("localhost","root","");
if (!$con)
{
    die('Could not connect: ' . mysqli_error());
}
mysql_select_db("nlp",$con);
// select the dataabase
?>
