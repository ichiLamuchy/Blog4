<?php
require_once 'models/blog.php';
class Post
{
    // we define 3 attributes
    public $id;
    //this $blog property will enable you to access the blog object, with it blog title.
    public $blog;
    public $post_title;
    public $post_body;
    public $created_at;
    public $updated_at;
    public $blog_id;

    public function __construct($id, $blog, $post_title, $post_body, $created_at, $updated_at, $blog_id)
    {
        $this->id = $id;
        $this->blog = $blog;
        $this->post_title = $post_title;
        $this->post_body = $post_body;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->blog_id = $blog_id;
    }

    public static function all($blog_id)
    {    
        $search = intval($blog_id);
        
        $list = [];
        $db = Db::getInstance();
        $req = $db->query("SELECT * FROM POSTS where blog_id = $search ORDER BY
            created_at DESC");
        // we create a list of Product objects from the database results
        foreach ($req->fetchAll() as $post) {
           // $blog = Blog::find($post['blog_id']);
            $blog = Blog::find($post['blog_id']);
            $list[] = new Post(
                $post['id'],
                $blog,
                $post['post_title'],
                $post['post_body'],
                $post['created_at'],
                $post['updated_at'],
                $post['blog_id']
            );
        }
        return $list;
    }

    public static function allByBlog($blog_id)
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM POSTS WHERE blog_id = :blog_id');
        $db->bindParam('blog_id', $blog_id);
        // we create a list of Product objects from the database results
        foreach ($req->fetchAll() as $post) {
            $blog = Blog::find($post['blog_id']);
            $list[] = new Post(
                $post['id'],
                $blog,
                $post['post_title'],
                $post['post_body'],
                $post['created_at'],
                $post['updated_at'],
                $post['blog_id']
            );
        }
        return $list;
    }

    public static function find($id)
    {
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM POSTS WHERE id = :id');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
        $post = $req->fetch();
        if ($post) {
            $blog = Blog::find($post['blog_id']);

            return new Post($post['id'],
                $blog,
                $post['post_title'],
                $post['post_body'],
                $post['created_at'],
                $post['updated_at'],
                $post['blog_id']);

        } else {
            //replace with a more meaningful exception
            throw new Exception('Field not found');
        }
    }

    public static function update($id)
    {
        $db = Db::getInstance();
        $req = $db->prepare("Update POSTS set post_title=:post_title,
            post_body=:post_body, updated_at=now()
             where id=:id");
        $req->bindParam(':id', $id);
        $req->bindParam(':post_title', $postTitle);
        $req->bindParam(':post_body', $postBody);
        // set post_title and post_body parameters and execute
        if (isset($_POST['post_title']) && $_POST['post_title'] != "") {
            $filteredPostTitle = filter_input(INPUT_POST, 'post_title', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['post_body']) && $_POST['post_body'] != "") {
            $filteredPostBody = filter_input(INPUT_POST, 'post_body', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        $postTitle = $filteredPostTitle;
        $postBody = $filteredPostBody;
        $req->execute();
    }

    const AllowedTypes = ['image/jpeg', 'image/jpg'];
    const InputKey = 'myUploader';
/*
 * viv's add
    public static function add($blogId)
    {
        $db = Db::getInstance();
        $req = $db->prepare("Insert into POSTS (blog_id, post_title, post_body, created_at)"
                . " values (:blog_id, :post_title, :post_body, now())");
        $req->bindparam(':blog_id', $blogId);
        $req->bindParam(':post_title', $postTitle);
        $req->bindParam(':post_body', $postBody);
        // set parameters and execute
        if (isset($_POST['post_title']) && $_POST['post_title'] != "") {
            $filteredPostTitle = filter_input(INPUT_POST, 'post_title', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['post_body']) && $_POST['post_body'] != "") {
            $filteredPostBody = filter_input(INPUT_POST, 'post_body', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        $postTitle = $filteredPostTitle;
        $postBody = $filteredPostBody;
        $req->execute();
        //upload product image if it exists
        if (!empty($_FILES[self::InputKey]['myUpload'])) {
            Image::encodeImage();
        }
    }
 
 */
    // return last id
    public static function add()
    {
        $db = Db::getInstance();
        $req = $db->prepare("Insert into POSTS (blog_id, post_title, post_body, created_at,
            updated_at) values (:blog_id, :post_title, :post_body, now(), now())");
        $req->bindparam(':blog_id', $blogId);
        $req->bindParam(':post_title', $postTitle);
        $req->bindParam(':post_body', $postBody);
        // set parameters and execute
        if (isset($_POST['post_title']) && $_POST['post_title'] != "") {
            $filteredPostTitle = filter_input(INPUT_POST, 'post_title', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['post_body']) && $_POST['post_body'] != "") {
            $filteredPostBody = filter_input(INPUT_POST, 'post_body', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['blog_id']) && $_POST['blog_id'] != "") {
            $filteredBlogId = filter_input(INPUT_POST, 'blog_id', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        $postTitle = $filteredPostTitle;
        $postBody = $filteredPostBody;
        $blogId = $filteredBlogId;
        $req->execute();
        $last_id = $db->lastInsertId();
        return $last_id;
        
    }
    public static function remove($id)
    {
        $db = Db::getInstance();
        //make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('delete FROM POSTS WHERE id = :id');
        // the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
    }

}
