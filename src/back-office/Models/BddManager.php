<?php 

class BddManager
{
    private const DB_NAME = 'jeu_combat';
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

