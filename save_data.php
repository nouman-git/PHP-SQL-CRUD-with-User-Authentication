<?php

include 'DB_conn/database.php';


$stu_name = $_POST['sname'];
$stu_adrress = $_POST['saddress'];
$stu_class = $_POST['sclass'];
$stu_phone = $_POST['sphone'];


// $conn = mysqli_connect('localhost', 'root', "", "crud_php_sql") or die("Connection with DB Failed !!");

$db = Database::getInstance();
$conn = $db->getConnection();

$query = "INSERT INTO student(sname,saddress,sclass,sphone) VALUE ('{$stu_name}', '{$stu_adrress}','{$stu_class}','{$stu_phone}'); 
-- FROM studentclass as Ctable";


$result = mysqli_query($conn, $query) or die("Query Failed");
header("Location: http://localhost/00_practice/PHP_SQL/index.php" );
mysqli_close($conn);


?>