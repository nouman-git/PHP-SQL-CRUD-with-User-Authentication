<?php
// include 'DB_conn/database.php';
include '../DB_conn/database.php';

include 'session_validity.php'; // Include the session management file


$username = $_POST['username'];
$password = $_POST['password'];

// Database connection
// $conn = mysqli_connect('localhost', 'root', "", "crud_php_sql") or die("Connection with DB Failed !!");


$db = Database::getInstance();
$conn = $db->getConnection();

// Check user credentials
$login_query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$login_result = mysqli_query($conn, $login_query);

if (mysqli_num_rows($login_result) === 1) {
    // User is valid
    $row = mysqli_fetch_assoc($login_result);
    $user_id = $row['id'];

    // Generate a random string
    $random_string = bin2hex(random_bytes(16)); // 32-character random string

    // Store the random string in the database
    $update_session_query = "INSERT INTO sessions (user_id, token) VALUES ('$user_id', '$random_string')";
    $update_session_result = mysqli_query($conn, $update_session_query);

    // Get the generated session ID
    $get_session_id_query = "SELECT id FROM sessions WHERE token = '$random_string'";
    $get_session_id_query_result = mysqli_query($conn, $get_session_id_query);
    $token_id_arr = mysqli_fetch_assoc($get_session_id_query_result);
    $token_id = $token_id_arr['id'];

    createSession($user_id, $token_id);

    //handling rmember ME 

    if(!empty($_POST["remember"])) {
        setcookie ("username",$_POST["username"],time()+ 3600);
        setcookie ("password",$_POST["password"],time()+ 3600);
        // echo "Cookies Set Successfuly";
    } else {
        setcookie("username","");
        setcookie("password","");
        // echo "Cookies Not Set";
    }

    // Redirect to index.php with session data
    header("Location: http://localhost/00_practice/PHP_SQL/index.php");
    exit();
} else {
    echo "Invalid username or password. Please login with valid credentials.";
}

mysqli_close($conn);
?>

