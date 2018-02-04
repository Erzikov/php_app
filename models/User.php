<?php 
namespace models;

use components\Database;

Class User
{
    public static function checkName($name)
    {
        if (strlen($name) >= 6) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkExistsEmail($email)
    {
        $db = Database::getConnection();

        $query = $db->prepare('SELECT COUNT(email) AS email FROM users WHERE email = :email');
        $query->execute(array("email" => $email));

        $result = $query->fetch();	

        if ($result['email']) {
            return true;
        } else {
            return false;
        }
    }

    public static function createUser($name, $email, $password)
    {
        $db = Database::getConnection();
        $query = $db->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');

        $password = password_hash($password, PASSWORD_DEFAULT);

        $result = $query->execute(array('name'=>$name, 'email'=>$email, 'password'=>$password));
			 
        return $result;
    }

    public static function updateUser($id, $name, $number)
    {
        $db = Database::getConnection();
        $query = $db->prepare('UPDATE users SET name = :name, number = :number WHERE id = :id');

        $result = $query->execute(array('id' => $id, 'name'=>$name, 'number' => $number));
             
        return $result;
    }

    public static function updatePassword($id, $password)
    {
        $db = Database::getConnection();
        $query = $db->prepare('UPDATE users SET password = :password WHERE id = :id'); 

        $password = password_hash($password, PASSWORD_DEFAULT);

        $result = $query->execute(array('id' => $id, 'password'=>$password));

        return $result;
    }

    public static function saveOrder($id, $order)
    {
        $db = Database::getConnection();
        $query = $db->prepare('UPDATE users SET order_products = :order WHERE id = :id');

        $jsonOrder = json_encode($order);

        $result = $query->execute(array('id' => $id, 'order' => $jsonOrder));
        
        return $result;
    }   

    public static function verificationUser($email, $password)
    {
        $db = Database::getConnection();
        $query = $db->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute(array('email' => $email));

        $user = $query->fetch();

        if ($user) {
            if (password_verify($password, $user['password'])) {    
                return $user;
            } else {
                return false;
            }
        } else { 
            return false;
        }
    }

    public static function getUserById($id)
    {
        $db = Database::getConnection();
        $query = $db->prepare('SELECT * FROM users WHERE id = :id');
        $query->execute(array('id'=>$id));

        $user = $query->fetch();

        return $user;       
    }

    public static function getAllUsers()
    {
        $db = Database::getConnection();
        $query = $db->query('SELECT id, name, email, number, admin FROM users');

        $result = $query->fetchAll();
        return $result;
    }

    public static function deleteUser($id)
    {
        $db = Database::getConnection();
        $query = $db->prepare('DELETE FROM users WHERE id = :id');
        $query->execute(array('id'=>$id));
        $result = $query->fetch();
        
        return $result;
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        } else {
            return true;
        }
    }

    public static function isAdmin()
    {
        if (!self::isGuest()) {
            if ($_SESSION['user']['admin']) {
                return true;
            }
        } else {
            return false;
        }
    }
}
	

