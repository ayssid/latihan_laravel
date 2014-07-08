<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class GuestController extends BaseController
{
    
    public function index()
    {
        if(Sentry::check())
        {
            return Redirect::to('dashboard');
        }
        return View::make('guest.index')->withTitle('Daftar Buku');
    }


    public function login()
    {
        if(Sentry::check())
        {
            Session::reflash();
            return Redirect::to('dashboard');
        }
        
        return View::make('guest.login');
    }
    
    
}