<?php
require_once 'includes/auth_check.php';
require_once 'db/conn.php';
//get id value
if (!$_GET['id']) {
   include 'includes/errormessage.php';
   header("Location:viewrecords.php");
} else {
   $id = $_GET['id'];
}

//call delete function
$result = $crud->deleteAttande($id);
//redirect to list
if ($result) {
   header("Location: viewrecords.php");
} else {
   include 'includes/errormessage.php';
}

?>