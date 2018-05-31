<?php

/* work in progress. All functions complete except login function. Currently fixing login(). */

class User {

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $email;
    public $admin_level;

    public function __construct($id, $username, $password, $first_name, $last_name, $email, $admin_level) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->admin_level = $admin_level;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM USERS');
        foreach ($req->fetchAll() as $user) {
            $list[] = new User($user['id'], $user['username'], $user['password'], $user['first_name'], $user['last_name'], $user['email'], $user['admin_level']);
        }
        return $list;
    }

    public static function create() {
        $db = Db::getInstance();
        $req = $db->prepare("Insert into USERS(username, password, first_name, last_name, email) values (:username, :password, :first_name, :last_name, :email)");
        $req->bindParam(':username', $username);
        $req->bindParam(':password', $password);
        $req->bindParam('first_name', $first_name);
        $req->bindParam('last_name', $last_name);
        $req->bindParam('email', $email);

        if (isset($_POST['username']) && $_POST['username'] != "") {
            $filteredUsername = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['password']) && $_POST['password'] != "") {
            $filteredPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['first_name']) && $_POST['first_name'] != "") {
            $filteredFirst_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['last_name']) && $_POST['last_name'] != "") {
            $filteredLast_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['email']) && $_POST['email'] != "") {
            $filteredEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        $username = $filteredUsername;
        $password = password_hash($filteredPassword, PASSWORD_DEFAULT);
        $first_name = $filteredFirst_name;
        $last_name = $filteredLast_name;
        $email = $filteredEmail;
        $req->execute();
        $last_id = $db->lastInsertId();
       // echo "New record created successfully. Last inserted ID is: " . $last_id;
        return $last_id;
    }

    public static function update($id) {
        $db = Db::getInstance();
        $req = $db->prepare("Update USERS set password=:password, first_name=:first_name, last_name=:last_name, email=:email where id=:id");
        $req->bindParam(':id', $id);
        $req->bindParam(':password', $password);
        $req->bindParam(':first_name', $first_name);
        $req->bindParam(':last_name', $last_name);
        $req->bindParam(':email', $email);

        if (isset($_POST['password']) && $_POST['password'] != "") {
            $filteredPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['first_name']) && $_POST['first_name'] != "") {
            $filteredFirst_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['last_name']) && $_POST['last_name'] != "") {
            $filteredLast_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['email']) && $_POST['email'] != "") {
            $filteredEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        $password = password_hash($filteredPassword, PASSWORD_DEFAULT);
        $first_name = $filteredFirst_name;
        $last_name = $filteredLast_name;
        $email = $filteredEmail;
        $req->execute();
        return $id;
    }

    public static function delete($id) {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('delete FROM USERS WHERE id = :id');
        $req->execute(array('id' => $id));
    }

    public static function find($id) {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM USERS WHERE id = :id');
        $req->execute(array('id' => $id));
        $user = $req->fetch();
        if ($user) {
            return new User($user['id'], $user['username'], $user['password'], $user['first_name'], $user['last_name'], $user['email'], $user['admin_level']);
        } else {
            throw new Exception('Cannot find user, please try again.');
        }
    }
    
    public static function login() {
        $db = Db::getInstance();     
        $req = $db->prepare('SELECT id, password, admin_level FROM USERS where username = :username');
        $req->bindParam(':username', $username);

        if (isset($_POST['password']) && $_POST['password'] != "") {
        $filteredPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['username']) && $_POST['username'] != "") {
        $filteredUsername = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        $input_password = $filteredPassword;
        $username = $filteredUsername;
        $req->execute(); 
        $result = $req->fetch();
      //  foreach ($result as $user_detail){
      //      $user_details = new User($user_detail['id'], $user_detail['admin_level']);
      //  }
        $row_cnt = $req->rowCount();        

        if ($row_cnt > 0) {
            if (password_verify($input_password, $result['password'])) {
               // return $user_details;
                return $result['id'];
            } else {
                throw new Exception('Incorrect password entered');
            }
        } else {
            throw new Exception('Username does not exist');
        }
   }

   /*
    public static function login() {
        $db = Db::getInstance();
        $input_password = $_POST['password'];
        
        $result = $db->query('SELECT * FROM USERS WHERE username = :username LIMIT 1');  
        $row_cnt = $result->num_rows;        
        if ($row_cnt > 0) {
            $req = $db->prepare('SELECT id, password FROM USERS where username = :username');
            $req->bindParam('id', $user_id);
            $req->bindParam('password', $password);
            //foreach ($req->fetch() as $user) {
            //    $user_id = new User($user['id']);
            //    $password = new User($user['password']);
            //}
            if (password_verify($input_password, $password)) {
                return $user_id;
            } else {
                throw new Exception('Incorrect password entered');
            }
        } else {
            throw new Exception('Username does not exist');
        }
    }
    * 
    */
    
}
