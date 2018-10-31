<?php
require_once 'classes/business/FeedbackManager.php';

/**
 * FeedbackManager test case.
 */
class FeedbackManagerTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     * @var FeedbackManager
     */
    private $feedbackManager;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        // TODO Auto-generated FeedbackManagerTest::setUp()

        $this->feedbackManager = new FeedbackManager(/* parameters */);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        // TODO Auto-generated FeedbackManagerTest::tearDown()
        $this->feedbackManager = null;

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
     * Tests FeedbackManager::getAllFeedback()
     */
    public function testGetAllFeedback()
    {
        // TODO Auto-generated FeedbackManagerTest::testGetAllFeedback()
        $this->markTestIncomplete("getAllFeedback test not implemented");

        FeedbackManager::getAllFeedback(/* parameters */);
    }

    /**
     * Tests FeedbackManager->getFeedbackByEmail()
     */
    public function testGetFeedbackByEmail()
    {
        // TODO Auto-generated FeedbackManagerTest->testGetFeedbackByEmail()
        $this->markTestIncomplete("getFeedbackByEmail test not implemented");

        $this->feedbackManager->getFeedbackByEmail(/* parameters */);
    }

    /**
     * Tests FeedbackManager->insertFeedback()
     */
    public function testInsertFeedback()
    {
        // TODO Auto-generated FeedbackManagerTest->testInsertFeedback()
        $this->markTestIncomplete("insertFeedback test not implemented");

        $this->feedbackManager->insertFeedback(/* parameters */);
    }

    /**
     * Tests FeedbackManager->deleteFeedback()
     */
    public function testDeleteFeedback()
    {
        // TODO Auto-generated FeedbackManagerTest->testDeleteFeedback()
        $this->markTestIncomplete("deleteFeedback test not implemented");

        $this->feedbackManager->deleteFeedback(/* parameters */);
    }

    /**
     * Tests FeedbackManager::searchByEmail()
     */
    public function testSearchByEmail()
    {
        // TODO Auto-generated FeedbackManagerTest::testSearchByEmail()
        $this->markTestIncomplete("searchByEmail test not implemented");

        FeedbackManager::searchByEmail(/* parameters */);
    }

    /**
     * Tests FeedbackManager::searchByAll()
     */
    public function testSearchByAll()
    {
        // TODO Auto-generated FeedbackManagerTest::testSearchByAll()
        $this->markTestIncomplete("searchByAll test not implemented");

        FeedbackManager::searchByAll(/* parameters */);
    }
}

