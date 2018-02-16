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

    public static function getCategoryById($id)
    {
		$db = Database::getConnection();
		$query = $db->prepare("SELECT * FROM category WHERE id = :id");
		$query->execute(array('id' => $id));

		return $query->fetch();    	
    }

    public static function createCategory($category)
    {
    	$db = Database::getConnection();
    	$query = $db->prepare("INSERT INTO category(name, sort_order) VALUES (:name, :sort_order)");
    	$result = $query->execute(array('name' => $category['name'], 'sort_order' => $category['sort_order']));

    	return $result;
    }

    public static function updateCategory($category)
    {
		$db = Database::getConnection();
		$query = $db->prepare("UPDATE category SET name = :name, sort_order = :sort_order WHERE id = :id" );
		$result = $query->execute(array('id' => $category['id'], 'name' => $category['name'], 'sort_order' => $category['sort_order']));
    	
    	return $result;
    }

    public static function deleteCategory($id)
    {
    	$db = Database::getConnection();
    	$query = $db->prepare("DELETE FROM category WHERE id = :id");
    	$result = $query->execute(array('id' => $id));

    	return $result;
    }
}
