<?php 
namespace components;

Class Database
{
    public static function getConnection()
    {
        $paramsPath = ROOT.'/config/db_config.php';
        $params = include($paramsPath);

        $dsn = "mysql:host={$params['host']};dbname={$params["dbname"]};charset={$params['charset']}";

        $pdo = new \PDO($dsn, $params['user'], $params['password'], $params['options']);	

        return $pdo;
    }
}
