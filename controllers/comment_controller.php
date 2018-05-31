<?php

/* 
 */

class CommentController {
    // viewAll & create together
    public function viewAll() {
      // we store all the comments in a variable
      if($_SERVER['REQUEST_METHOD'] == 'GET'){
        
        $comments = Comment::all($_GET['post_id']);
      require_once('views/comments/viewAll_comment.php');
      }
      else {     
            Comment::add();
            $comments = Comment::all($_GET['post_id']);
            require_once('views/comments/viewAll_comment.php');
      }
    }

    public function show() {
      // we expect a url of form ?controller=comment&action=show&id=x
      // without an id we just redirect to the error page as we need the comment id to find it in the database
        if (!isset($_GET['comment_id']))
        return call('pages', 'error');

        try{
            // we use the given id to get the correct comment
            $comments = Comment::find($_GET['comment_id']);
            require_once('views/comments/show_comment.php');
        }
        catch (Exception $ex){
            return call('pages','error');
        }
    }
 
    public function create() {
      // we expect a url of form ?controller=comment&action=create
      // if it's a GET request display a blank form for leaving a new comment
      // else it's a POST so add to the database and redirect to viewAll action
      if($_SERVER['REQUEST_METHOD'] == 'GET'){
          
          require_once('views/comments/create_comment.php');
      }
      else { 
          
            Comment::add();     
            call('post', 'show');
      }
      
    }
    public function update() {
        
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if (!isset($_GET['comment_id']))
            return call('pages', 'error');

            // we use the given id to get the correct comment
            $comments = Comment::find($_GET['comment_id']);
            require_once('views/comments/update_comment.php');
        }
        else
            { 
                $comment_id = $_GET['comment_id'];
                Comments::update($comment_id);

                $comments = Comment::all();
                require_once('views/comments/viewAll_comment.php');
        }
      
    }
  
    
     public function delete() {
             
            Comment::remove($_GET['comment_id']);           
            call('post', 'show');
           
        }  
}