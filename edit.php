<?php
            $title = 'Edit Record';
            require_once 'includes/header.php'; 
            require_once 'db/conn.php'; 

            $results = $crud->getSpecialties();


            if (!isset($_GET['id'])) {
              include 'includes/errormessage.php';
              header("Location:viewrecords.php");
            } else {
                $id = $_GET['id'];
              $attendee = $crud->getAttandeeDetails($id);
            
        ?>



    <h1 class="text-center">Edit Record</h1>

    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $attendee['attandee_id'] ?>">
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstname" name="firstname">

        </div>
        <div class="form-group">
            <label for="lastname">Last Nmae</label>
            <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastname" name="lastname">

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="text" class="form-control"  value="<?php echo $attendee['dob'] ?>"  id="dob" name="dob">
            </div>

            <div class="form-group">
                <label for="specialty">Specialty</label>
                <select class="form-control"  id="specialty" name="specialty">
                   <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $r['specialty_id'] ?>" <?php if ($r['specialty_id'] ==
                            $attendee['specialty_id']) {
                                echo 'selected';
                            } ?>> 
                            <?php echo $r['name'] ?> </option>
                    <?php  } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control"  value="<?php echo $attendee['emailaddress'] ?>" id="email" name="email">
                <small id="emailHelp" class="form-text text-muted">
                    We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="phone">Contact Number</label>
                <input type="text" class="form-control"  value="<?php echo $attendee['phone'] ?>" id="phone" name="phone">
                <small id="phoneHelp" class="form-text text-muted">
                    We'll never share your number with anyone else.</small>
            </div>

            <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
    </form>

    <?php } ?>
    <br />
    <br />
    <br />
    <br />
    <?php require_once 'includes/footer.php'  ?>