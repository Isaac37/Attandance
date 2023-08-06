<?php 
require_once 'db/conn.php'; 
if (isset($_POST['submit'])) {
    //get values from the POST Array
    $id = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $specialty = $_POST['specialty'];

    //call crud function
    $result = $crud->editAttandee($id, $fname, $lname, $dob, $email, $contact, $specialty);
    //redirect to index.php
    if ($result){
    header("Location:viewrecords.php");
    }
    else {
        include 'includes/errormessage.php';
    }
}

else {
    include 'includes/errormessage.php';
}





?>