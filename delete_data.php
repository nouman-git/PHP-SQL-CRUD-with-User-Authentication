<?php

include 'DB_conn/database.php';
include 'Login/check_and_set_session.php';



$id_from_URL = $_GET['id'];

// $conn = mysqli_connect('localhost', 'root', "", "crud_php_sql") or die("Connection with DB Failed !!");
$db = Database::getInstance();
$conn = $db->getConnection();


// Retrieve the record before deleting it
$select_query = "SELECT S.*, C.cname FROM student AS S
                 INNER JOIN studentclass AS C ON S.sclass = C.cid
                 WHERE S.sid = $id_from_URL";
$select_result = mysqli_query($conn, $select_query);
$deleted_record = mysqli_fetch_assoc($select_result);

// Store the class name
$className = $deleted_record['cname'];

// Delete the record from the database
$query = "DELETE FROM student WHERE sid = $id_from_URL";
$result = mysqli_query($conn, $query) or die("Query Failed");

if ($result) {
    // Store the deleted record with class name in a file
    $backupFilePath = 'deleted_records.json';
    $deleted_record['sclass'] = $className; // Replace numeric sclass with class name
    $deletedRecords = json_decode(file_get_contents($backupFilePath), true);
    $deletedRecords[] = $deleted_record;
    file_put_contents($backupFilePath, json_encode($deletedRecords, JSON_PRETTY_PRINT));
}

mysqli_close($conn);

header("Location: http://localhost/00_practice/PHP_SQL/index.php");
exit();
?>