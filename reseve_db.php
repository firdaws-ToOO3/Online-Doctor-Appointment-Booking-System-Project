<?php
session_start();
include("connection.php");
include("errors.php"); // Ensure errors.php is included for error handling


$errors = array();
if(isset($_POST['submit_reseve'])){
    // Sanitize inputs
    $hos = mysqli_real_escape_string($con, $_POST['hospital']);
    $dep = mysqli_real_escape_string($con, $_POST['department']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $time = mysqli_real_escape_string($con, $_POST['time']);
    $symptom = mysqli_real_escape_string($con, $_POST['symptom']);

    // Validate inputs
    if (empty($hos)) {
        array_push($errors, "Hospital is required");
    }
    if (empty($dep)) {
        array_push($errors, "Department is required");
    }
    if (empty($date)) {
        array_push($errors, "Date is required");
    }
    if (empty($time)) {
        array_push($errors, "Time is required");
    }
    if (empty($symptom)) {
        array_push($errors, "Symptom is required");
    }

    // If no errors, proceed with reservation
    if(count($errors) == 0){
        $card = $_SESSION['cardID']; // Fetch cardID from session

        $sql = "INSERT INTO reservation (hospital, department, date, time, symptom, CardID) 
                VALUES ('$hos', '$dep', '$date', '$time', '$symptom', '$card')";
        $save = mysqli_query($con, $sql);

        if ($save) {
            // Save data to session
            $_SESSION['hos'] = $hos;
            $_SESSION['dep'] = $dep;
            $_SESSION['date'] = $date;
            $_SESSION['time'] = $time;
            $_SESSION['symptom'] = $symptom;
            $_SESSION['success'] = "Reservation successful";
            header('location: Profile.php');
            exit(); // Stop further execution
        } else {
            array_push($errors, "Reservation failed");
            $_SESSION['error'] = "Reservation failed";
        }
    } else {
        // Errors occurred, redirect back to reservation page
        $_SESSION['errors'] = $errors;
        header('location: reseve.php');
        exit(); // Stop further execution
    }
}
?>
