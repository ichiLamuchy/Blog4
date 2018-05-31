<?php
/*
 * Work In Progress !!!
 * 
 * Author: Ichi 
 * 
 */

class UserController {
    
    /*
     * @Models: "login" method () check $_POST['username'] and $_POST['password'] matched if True 
     * return with new user
     * 
     */    
    public function login(){
  
        // If method was not POST goes to the login form
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
              require_once('views/users/login.php');
            }
        else {  
            // this try and catch does not work
            try{
                // if  username and password matched, it will return user_id
                $user_id = User::login();
                $user = User::find($user_id);
                
                $_SESSION['user_id']=$user->id;
                $_SESSION['username']=$user->username;
                $_SESSION['admin_level']=$user->admin_level;
                
                return call('blog', 'viewAll');
            }
            catch (Exception $ex){
                return call('pages','error');
            }
        }           
    }
    
    
    /*
     * @Models: "find" method (@param 'user_id') to return an associtive array of the single user
     * 
     * @Views: show_user.php with edit / delete or go to home page
     * 
     */
    public function show(){

        try{     
            $user_id = $_SESSION['user_id'];
            $user = User::find($user_id);
            
            require_once('views/users/show_user.php');    
        }
        catch (Exception $ex){
            return call('pages','error');
        }
    }

    
    /*
     * @Models: "create" method to retun an associtive array of the single user 
     * 
     * @Views: register.php then show_user.php
     * 
     * @todo: try and catch
     */
    public function register(){  
            
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            require_once('views/users/create_account.php');
        }
        else { 
            // try and catch 
            $userid= User::create(); 
            $user=User::find($userid);
             $_SESSION['user_id']=$user->id;
             $_SESSION['username']=$user->username;
             $_SESSION['admin_level']=$user->admin_level;
             
            return call("user", "show");
        }  
    }
    
    /*
     * @Models: "update" method to retun none
     * @Views: update_user.php then show_user.php
     * 
     * we expect a url of link from show page - leave for now
     */
    public function update(){
        
      if($_SERVER['REQUEST_METHOD'] == 'GET'){
        // we use the given id to get the correct product
            $user_id=$_SESSION['user_id'];
            $user = User::find($user_id);
            require_once('views/users/update_user.php');
        }
        else
          {           
          // how can i see the owner of the blog
            $user_id=$_SESSION['user_id'];
            try{
                $user = User::update($user_id);                    
                return call('user', 'show');
            }
            catch (Exception $ex){
               return call('pages','error');
            }
        }
      
    }
    
    /*
     * @Models: "remove/delete" method to delete the user 
     *          within the Query WHERE admin level is either registered
     * @Views:  (may need to alart are you sure to delete & home.php 
     * 
     * we expect a url of link from show page - leave for now
     */
    public function delete() {        
        try{
            User::remove($_SESSION['user_id']);
            //$_SESSION['user_id'] = '';
            //$_SESSION['username'] = '';
            //$_SESSION['logged_in'] = False;
            session_unset();

            return call('blog', 'viewAll');    
        }
        catch (Exception $ex){
            return call('pages','error');
        }          
    }
    
    public function logout(){
        session_unset();
        return call ('blog', 'viewAll');
        // Because by the time we reach here, the layout.php will have already echo'd
        // the username because at the point, the session existed
        // We have to use Javascript here to do the redirect
        //echo '<script type="text/javascript">';
        //echo "window.location.href = 'index.php?controller=blog&method=viewAll';";
        //echo '</script>';
    }
}
