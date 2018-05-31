<?php

/*
 * copied from Peter's connection.php
 * Please change
 */

class DB
{
    private static $instance = null;

    //Singleton Design Pattern
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO('mysql:host=library.cy8z5nl3gsit.eu-west-2.rds.amazonaws.com;dbname=rogue_blog_db', 'root', 'password', $pdo_options);
        }
        return self::$instance;
    }
}
