<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}
        
        public function dashboard()
        {
            
            return View::make('dashboard.index')->withTitle('Dashboard');
        }
        
        public function authenticate()
        {
            $credentials = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            try
            {
                $user = Sentry::authenticate($credentials, false);

                return Redirect::intended('dashboard');
            } catch (Exception $ex) {
                return Redirect::back()->with('errorMessage', 'Email atau Password anda salah');
            }
        }
        
        public function logout()
        {
            Sentry::logout();
            //return Redirect::route('guest.index');
            return Redirect::to('login')->with('successMessage', 'Anda Berhasil Logout');
        }

}
