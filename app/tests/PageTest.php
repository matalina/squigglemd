<?php

class PageTest extends TestCase {
	use Way\Tests\ModelHelpers;

	/** Clean Up **/

	protected $page;

	protected function _cleanUp()
	{
		$app = $this->createApplication();

		$app->make('artisan')->call('migrate:refresh');
		//Artisan::call('migrate:refresh');
		
		$page = new page();
		$page->slug = 'testing';
		$page->title = 'Testing';
		$page->user_id = 1;
		$page->parent_id = 0;
		$page->order = 0;

		$this->page = $page;

	}

	/** Relationships **/
	
	public function testPageHasOnePage()
	{
		$this->_cleanUp();

		$this->assertHasOne('pages', 'page');
	}

	/** Validation **/

	public function testPageInvalidWithoutParentID()
	{
		$this->_cleanUp();

		$this->page->parent_id = null;

		$this->assertNotValid($this->page);
	}

	public function testPageInvalidWithoutOrder()
	{
		$this->_cleanUp();

		$this->page->order = null;

		$this->assertNotValid($this->page);
	}

	public function testPageValid()
	{
		$this->_cleanUp();

		$this->assertValid($this->page);
	}

}