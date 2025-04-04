<?php
$mysqli = new mysqli('localhost', 'root', '', 'jobapptracker');
$val = $mysqli->query("delete from applications where id='l';");
echo $val;