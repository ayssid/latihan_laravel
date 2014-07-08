<?php

class Book extends BaseModel {
    protected $table = 'books';


    // Add your validation rules here
    public static $rules = [
             'title' => 'required|unique:books,title,:id',
             'author_id' => 'required|exists:authors,id',
             'amount' => 'numeric',
    ];

    // Don't forget to fill this array
    protected $fillable = ['title', 'author_id', 'amount'];

    public function Author()
    {
        return $this->belongsTo('Author');
    }
    
    public function users()
    {
        return $this->belongsToMany('User')->withPivot('returned')->withTimeStamps();
    }
    
    public function borrow()
    {
        $user = Sentry::getUser();
        return $this->users()->attach($user);
    }

}