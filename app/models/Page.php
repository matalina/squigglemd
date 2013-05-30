<?php

class Page extends Post {
    protected $guarded = array();

    protected $table = 'pages';

    public static $rules = array(
    	'slug' => 'required|unique:posts',
    	'title' => 'required',
    	'user_id' => 'required|integer',
    	'parent_id' => 'required|integer', 
    	'order' => 'required|integer'
    );

    public function pages()
    {
    	return $this->hasOne('Page', 'parent_id');
    }
}