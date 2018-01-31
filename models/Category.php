<?php 
namespace models;

use components\Database;
	
Class Category
{
    public static function getAllCategory()
    {
        $db = Database::getConnection();
        $query = $db->query('SELECT * FROM category ORDER BY sort_order ASC');
        $categories = $query->fetchAll();

        return $categories;
    }
}
