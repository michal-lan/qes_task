<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequestsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequestsTable Test Case
 */
class RequestsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RequestsTable
     */
    public $Requests;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Requests'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Requests') ? [] : ['className' => RequestsTable::class];
        $this->Requests = TableRegistry::getTableLocator()->get('Requests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Requests);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
