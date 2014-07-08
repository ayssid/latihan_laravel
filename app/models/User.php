<?php

use Cartalyst\Sentry\Users\Eloquent\User as SentryUserModel;

class User extends SentryUserModel{
    	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
        
        public function books()
        {
            return $this->belongsToMany('Book')->withPivot('returned')->withTimeStamps();
        }
}


//use Illuminate\Auth\UserTrait;
//use Illuminate\Auth\UserInterface;
//use Illuminate\Auth\Reminders\RemindableTrait;
//use Illuminate\Auth\Reminders\RemindableInterface;
//
//class User extends Eloquent implements UserInterface, RemindableInterface {
//
//	use UserTrait, RemindableTrait;
//
//	/**
//	 * The database table used by the model.
//	 *
//	 * @var string
//	 */
//	protected $table = 'users';
//
//	/**
//	 * The attributes excluded from the model's JSON form.
//	 *
//	 * @var array
//	 */
//	protected $hidden = array('password', 'remember_token');
//
//}
