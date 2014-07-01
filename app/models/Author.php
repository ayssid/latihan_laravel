<?php

class Author extends \Eloquent {

    protected $table = 'authors';


    // Add your validation rules here
	public static $rules = [
		'name' => 'required|unique:authors'
	];

	// Don't forget to fill this array
	protected $fillable = ['name'];

}