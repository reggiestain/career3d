<?php
namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\FindUserBehavior;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\FindUserBehavior Test Case
 */
class FindUserBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Behavior\FindUserBehavior
     */
    public $FindUser;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->FindUser = new FindUserBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FindUser);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
