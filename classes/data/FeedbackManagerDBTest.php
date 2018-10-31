<?php
require_once 'classes/data/FeedbackManagerDB.php';

/**
 * FeedbackManagerDB test case.
 */
class FeedbackManagerDBTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     * @var FeedbackManagerDB
     */
    private $feedbackManagerDB;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        // TODO Auto-generated FeedbackManagerDBTest::setUp()

        $this->feedbackManagerDB = new FeedbackManagerDB(/* parameters */);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        // TODO Auto-generated FeedbackManagerDBTest::tearDown()
        $this->feedbackManagerDB = null;

        parent::tearDown();
    }

    /**
     * Constructs the test case.
     */
    public function __construct()
    {
        // TODO Auto-generated constructor
    }

    /**
     * Tests FeedbackManagerDB::getAllFeedback()
     */
    public function testGetAllFeedback()
    {
        // TODO Auto-generated FeedbackManagerDBTest::testGetAllFeedback()
        $this->markTestIncomplete("getAllFeedback test not implemented");

        FeedbackManagerDB::getAllFeedback(/* parameters */);
    }

    /**
     * Tests FeedbackManagerDB::getFeedbackByEmail()
     */
    public function testGetFeedbackByEmail()
    {
        // TODO Auto-generated FeedbackManagerDBTest::testGetFeedbackByEmail()
        $this->markTestIncomplete("getFeedbackByEmail test not implemented");

        FeedbackManagerDB::getFeedbackByEmail(/* parameters */);
    }

    /**
     * Tests FeedbackManagerDB::searchByEmail()
     */
    public function testSearchByEmail()
    {
        // TODO Auto-generated FeedbackManagerDBTest::testSearchByEmail()
        $this->markTestIncomplete("searchByEmail test not implemented");

        FeedbackManagerDB::searchByEmail(/* parameters */);
    }

    /**
     * Tests FeedbackManagerDB::searchByAll()
     */
    public function testSearchByAll()
    {
        // TODO Auto-generated FeedbackManagerDBTest::testSearchByAll()
        $this->markTestIncomplete("searchByAll test not implemented");

        FeedbackManagerDB::searchByAll(/* parameters */);
    }

    /**
     * Tests FeedbackManagerDB::insertFeedback()
     */
    public function testInsertFeedback()
    {
        // TODO Auto-generated FeedbackManagerDBTest::testInsertFeedback()
        $this->markTestIncomplete("insertFeedback test not implemented");

        FeedbackManagerDB::insertFeedback(/* parameters */);
    }

    /**
     * Tests FeedbackManagerDB::deleteFeedback()
     */
    public function testDeleteFeedback()
    {
        // TODO Auto-generated FeedbackManagerDBTest::testDeleteFeedback()
        $this->markTestIncomplete("deleteFeedback test not implemented");

        FeedbackManagerDB::deleteFeedback(/* parameters */);
    }

    /**
     * Tests FeedbackManagerDB::fillFeedback()
     */
    public function testFillFeedback()
    {
        // TODO Auto-generated FeedbackManagerDBTest::testFillFeedback()
        $this->markTestIncomplete("fillFeedback test not implemented");

        FeedbackManagerDB::fillFeedback(/* parameters */);
    }

    /**
     * Tests FeedbackManagerDB::updatePassword()
     */
    public function testUpdatePassword()
    {
        // TODO Auto-generated FeedbackManagerDBTest::testUpdatePassword()
        $this->markTestIncomplete("updatePassword test not implemented");

        FeedbackManagerDB::updatePassword(/* parameters */);
    }
}

