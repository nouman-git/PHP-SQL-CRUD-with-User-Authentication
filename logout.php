<?php

// include 'Login/session_validity.php';



include 'DB_conn/database.php';

include 'Login/check_and_set_session.php';


// if (isset($_GET['token_id'])) {
// $token_id = $_GET['token_id'];

// Database connection
// $conn = mysqli_connect('localhost', 'root', "", "crud_php_sql") or die("Connection with DB Failed !!");
$db = Database::getInstance();
$conn = $db->getConnection();

// Delete session data for the user by deleting the row
$delete_session_query = "DELETE FROM sessions WHERE id = $token_id";
$stmt = mysqli_prepare($conn, $delete_session_query);

if (mysqli_stmt_execute($stmt)) {
    // Successfully deleted session, you can now perform other logout-related actions if needed
    // For example, you can redirect the user to a login page
    clearSession();
    header("Location: http://localhost/00_practice/PHP_SQL/Login/main_login.php");

    exit();
} else {
    echo "Error deleting session. Please try again later.";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
// } else {
//     echo "Token ID not provided.";
// }
?>