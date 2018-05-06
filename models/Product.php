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
        $query->execute(['id' => $id]);

        $product = $query->fetch();

        return $product;
    }

    public static function getAllProducts($page, $count = self::SHOW_BY_DEFAULT)
    {
        $db = Database::getConnection();
        $offset = ($page-1)*$count;

        $query = $db->prepare('SELECT * FROM products ORDER BY id DESC LIMIT :count OFFSET :offset');
        $query->execute(['count' => $count, 'offset' => $offset]);

        $result = $query->fetchAll();

        return $result;
    }

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $db = Database::getConnection();
        $query = $db->prepare('SELECT * FROM products WHERE avability=true ORDER BY id DESC LIMIT :count');
        $query->execute(['count'=>$count]);
        $result = $query->fetchAll();

        return $result;
    } 

    public static function getLatestProductsByCategory($categoryId, $page, $count = self::SHOW_BY_DEFAULT)
    {
        $db = Database::getConnection();
        $offset = ($page-1)*$count;

        $query = $db->prepare('SELECT * FROM products 
                               WHERE avability=true AND category_id=:categoryId 
                               ORDER BY id DESC 
                               LIMIT :count OFFSET :offset');
        $query->execute(
            [
                'categoryId'=>$categoryId,
                'count' => $count,
                'offset' => $offset
            ]
        );

        $products = $query->fetchAll();

        return $products;
    }

    public static function getProductsByIds($ids)
    {
        $db = Database::getConnection();
        $place_holders = implode(',', array_fill(0, count($ids), '?'));

        $query = $db->prepare("SELECT id, name, price FROM products WHERE avability=true AND id IN ($place_holders)");
        $query->execute($ids);

        $result = $query->fetchAll();

        return $result;
    }

    public static function getTotalProductInCategory($categoryId)
    {
        $db = Database::getConnection();
        $query = $db->prepare('SELECT count(name) AS count FROM products WHERE avability=true AND category_id=:category_id');
        $query->execute(['category_id' => $categoryId]);

        $total = $query->fetch();

        return $total['count'];
    }


    public static function getTotalAllProducts()
    {
        $db = Database::getConnection();
        $query = $db->query('SELECT count(name) AS count FROM products WHERE avability=true');

        $total =$query->fetch();
        return $total['count'];
    }

    private static function getLastId()
    {
        $db = Database::getConnection();
        $query =  $db->query("SELECT MAX(id) as id FROM products");
        $last_id = $query->fetch();
        return $last_id['id'];
    }

    public static function getRecommendedProducts()
    {
        $db = Database::getConnection();
        $query = $db->query("SELECT * FROM products WHERE is_recommended = true AND avability = true");
        $result = $query->fetchAll();

        return $result;
    }   

    public static function createProduct($newProduct)
    {
        $db = Database::getConnection();
        $query = $db->prepare('INSERT INTO products(name, category_id, price, avability, brand, description, is_new, is_recommended)
                               VALUES (:name, :category_id, :price, :avability, :brand, :description, :is_new, :is_recommended)');
        $query->execute(
            [
                'name' => $newProduct['name'], 
                'category_id' => $newProduct['category_id'],
                'price' => $newProduct['price'],
                'avability' => $newProduct['avability'],
                'brand' => $newProduct['brand'],
                'description' => $newProduct['description'],
                'is_new' => $newProduct['is_new'],
                'is_recommended' => $newProduct['is_recommended']
            ]
        );
        
        $result = self::getLastId(); 

        return $result;
    }




    public static function updateProduct($product)
    {  
        $db = Database::getConnection();
        $query = $db->prepare('UPDATE products
                               SET name = :name, 
                                   category_id = :category_id,
                                   price = :price,
                                   avability = :avability,
                                   brand = :brand,
                                   description = :description, 
                                   is_new = :is_new, 
                                   is_recommended = :is_recommended 
                               WHERE id = :id');

        $result = $query->execute(
            [
                'id' => $product['id'],
                'name' => $product['name'], 
                'category_id' => $product['category_id'],
                'price' => $product['price'],
                'avability' => $product['avability'],
                'brand' => $product['brand'],
                'description' => $product['description'],
                'is_new' => $product['is_new'],
                'is_recommended' => $product['is_recommended']
            ]
        );

        return $result;
    }

    public static function deleteProduct($id)
    {
        $db = Database::getConnection();
        $query = $db->prepare('DELETE FROM products WHERE id = :id');
        $query->execute(['id' => $id]);
        $result = $query->fetch();

        Product::deleteImg($id);

        return $result;
    }

    public static function getImgUrl($id)
    {
        $file = '/template/images/products/'.$id.'.jpg';
        $default = '/template/images/products/default.jpg';

        if (file_exists("." . $file)) {
            return $file;
        } else {
            return $default;
        }
    }

    public static function deleteImg($id)
    {
        $file = "./template/images/products/".$id.".jpg";
        if (file_exists($file)) {
            unlink($file);
        }
    }

    public static function setImg($id)
    {
        $file_tmp = $_FILES['image']['tmp_name'];
        if (is_uploaded_file($file_tmp)) {
          self::deleteImg($id);
          move_uploaded_file($file_tmp, './template/images/products/'.$id.".jpg");
        }
    }
}
