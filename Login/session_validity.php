<?php

// Start the session
session_start();

function createSession($user_id, $token_id) {
    $_SESSION['user_id'] = $user_id;
    $_SESSION['token_id'] = $token_id;
}


//NOTE
// we generally use golobally require variables in session
// suppose we have thousands of student data so we dont want to create and delete session thousand times

// function createSessionForStudentID($sid) {
//     $_SESSION['sid'] = $sid;
// }

function checkSession() {
    if (isset($_SESSION['user_id']) && isset($_SESSION['token_id'])) {
        // Session exists, user is logged in
        return true;
    } else {
        // Session does not exist, user is not logged in
        return false;
    }
}

function clearSession() {
    unset($_SESSION['user_id']);
    unset($_SESSION['token_id']);
    // unset($_SESSION['sid']);

}

?>
