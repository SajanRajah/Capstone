<?php
namespace classes\data;

use classes\entity\User;
use classes\util\DBUtil;

class UserManagerDB
{
    /**
     * 
     * @param unknown $row
     * @return \classes\entity\User
     */
	public static function fillUser($row)
    {
        $user = new User();
        $user->id = $row["id"];
        $user->firstName = $row["firstName"];
        $user->lastName = $row["lastName"];
        $user->email = $row["email"];
        $user->password = $row["password"];
        $user->role = $row["role"]; // added for role - 20180905
        $user->account_creation_time = $row["account_creation_time"];
		$user->subscribe = $row["subscribe"];  //included for subscribe column
        return $user;
    }
    /**
     * 
     * @param unknown $email
     * @param unknown $password
     * @return NULL|\classes\entity\User
     */
    public static function getUserByEmailPassword($email, $password)
    {
        $user = NULL;
        $conn = DBUtil::getConnection();
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);
        $sql = "select * from tb_user where email='$email' and password='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }
    /**
     * 
     * @param unknown $email
     * @return NULL|\classes\entity\User
     */
    public static function getUserByEmail($email)
    {
        $user = NULL;
        $conn = DBUtil::getConnection();
        $email = mysqli_real_escape_string($conn, $email);
        $sql = "select * from tb_user where Email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }
    /**
     * 
     * @param unknown $id
     * @return NULL|\classes\entity\User
     */
    public static function getUserById($id)
    {
        $user = NULL;
        $conn = DBUtil::getConnection();
        $id = mysqli_real_escape_string($conn, $id);
        $sql = "select * from tb_user where id='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }
    /**
     * 
     * @param unknown $user
     */
    public static function saveUser($user)
    {
        $conn = DBUtil::getConnection();
        $sql = "call procSaveUser(?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssssss", $user->id, $user->firstName, $user->lastName, $user->email, $user->password, $user->account_creation_time, $user->role, $user->subscribe);
        var_dump($user);
		$stmt->execute();
        if ($stmt->errno != 0) {
            printf("Error: %s.\n", $stmt->error);
        }
        $stmt->close();
        $conn->close();
    }
    /**
     * 
     * @param unknown $email
     * @param unknown $password
     */
    public static function updatePassword($email, $password)
    {
        $conn = DBUtil::getConnection();
        $sql = "UPDATE tb_user SET password='$password' WHERE email='$email';";
        $stmt = $conn->prepare($sql);
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
    /**
     * 
     * @param unknown $id
     */
    public static function deleteAccount($id)
    {
        $conn = DBUtil::getConnection();
        $sql = "DELETE from tb_user WHERE id='$id';";
        $stmt = $conn->prepare($sql);
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert(Record deleted successfully)</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
    /**
     * 
     * @return \classes\entity\User[]
     */
    public static function getAllUsers()
    {
        $users[] = array();
        $conn = DBUtil::getConnection();
        $sql = "select * from tb_user";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row);
                $users[] = $user;
            }
        }
        $conn->close();
        return $users;
    }
	
	 public static function getAllSubscribers()
    {
        $users[] = array();
        $conn = DBUtil::getConnection();
        $sql = "SELECT  `email` FROM  `tb_user` WHERE  `subscribe` =1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row); //amend to array
                $users[] = $user;
            }
        }
        $conn->close();
        return $users;
    }
	
	
	public static function updateSubscription($email){
        $conn = DBUtil::getConnection();
        
        $sql  = "UPDATE tb_user SET subscribe='0' WHERE email='$email';";
        if ($conn->query($sql)) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
        
    }
	
	

    // This whole function was added for search function - 20180917
       /**
        * 
        * @param unknown $firstName
        * @param unknown $lastName
        * @param unknown $email
        * @return \classes\entity\User[]
        */ 
    public static function searchByCriteria($firstName, $lastName, $email)
    {
        $users[] = array();
        $conn = DBUtil::getConnection();
        $sql = "select * from tb_user ";
        $condition = "";

        $condition = self::searchCondition($condition, "firstName", $firstName, "OR");
        $condition = self::searchCondition($condition, "lastName", $lastName, "OR");
        $condition = self::searchCondition($condition, "email", $email, "OR");

        if (! ($condition == "")) {
            $sql = $sql . " WHERE " . $condition;
        }

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row);
                $users[] = $user;
            }
        }
        $conn->close();
        return $users;
    }

    // public function searchSQL($prevCond, $fieldName, $fieldValue, $operator){
    /**
     * 
     * @param unknown $firstName
     * @param unknown $lastName
     * @param unknown $email
     * @return string
     */
    public static function searchSQL($firstName, $lastName, $email)
    {
        $sql = " SELECT * FROM tb_user";
        $condition = "";

        $condition = self::searchCondition($condition, "firstName", $firstName, "OR");
        var_dump($condition);
        $condition = self::searchCondition($condition, "lastName", $lastName, "OR");
        var_dump($condition);
        $condition = self::searchCondition($condition, "email", $email, "OR");
        var_dump($condition);

        if (! ($condition == "")) {
            $sql = $sql . " WHERE " . $condition;
        }
        return $sql;
    }
    /**
     * 
     * @param unknown $prevCond
     * @param unknown $fieldName
     * @param unknown $fieldValue
     * @param unknown $operator
     * @return string|unknown
     */
    private static function searchCondition($prevCond, $fieldName, $fieldValue, $operator)
    {
        $condition = "";
        IF ($fieldValue == "") {
            $condition = $prevCond;
        } else {
            $condition = $fieldName . " like '%$fieldValue%'";
            IF ($prevCond !== "") {
                $condition = $prevCond . " " . $operator . " " . $condition;
            }
        }

        return $condition;
    }

    // This whole function was added for search by lastname function - 20180917
    /*
     * public static function searchByLastname($lastName){
     * $users[]=array();
     * $conn=DBUtil::getConnection();
     * $sql="select * from tb_user WHERE lastName like '%$lastName%'";
     * $result = $conn->query($sql);
     * if ($result->num_rows > 0) {
     * while($row = $result->fetch_assoc()){
     * $user=self::fillUser($row);
     * $users[]=$user;
     * }
     * }
     * $conn->close();
     * return $users;
     * }
     */

    // This whole function was added for search by email function - 20180917
       /**
        * 
        * @param unknown $email
        * @return \classes\entity\User[]
        */ 
    public static function searchByEmail($email)
    {
        $users[] = array();
        $conn = DBUtil::getConnection();
        $sql = "select * from `tb_user` WHERE email like '%$email%'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row);
                $users[] = $user;
            }
        }
        $conn->close();
        return $users;
    }
}

?>