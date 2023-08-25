<?php
include 'DB_conn/database.php';

$stu_name = $_POST['sname'];
$stu_adrress = $_POST['saddress'];
$stu_class = $_POST['sclass'];
$stu_phone = $_POST['sphone'];

$id = $_POST['id'];

// $conn = mysqli_connect('localhost', 'root', '', 'crud_php_sql') or die('Connection with DB Failed !!');
$db = Database::getInstance();
$conn = $db->getConnection();
$query = "UPDATE student SET sname = '{$stu_name}', saddress = '{$stu_adrress}', sclass ='{$stu_class}', sphone ='{$stu_phone}'
            WHERE sid = {$id}";

$result = mysqli_query($conn, $query) or die('Query Failed');

header('Location: http://localhost/00_practice/PHP_SQL/index.php');
mysqli_close($conn);
exit();
?>
