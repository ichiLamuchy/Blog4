<?php

require_once('models/user.php');

class Comment
{

    // we define 3 attributes
    public $id;
    public $user_id;
    public $comment_body;
    public $created_at;
    public $user;

    public function __construct($id, $user_id, $comment_body, $created_at, $user = null)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->comment_body = $comment_body;
        $this->created_at = $created_at;
        $this->user = $user;
    }

    public static function all($post_id)
    {
        $search = intval($post_id);
        
        $list = [];
        $db = Db::getInstance();
        $req = $db->query("SELECT * FROM COMMENTS where post_id = $search");
        // we create a list of Product objects from the database results
        foreach ($req->fetchAll() as $comment) {
            $user = User::find($comment['user_id']);
            $list[] = new Comment($comment['id'], $comment['user_id'], $comment['comment_body'], $comment['created_at'], $user);
        }
        return $list;
    }

    public static function find($id)
    {
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM COMMENT WHERE id = :id');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
        $comment = $req->fetch();
        if ($comment) {
            return new Post($comment['id'], $comment['user_id'], $comment['comment_body'], $comment['created_at']);

        } else {
            //replace with a more meaningful exception
            throw new Exception('A real exception should go here');
        }
    }

    public static function update($id)
    {
        $db = Db::getInstance();
        $req = $db->prepare("Update COMMENT set comment_body=:comment_body,
            updated_at=now()
             where id=:id");
        $req->bindParam(':id', $id);
        $req->bindParam(':comment_body', $commentBody);
        // set comment_body parameters and execute
        if (isset($_POST['comment_body']) && $_POST['comment_body'] != "") {
            $filteredCommentBody = filter_input(INPUT_POST, 'comment_body', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        $commentBody = $filteredCommentBody;
        $req->execute();
    }

    public static function add()
    {
        $db = Db::getInstance();
        $req = $db->prepare("Insert into COMMENTS (post_id, user_id,comment_body, created_at) values (:post_id, :user_id, :comment_body, now())");
        $req->bindParam(':user_id', $_SESSION['user_id']);
        $req->bindParam(':post_id', $_GET['post_id']);
        $req->bindParam(':comment_body', $commentBody);
        // set parameters and execute
        if (isset($_POST['comment_body']) && $_POST['comment_body'] != "") {
            $filteredCommentBody = filter_input(INPUT_POST, 'comment_body', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        $commentBody = $filteredCommentBody;
        $req->execute();
    }

    public static function remove($id)
    {
        $db = Db::getInstance();
        //make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('delete FROM COMMENTS WHERE id = :id');
        // the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
    }
}