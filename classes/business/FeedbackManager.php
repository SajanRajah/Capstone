<?php
namespace classes\business;

use classes\entity\Feedback;
use classes\data\FeedbackManagerDB;

class FeedbackManager
{
    public static function getAllFeedback(){
        return FeedbackManagerDB::getAllFeedback();
    }
    
	public function getFeedbackByEmail($email){
        return FeedbackManagerDB::getFeedbackByEmail($email);
    }
    
	public function insertFeedback($feedback){
        FeedbackManagerDB::insertFeedback($feedback);
    }
	
	public function deleteFeedback($id){
        return FeedbackManagerDB::deleteFeedback($id);
    }	
    public static function searchByEmail($email){
        return FeedbackManagerDB::searchByEmail($email);
    }	

	public static function searchByAll($email, $firstname, $lastname){
        return FeedbackManagerDB::searchByEmail($email);
    }

}

?>