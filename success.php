<?php
$title = 'Success';
require_once 'includes/header.php'; 
require_once 'db/conn.php'; 

if (isset($_POST['submit'])) {
    //ectract values from the POST Array
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $specialty = $_POST['specialty'];

    //Call function to insert and track if success or not

    $isSuccess = $crud->insert($fname, $lname, $dob, $email, $contact, $specialty);

    if ($isSuccess) {
        include 'includes/successmesage.php';
        # code...
    } else {
        # code...
        include 'includes/errormessage.php';
    }
    
}
?>



<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?php echo $_POST['firstname'] . ' ' . $_POST['lastname'];  ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['specialty'] ?></h6>
        <p class="card-text"> Email: <?php  echo $_POST['email'];  ?> </p>
        <p class="card-text">Phone Number: <?php  echo $_POST['phone'];  ?> </p>
        <p class="card-text">DOB: <?php  echo $_POST['dob'];  ?> </p>
    
    </div>
</div>

<br />
<br />
<br />
<br />
<?php require_once 'includes/footer.php'  ?>