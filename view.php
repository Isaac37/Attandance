<?php
$title = 'View Record';
require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';


if (!isset($_GET['id'])) {
    include 'includes/errormessage.php';
} else {

    $id = $_GET['id'];
    $results = $crud->getAttandeeDetails($id);

    ?>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $results['firstname'] . ' ' . $results['lastname']; ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $results['name'] ?>
            </h6>
            <p class="card-text"> Email:
                <?php echo $results['emailaddress']; ?>
            </p>
            <p class="card-text">Phone Number:
                <?php echo $results['phone']; ?>
            </p>
            <p class="card-text">DOB:
                <?php echo $results['dob']; ?>
            </p>

        </div>
    </div>
    <a href="viewrecords.php" class="btn btn-info">Back to List</a>
    <a href="edit.php?id=<?php echo $results['attandee_id'] ?>" class="btn btn-warning">Edit</a>
    <a onclick="return confirm('Are you sure you want to delete this record?')"
        href="delete.php?id=<?php echo $results['attandee_id'] ?>" class="btn btn-danger">Delete</a>

<?php } ?>

<br />
<br />
<br />
<br />
<?php require_once 'includes/footer.php' ?>