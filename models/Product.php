<?php
namespace models; 

use components\Database;

Class Product
{

    const SHOW_BY_DEFAULT = 8;

    public static function getProductById($id)
    {
        $db = Database::getConnection();
        $query = $db->prepare('SELECT * FROM products WHERE id = :id');
        $query->execute(array('id' => $id));

        $product = $query->fetch();

        return $product;
    }

    public static function getAllProducts($page, $count = self::SHOW_BY_DEFAULT)
    {
        $db = Database::getConnection();
        $offset = ($page-1)*$count;

        $query = $db->prepare('SELECT * FROM products ORDER BY id DESC LIMIT :count OFFSET :offset');
        $query->execute(array('count' => $count, 'offset' => $offset));

        $result = $query->fetchAll();

        return $result;
    }

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $db = Database::getConnection();
        $query = $db->prepare('SELECT * FROM products WHERE avability=true ORDER BY id DESC LIMIT :count');
        $query->execute(array('count'=>$count));
        $products = $query->fetchAll();

        return $products;
    } 



    public static function getLatestProductsByCategory($categoryId, $page, $count = self::SHOW_BY_DEFAULT )
    {
        $db = Database::getConnection();

        $offset = ($page-1)*$count;

        $query = $db->prepare('SELECT * FROM products WHERE avability=true AND category_id=:categoryId ORDER BY id DESC LIMIT :count OFFSET :offset');
        $query->execute(array('categoryId'=>$categoryId, 'count' => $count, 'offset' => $offset));

        $products = $query->fetchAll();

        return $products;
    }

    public static function getProductsByIds($ids)
    {
        $db = Database::getConnection();
        $place_holders = implode(',', array_fill(0, count($ids), '?'));

        $query = $db->prepare("SELECT id, name, price FROM products WHERE avability=true AND id IN ($place_holders)");
        $query->execute($ids);

        $items = $query->fetchAll();

        return $items;
    }

    public static function getTotalProductInCategory($categoryId)
    {
        $db = Database::getConnection();
        $query = $db->prepare('SELECT count(name) AS count FROM products WHERE avability=true AND category_id=:category_id');
        $query->execute(array('category_id' => $categoryId));

        $total = $query->fetch();

        return $total['count'];
    }


    public static function getTotalAllProducts()
    {
        $db = Database::getConnection();
        $query = $db->query('SELECT count(name) AS count FROM products');

        $total =$query->fetch();
        return $total['count'];
    }

    public static function create($name, $category, $price, $avability, $brand, $image, $description, $isNew, $isRecomend)
    {
        $db = Database::getConnection();
        $query = $db->prepare('INSERT INTO products VALUES (result = :result, 
                                                            category = :category,
                                                            price = :price,
                                                            avability = :avability,
                                                            brand = :brand,
                                                            image = :image,
                                                            description = :description,
                                                            isNew = :isNew,
                                                            isRecomend = :isRecomend,
                                                            status = :status)');
        $query->execute(array('result' => $result, 
                              'category' => $category,
                              'price' => $price,
                              'avability' => $avability,
                              'brand' => $brand,
                              'image' => $image,
                              'description' => $description,
                              'isNew' => $isNew,
                              'isRecomend' => $isRecomend));
        
        $result = $query->fetch();
        return $result;
    }

}
