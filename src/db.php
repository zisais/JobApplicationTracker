<?php

$dbHost = 'localhost';
$dbUser = 'root'; // todo: replace with mysql server username
$dbPw = ''; // todo: replace with mysql server password

global $dbName;
global $mysqli;
global $dbTable;

$dbName= 'jobapptracker';
$dbTable = 'applications';
$mysqli = new mysqli($dbHost, $dbUser, $dbPw);

function checkForDb() {
    global $mysqli;
    global $dbName;
    $query = "
        SELECT SCHEMA_NAME
        FROM INFORMATION_SCHEMA.SCHEMATA
        WHERE SCHEMA_NAME = '{$dbName}';
    ";

    if (sizeof($mysqli->query($query)->fetch_all()) === 0) {
        createDb();
    }
    else $mysqli->select_db($dbName);
}

function getAllApps() {
    global $mysqli;
    global $dbTable;
    $query = "SELECT * FROM {$dbTable} ORDER BY appDate;";

    $result = $mysqli->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function createDb() {
    global $mysqli;
    global $dbName;
    global $dbTable;

    $dbQuery = "CREATE DATABASE IF NOT EXISTS {$dbName};";
    $mysqli->query($dbQuery);
    $mysqli->select_db($dbName);

    $tableQuery = "
        CREATE TABLE {$dbTable} (
            id SMALLINT AUTO_INCREMENT PRIMARY KEY,
            company VARCHAR(100) NOT NULL,
            title VARCHAR(100) NOT NULL,
            appDate DATE NOT NULL,
            status ENUM('submitted','received','rejected','interview','offer','accepted') NOT NULL
        );
    ";
    $mysqli->query($tableQuery);
}

function addApp($company,$title,$date,$status) {
    global $dbName;
    global $dbTable;
    global $mysqli;
    $mysqli->select_db($dbName);

    $company = $mysqli->real_escape_string($company);
    $title = $mysqli->real_escape_string($title);

    $query = "
        INSERT INTO {$dbTable} (company,title,appDate,status)
        VALUES ('{$company}','{$title}','{$date}','{$status}');
    ";

    $mysqli->query($query);
}

function deleteApp($id) {
    global $dbName;
    global $dbTable;
    global $mysqli;
    $mysqli->select_db($dbName);

    $query = "DELETE FROM {$dbTable} WHERE id={$id};";
    $mysqli->query($query);
}

function editApp($id, $company, $title, $date, $status) {
    global $dbName;
    global $dbTable;
    global $mysqli;
    $mysqli->select_db($dbName);

    $company = $mysqli->real_escape_string($company);
    $title = $mysqli->real_escape_string($title);

    $query = "
        UPDATE {$dbTable}
        SET company = '{$company}', title = '{$title}', appDate = '{$date}', status = '{$status}'
        WHERE id = {$id};
    ";
    $mysqli->query($query);
}

function getApp($id) {
    global $dbName;
    global $dbTable;
    global $mysqli;
    $mysqli->select_db($dbName);

    $query = "SELECT * FROM {$dbTable} WHERE id={$id};";
    $result = $mysqli->query($query);
    return $result->fetch_all(MYSQLI_ASSOC)[0];
}