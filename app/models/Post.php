<?php

class Post extends BaseModel {
    protected $guarded = array();

    public static $rules = array(
    	'slug' => 'required|unique:posts',
    	'title' => 'required',
    	'user_id' => 'required|integer'
    );

    public function users()
    {
    	return $this->hasOne('User');
    }
}