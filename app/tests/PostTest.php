<?php

class PostTest extends TestCase {
	use Way\Tests\ModelHelpers;

	/** Clean Up **/

	protected $post;

	protected function _cleanUp()
	{
		$app = $this->createApplication();

		$app->make('artisan')->call('migrate:refresh');
		//Artisan::call('migrate:refresh');
		
		$post = new Post();
		$post->slug = 'testing';
		$post->title = 'Testing';
		$post->user_id = 1;

		$this->post = $post;

	}

	/** Relationships **/
	
	public function testPostHasOneUser()
	{
		$this->_cleanUp();

		$this->assertHasOne('users', 'Post');
	}

	/** Validation **/
	
	public function testPostHasUniqueSlug()
	{
		$this->_cleanUp();

		$this->post->save();

		$post = new Post();
		$post->slug = 'testing';
		$post->title = 'Testing';
		$post->user_id = 1;

		$this->assertNotValid($post);
	}

	public function testPostInvalidWithoutSlug()
	{
		$this->_cleanUp();

		$this->post->slug = null;

		$this->assertNotValid($this->post);
	}

	public function testPostInvalidWithoutTitle()
	{
		$this->_cleanUp();

		$this->post->title = null;

		$this->assertNotValid($this->post);
	}

	public function testPostInvalidWithoutAuthor()
	{
		$this->_cleanUp();

		$this->post->user_id = null;

		$this->assertNotValid($this->post);
	}

	public function textPostInvalidNotIntegerForAuthor()
	{
		$this->_cleanUp();

		$this->post->user_id = 'string';

		$this->assertNotValid($this->post);
	}

	public function testPostValid()
	{
		$this->_cleanUp();

		$this->assertValid($this->post);
	}

}