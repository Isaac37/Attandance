<?php
class crud
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insert($fname, $lname, $dob, $email, $contact, $specialty)
    {
        try {
            //define sql statement to be executed
            $sql = "INSERT INTO attandee(firstname, lastname, dob, emailaddress, phone, specialty_id) VALUES (:fname, :lname, :dob, :email,
             :contact, :specialty)";
            //prepare the sql statement for execution
            $stmnt = $this->db->prepare($sql);
            //bind all place holders to the acual values
            $stmnt->bindparam(':fname', $fname);
            $stmnt->bindparam(':lname', $lname);
            $stmnt->bindparam(':dob', $dob);
            $stmnt->bindparam(':email', $email);
            $stmnt->bindparam(':contact', $contact);
            $stmnt->bindparam(':specialty', $specialty);

            $stmnt->execute();
            return true;


        } catch (PDOException $e) {
            //throw $th;
            echo $e->getMessage();
            return false;
        }

    }
    public function editAttandee($id, $fname, $lname, $dob, $email, $contact, $specialty)
    {
        try {
            $sql = "UPDATE `attandee` SET `firstname`=:fname,`lastname`=:lname,
    `dob`=:dob,`emailaddress`=:email,`phone`=:contact,
    `specialty_id`=:specialty WHERE attandee_id = :id";


            $stmnt = $this->db->prepare($sql);
            //bind all place holders to the acual values
            $stmnt->bindparam(':id', $id);
            $stmnt->bindparam(':fname', $fname);
            $stmnt->bindparam(':lname', $lname);
            $stmnt->bindparam(':dob', $dob);
            $stmnt->bindparam(':email', $email);
            $stmnt->bindparam(':contact', $contact);
            $stmnt->bindparam(':specialty', $specialty);

            $stmnt->execute();
            return true;

        } catch (PDOException $e) {
            //throw $th;
            echo $e->getMessage();
            return false;
        }

    }

    public function getAttandees()
    {
        try {
            $sql = "SELECT * FROM `attandee` a inner join specialties s on a.specialty_id = s.specialty_id";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            //throw $th;
            echo $e->getMessage();
            return false;
        }

    }


    public function getAttandeeDetails($id)
    {
        try {
            $sql = "SELECT * FROM `attandee` a inner join specialties 
            s on a.specialty_id = s.specialty_id WHERE attandee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            //throw $th;
            echo $e->getMessage();
            return false;
        }

    }

    public function getSpecialties()
    {

        try {
            $sql = "SELECT * FROM `specialties` ";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            //throw $th;
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteAttande($id)
    {

        try {
            $sql = "DELETE FROM `attandee` WHERE attandee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            //throw $th;
            echo $e->getMessage();
            return false;
        }
    }

}
?>