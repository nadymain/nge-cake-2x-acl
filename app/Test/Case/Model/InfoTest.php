<?php
App::uses('Info', 'Model');

/**
 * Info Test Case
 */
class InfoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.info'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Info = ClassRegistry::init('Info');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Info);

		parent::tearDown();
	}

}
