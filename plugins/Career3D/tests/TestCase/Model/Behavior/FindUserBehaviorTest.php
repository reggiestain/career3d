<?php
namespace Career3D\Test\TestCase\Model\Behavior;

use Cake\TestSuite\TestCase;
use Career3D\Model\Behavior\FindUserBehavior;

/**
 * Career3D\Model\Behavior\FindUserBehavior Test Case
 */
class FindUserBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Career3D\Model\Behavior\FindUserBehavior
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
