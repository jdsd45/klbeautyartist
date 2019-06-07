<?php 

class BddManager
{
    
/* 	private const DB_NAME = 'jdsdfrcjkmjojo';
    private const DB_HOST = 'jdsdfrcjkmjojo.mysql.db';
    private const DB_USER = 'jdsdfrcjkmjojo';
    private const DB_PASS = 'Adramyttium1908Geomorpho191'; */

    private const DB_NAME = 'keslene';
    private const DB_HOST = 'localhost';
    private const DB_USER = 'root';
    private const DB_PASS = '';

    protected static function bddConnect()
    {
        try
        {
            $bdd = new PDO ('mysql:host='.BddManager::DB_HOST.';dbname='.BddManager::DB_NAME.';charset=utf8', BddManager::DB_USER, BddManager::DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            return $bdd; 
        }
        catch(Exception $e)
        {
            die('Erreur :' . $e->getMessage());
        }
    }
}

