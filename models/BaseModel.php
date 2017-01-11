<?php
/**
 * Created by PhpStorm.
 * User: Nikolay
 * Date: 1/10/2017
 * Time: 4:34 PM
 */

abstract class BaseModel
{
    protected static $db;
    public function __construct()
    {
        if (self::$db == null) {
            self::$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            self::$db->set_charset("utf8");
            if (self::$db->connect_errno) {
                die('Cannot connect to database');
            }
        }
    }
}