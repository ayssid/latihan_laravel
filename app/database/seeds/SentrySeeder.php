<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SentrySeeder extends Seeder{

    public function run() {
        DB::table('users_groups')->delete();
        DB::table('users')->delete();
        DB::table('groups')->delete();
        DB::table('throttle')->delete();    
        
        try{
            //membuat grup admin
            $group = Sentry::createGroup(array(
                        'name' => 'admin',
                        'permissions' => array(
                            'admin' => 1,
                        )
                    ));
            
            $group = Sentry::createGroup(array(
                        'name' => 'regular',
                        'permissions' => array(
                            'reguler' => 1,
                        )
                    ));
            
            
        } catch (Cartalyst\Sentry\Groups\NameRequiredException $e) {
            echo 'Name field is required';
        }
        catch(Cartalyst\Sentry\Groups\GroupExistsException $e){
            echo 'Group already exists';
        }
        
        try
        {
            //membuat admin baru
            $admin = Sentry::register(array(
                'email' => 'admin@admin.com',
                'password' => 'admin',
                'first_name' => 'admin',
                'last_name' => 'keren'
            ), true);
            
            $adminGroup = Sentry::findGroupByName('admin');
            
            $admin->addGroup($adminGroup);
            
            
            //membuat user baru
            $user = Sentry::register(array(
                'email' => 'user@user.com', 
                'password' => 'user', 
                'first_name' => 'user', 
                'last_name' => 'keren'
                ), true);
            
            $regulerGroup = Sentry::findGroupByName('regular');
            
            $user->addGroup($regulerGroup);
       
            
        } catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            echo 'Login field is required.';
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            echo 'Password field is required.';
        }
        catch (Cartalyst\Sentry\Users\UserExistsException $e)
        {
            echo 'User with this login already exists.';
        }
        catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            echo 'Group was not found.';
        }
    }

}
