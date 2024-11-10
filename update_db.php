<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("connection.php");

$errors = array();

if (isset($_POST['update_reseve'])) {
    // Retrieve form data
    $hos = $_POST['hospital'];
    $dep = $_POST['department'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $symptom = $_POST['symptom'];
    $id = $_POST['id']; // Retrieve reservation ID

    // Validate inputs
    // (Your validation code here)

    // If no errors, proceed with reservation
    if (count($errors) == 0) {
        $sql_update = "UPDATE reservation SET hospital='$hos', department='$dep', date='$date', time='$time', symptom='$symptom' WHERE id= '$id'";
        $result_update = mysqli_query($con, $sql_update);

        if ($result_update) {
            // Update successful code
            $_SESSION['success'] = "Update successful";
            header('location: Profile.php');
            exit(); // Stop further execution
        } else {
            // Update failed code
            array_push($errors, "Update failed");
            $_SESSION['error'] = "Update failed";
        }
    } else {
        // Errors occurred, redirect back to reservation page
        $_SESSION['errors'] = $errors;
        header('location: update.php');
        exit(); // Stop further execution
    }
}

?>