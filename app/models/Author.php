<?php

class Author extends \Eloquent {

    protected $table = 'authors';


    // Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

}