<?php

class Blog {

    public $id;
    public $user_id;
    public $blog_image;
    public $blog_title;
    public $topic;
    public $blog_summary;
    public $date_created;
    public $date_edited;
    public $style_id;

    public function __construct($id, $user_id, $blog_title, $topic, $blog_summary, $date_created, $date_edited, $style_id, $blog_image) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->blog_title = $blog_title;
        $this->topic = $topic;
        $this->blog_summary = $blog_summary;        
        $this->date_created = $date_created;
        $this->date_edited = $date_edited; 
        $this->style_id = $style_id;
        $this->blog_image = $blog_image;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM BLOGS ORDER BY
                            date_created DESC');
        foreach ($req->fetchAll() as $blog) {
            $list[] = new Blog($blog['id'], $blog['user_id'], $blog['blog_title'], $blog['topic'], $blog['blog_summary'], $blog['date_created'], $blog['date_edited'], $blog['style_id'], $blog['blog_image']);
        }
        return $list;
    }

    public static function find($id) {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM BLOGS WHERE id = :id');
        $req->execute(array('id' => $id));
        $blog = $req->fetch();
        if ($blog) {
            return new Blog($blog['id'], $blog['user_id'], $blog['blog_title'], $blog['topic'], $blog['blog_summary'], $blog['date_created'], $blog['date_edited'], $blog['style_id'], $blog['blog_image']);
        } else {
            throw new Exception('Cannot find blog, please try again.');
        }
    }

    public static function update($id) {
        $db = Db::getInstance();
        $req = $db->prepare("Update blog set blog_title=:blog_title, blog_summary=:blog_summary, topic=:topic, blog_image = :blog_image where id=:id");
        $req->bindParam(':id', $id);
        $req->bindParam(':blog_title', $blog_title);
        $req->bindParam(':blog_image', $blog_image);
        $req->bindParam(':blog_summary', $blog_summary);
        $req->bindParam(':topic', $topic);
        

        if (isset($_POST['blog_title']) && $_POST['blog_title'] != "") {
            $filteredBlog_title = filter_input(INPUT_POST, 'blog_title', FILTER_SANITIZE_SPECIAL_CHARS);
        }  
        if (isset($_POST['blog_summary']) && $_POST['blog_summary'] != "") {
            $filteredBlog_summary = filter_input(INPUT_POST, 'blog_summary', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['topic']) && $_POST['topic'] != "") {
            $filteredTopic = filter_input(INPUT_POST, 'topic', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        $blog_title = $filteredBlog_title;
        $blog_image = Blog::uploadFile();
        $blog_summary = $filteredBlog_summary;
        $topic = $filteredTopic;
        
        $req->execute();
        return $id;
    }
    /*
    public static function create($user_id) {
        $db = Db::getInstance();
        $req = $db->prepare("Insert into blog(blog_title, topic, blog_summary, style_id) values (:blog_title, :topic, :blog_summary, :style_id)");
        $req->bindParam(':blog_title', $blog_title);
        $req->bindParam(':topic', $topic);
        $req->bindParam('blog_summary', $blog_summary);
        $req->bindParam('style_id', $style_id);

        if (isset($_POST['blog_title']) && $POST['blog_title'] != "") {
            $filteredBlog_title = filter_input(INPUT_POST, 'blog_title', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['blog_summary']) && $_POST['blog_summary'] != "") {
            $filteredBlog_summary = filter_input(INPUT_POST, 'blog_summary', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['topic']) && $_POST['topic'] != "") {
            $filteredTopic = filter_input(INPUT_POST, 'topic', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['style_id']) && $_POST['style_id'] != "") {
            $filteredStyle_id = filter_input(INPUT_POST, 'style_id', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        $blog_title = $filteredBlog_title;
        $blog_summary = $filteredBlog_summary;
        $topic = $filteredTopic;
        $style_id = $filteredStyle_id;
        $req->execute();  
        $last_id = $db->lastInsertId();
        echo "New record created successfully. Last inserted ID is: " . $last_id;
        return $last_id;
    }
    */
    
    public static function create() {
        $db = Db::getInstance();
        $req = $db->prepare("INSERT into BLOGS(blog_title, topic, blog_summary, user_id, date_created, blog_image) values (:blog_title, :topic, :blog_summary, :user_id, :date_created, :blog_image)");
        $req->bindParam(':blog_title', $blog_title);
        $req->bindParam(':topic', $topic);
        $req->bindParam(':blog_summary', $blog_summary);
        $req->bindParam(':user_id', $user_id);
        $req->bindParam(':date_created', $date_created);
        $req->bindParam(':blog_image', $blog_image);
        
        if (isset($_POST['blog_title']) && $_POST['blog_title'] != "") {
            $filteredBlog_title = filter_input(INPUT_POST, 'blog_title', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['blog_summary']) && $_POST['blog_summary'] != "") {
            $filteredBlog_summary = filter_input(INPUT_POST, 'blog_summary', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['topic']) && $_POST['topic'] != "") {
            $filteredTopic = filter_input(INPUT_POST, 'topic', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != "") {
            $filteredUser_id = filter_var($_SESSION['user_id']);
        }
        $blog_title = $filteredBlog_title;
        $blog_summary = $filteredBlog_summary;
        $topic = $filteredTopic;
        $user_id = $filteredUser_id;
        $blog_image = Blog::uploadFile();
        // need to set time zone....
        $date_created = date('Y-m-d');
        $req->execute();  
        $last_id = $db->lastInsertId();
        //echo "New record created successfully. Last inserted ID is: " . $last_id;
        return $last_id;
    }
    
        const AllowedTypes = ['image/jpeg', 'image/jpg'];
    const InputKey = 'blog_image';

    //die() function calls replaced with trigger_error() calls
    //replace with structured exception handling
    public static function uploadFile() {
        if (empty($_FILES[self::InputKey])) {
            //die("File Missing!");
            trigger_error("File Missing!");
        }
        if ($_FILES[self::InputKey]['error'] > 0) {
            trigger_error("Handle the error! " . $_FILES[InputKey]['error']);
        }
        if (!in_array($_FILES[self::InputKey]['type'], self::AllowedTypes)) {
            trigger_error("Handle File Type Not Allowed: " . $_FILES[self::InputKey]['type']);
        }
        $tempFile = $_FILES[self::InputKey]['tmp_name'];
        $im = file_get_contents($tempFile);
        
        //data:image/jpeg;base64,asdasdasdasd
        $imdata = sprintf("data:%s;base64,%s",
            $_FILES[self::InputKey]['type'],
            base64_encode($im)
        );              
        //Clean up the temp file
        if (file_exists($tempFile)) {
            unlink($tempFile);
        }       
        return $imdata;
    }
  
    public static function delete($id) {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('delete FROM BLOGS WHERE id = :id');
        $req->execute(array('id' => $id));
    }

}
