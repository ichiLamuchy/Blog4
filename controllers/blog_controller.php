<?php
/*
 * Work In Progress !!!
 * 
 * Author: Ichi 
 * 
 */


class BlogController {
    
    /*
     * @Models: "read all" method () to return object or multi dimentinal associtive arrays 
     * with blog_title, blog_body, blog_owner_name, last_date_post_updated
     * 
     */
    public function viewAll() { 
      // we store all the blogs in a variable
            $blogs = Blog::all();
            
            require_once('views/blogs/viewAll_blog.php');
            // the would be some pretty title with all posts (it can be entrace of our home page or 
        
        //catch (Exception $ex){
        //    return call('pages','error');
        //}
    }
    
    /*
     * @Models: "read" method (@param 'blog_id') to return object or a single dimentional associtive array
     * 
     * @Views: call: show_blog.php and viewAll_post.php
     */
    public function show() {
      // we expect a url of link ?controller=posts&action=show&blog_id=x (where x has been echoed from $blogs['id'])
      // without an id we just redirect to the error page as we need the post id to find it in the database
        if (!isset($_GET['blog_id'])){
            return call('pages', 'error');
        }
        try{
            // we use the given id to get the correct blog
            $blog = Blog::find($_GET['blog_id']);
            
            // show_blog.php require viewAll_post.php          
            require_once('views/blogs/show_blog.php');        
            call('post', 'viewAll');         
        }
        catch (Exception $ex){
            return call('pages','error');
        }
    }
    
    /*
     * @Models: "create" method to retun an associtive array of the single blog just created
     * 
     * @Views: create_blog.php then show_blog.php
     * 
     */
    public function create() {
        
      // This privilage has not been set properly if it's set, there would be alternative ways for this condition stateant
        if(!empty($_SESSION['user_id'])){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                require_once('views/blogs/create_blog.php');
            }
            else{ 
                $blog_id = Blog::create();
                //$blogs = Blog::find($blog_id);
                return call('blog', 'viewAll');
            }
        }
        else{
            // if not logged in then re-direct to register page (also has link to log in)
            return call('blog', 'viewAll');
        }  
    }
    
    /*
     * @Models: "update" method to retun object or array
     * @Views: update_blog.php then show_blog.php
     * 
     * @ we expect a url of link from show page
     */
    public function update() {
        
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
 
   
            // we use the given id to get the correct product
            try {
                $blog = Blog::find($_GET['blog_id']);
                require_once('views/blogs/update_blog.php');
            }
            catch (Exception $ex){
                return call('pages','error');
            }
        }
        else{ 
            $id = $_GET['blog_id'];
            $blog = Blog::update($id);
                        
            return call('blog', 'show');
        } 
    }
    
    /*
     * @Models: "remove" method to retun - may be error or success?
     *          within the Query WHERE admin level is either registered
     * 
     * we expect a url of link from show page
     */
    
    public function delete() {
        
        Blog::delete($_GET['blog_id']);
        // or return all blog
        $blogs = Blog::all();
        require_once('views/blogs/viewAll_blog.php');
        // can I return call ("blog", "viewAll")
      }      
    }  
?>