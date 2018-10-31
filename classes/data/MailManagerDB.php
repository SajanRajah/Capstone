<?php
namespace classes\data;

use classes\entity\Mailing;
use classes\util\DBUtil;

class MailManagerDB
{
   
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
        $result = $conn->query(,,,$sql);
        if ($result->num_rows > 0) {
            //while ($row = $result->fetch_assoc()) {
                //$user = self::fillUser($row); //amend to array
                //$users[] = $user;
            }
        }
        $conn->close();
        return $users;
    }

 

  

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