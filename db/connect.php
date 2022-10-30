<?php
class PDOControllers 
{

    public static function getConnection()
    {
        try{
            $db = new PDO('sqlite:'.$_SERVER['DOCUMENT_ROOT'].'/we-are-critic/db/wearecritic.db');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } 
        
        catch (PDOException $e){
            die("Connection eror:". $e->getMessage());
        }
    } 

    public static function closeConnection($connection)
    {
        $connection = null;
    }
}