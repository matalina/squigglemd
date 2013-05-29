<?php
use Way\Tests\Factory;

class PostTest extends TestCase {
	use Way\Tests\ModelHelpers;

	/** Setup **/

	public function setUp()
	{
		Artisan::call('migrate:refresh');
	}

	/** Relationships **/
	
	public function testPostHasOneUser()
	{
		$this->assertHasOne('users', 'Post');
	}

	/** Validation **/
	
	public function testPostHasUniqueSlug()
	{
		$post = Factory::create('post',  array('slug' => 'test', 'user_id' => 1));

		$post = Factory::post(array('slug' => 'test', 'user_id' => 1));

		$this->assertNotValid($post);
	}

	/*public function testPostHasSlug()
	{

	}

	public function testPostInvalidWithoutSlug()
	{

	}

	public function testPostHasTitle()
	{

	}

	public function testPostInvalidWithoutTitle()
	{

	}

	public function testPostHasAuthor()
	{

	}

	public function testPostInvalidWithoutAutho()
	{

	}*/

}