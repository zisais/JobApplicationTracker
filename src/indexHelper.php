<?php
include 'db.php';

checkForDb();
$apps = getAllApps();

echo json_encode($apps);