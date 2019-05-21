<?php

class BddManager {

/* private const DB_NAME = 'jdsdfrcjkmjojo';
private const DB_HOST = 'jdsdfrcjkmjojo.mysql.db';
private const DB_USER = 'jdsdfrcjkmjojo';
private const DB_MDP = 'Adramyttium1908Geomorpho191';    */

private const DB_NAME = 'keslene';
private const DB_HOST = 'localhost';
private const DB_USER = 'root';
private const DB_MDP = ''; 

protected static function bddConnect() 
{
    try
    {
        $bdd = new PDO ('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME.';charset=utf8', self::DB_USER, self::DB_MDP, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    } 
    catch(Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
}

}


