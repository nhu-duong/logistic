<?php

require_once("config.php");

class Connection
{
    public static $_connection = null;
    
    /**
     * Get DB connection
     * 
     * @return type
     */
    public static function getConnection()
    {
        if (empty(self::$_connection)) {
            // create new connection
        }
        
        return self::$_connection;
    }
}