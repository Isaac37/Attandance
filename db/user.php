<?php
class user
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insertUser($username, $password)
    {
        try {
            $result = $this->getUserbyUserName($username);
            if ($result['num'] > 0) {
                return true;
            } else {
                $new_password = md5($password.$username);
                //define sql statement to be executed
                $sql = "INSERT INTO users(username, password) VALUES (:username, :password)";
                //prepare the sql statement for execution
                $stmnt = $this->db->prepare($sql);
                //bind all place holders to the acual values
                $stmnt->bindparam(':username', $username);
                $stmnt->bindparam(':password', $new_password);
                $stmnt->execute();
                return true;
            }




        } catch (PDOException $e) {
            //throw $th;
            echo $e->getMessage();
            return false;
        }
    }
    public function getUser($username, $password)
    {
        try {
            $sql = "SELECT * FROM `users` a WHERE username = :username AND password = :password";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
            $stmt->bindparam(':password', $password);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            //throw $th;
            echo $e->getMessage();
            return false;
        }
    }

    public function getUserbyUserName($username)
    {
        try {
            $sql = "SELECT COUNT(*) AS num FROM users Where username = :username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            //throw $th;
            echo $e->getMessage();
            return false;
        }

    }
}


?>