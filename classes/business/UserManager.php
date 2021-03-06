<?php
namespace classes\business;

use classes\data\UserManagerDB;
use classes\entity\User;

class UserManager
{
    /**
     * 
     * @return \classes\entity\User[]
     */
    public static function getAllUsers(){
        return UserManagerDB::getAllUsers();
    }
	
	 public static function getAllSubscribers(){
        return UserManagerDB::getAllSubscribers();
    }
	
	public static function updateSubscription($email){
        return UserManagerDB::updateSubscription($email);
    }	
	
	//This is added for search by Criteria function - 20180917
	/**
	 * 
	 * @param unknown $firstName
	 * @param unknown $lastName
	 * @param unknown $email
	 * @return \classes\entity\User[]
	 */
	public static function searchByCriteria($firstName, $lastName, $email){
        return UserManagerDB::searchByCriteria($firstName, $lastName, $email);
    }
	
	/*public static function searchCondition($prevCond, $fieldName, $fieldValue, $operator){
        return UserManagerDB::searchCondition($prevCond, $fieldName, $fieldValue, $operator);
    }*/
	
	//This is added for search by lastname function - 20180917
	/*public static function searchByLastname($lastName){
        return UserManagerDB::searchByLastname($lastName);
    }*/
	//This is added for search by email function - 20180917
	/**
	 * 
	 * @param unknown $email
	 * @return \classes\entity\User[]
	 */
	public static function searchByEmail($email){
        return UserManagerDB::searchByEmail($email);
    }
	
	
	
	/**
	 * 
	 * @param unknown $email
	 * @param unknown $password
	 * @return NULL|\classes\entity\User
	 */
    public static function getUserByEmailPassword($email, $password){
        return UserManagerDB::getUserByEmailPassword($email, $password);
    }
    /**
     * 
     * @param unknown $email
     * @return NULL|\classes\entity\User
     */
    public static function getUserByEmail($email){
        return UserManagerDB::getUserByEmail($email);
    }
    /**
     * 
     * @param unknown $id
     * @return NULL|\classes\entity\User
     */
    public static function getUserById($id){
        return UserManagerDB::getUserById($id);
    }	
    /**
     * 
     * @param unknown $user
     */
    public static function saveUser($user){
        UserManagerDB::saveUser($user);
    }
	/**
	 * 
	 * @param unknown $email
	 * @param unknown $password
	 */
	public static function updatePassword($email,$password){
        UserManagerDB::updatePassword($email,$password);
    }
	/**
	 * 
	 * @param unknown $id
	 */
	public static function deleteAccount($id){
        UserManagerDB::deleteAccount($id);
    }
    /**
     * 
     */
	public static function randomPassword($length,$count, $characters) 
	{
		// $length - the length of the generated password
		// $count - number of passwords to be generated
		// $characters - types of characters to be used in the password
		 
		// define variables used within the function    
		$symbols = array();
		$passwords = array();
		$used_symbols = '';
		$pass = '';
 
		// an array of different character types    
		$symbols["lower_case"] = 'abcdefghijklmnopqrstuvwxyz';
		$symbols["upper_case"] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$symbols["numbers"] = '1234567890';
		$symbols["special_symbols"] = '!?~@#-_+<>[]{}';
 
		$characters = explode(",",$characters); // get characters types to be used for the passsword
		foreach ($characters as $key=>$value) {
			$used_symbols .= $symbols[$value]; // build a string with all characters
		}
		$symbols_length = strlen($used_symbols) - 1; //strlen starts from 0 so to get number of characters deduct 1
		 
		for ($p = 0; $p < $count; $p++) {
			$pass = '';
			for ($i = 0; $i < $length; $i++) {
				$n = rand(0, $symbols_length); // get a random character from the string with all characters
				$pass .= $used_symbols[$n]; // add the character to the password string
			}
			$passwords[] = $pass;
		}
		return $passwords; // return the generated password
	} //end of generate random password function
}

?>