<?php

class Post extends BaseModel {
    protected $guarded = array();

    public static $rules = array(
    	'slug' => 'required|unique:posts'
    );

    public function users()
    {
    	return $this->hasOne('User');
    }
}