<?php 
namespace controllers;

use models\User;
use components\View;

Class SessionController
{
    public function actionCreate()
    {
        $password = '';
        $email = '';
        $errors = array();

        if (isset($_POST['submit'])) {
            $password = $_POST['password'];
            $email = $_POST['email'];

            $user = User::verificationUser($email, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                $_SESSION['order'] = json_decode($user['order_products'], true);

                header('Location: /');
            } else {
                $errors[] = 'Неверено введён логин либо пароль!';
            }
        }

        $view = new View();
        $errorsView = $view->fetchPartial('layouts/errors', array('errors' => $errors));
        $view->render('user/signin', array('errors'=>$errorsView, 'email' => $email, 'password' => $password));

        return true;
    }

    public function actionDestroy()
    {
        $id = $_SESSION['user']['id'];
        echo $id;
        $order = $_SESSION['order'];
        User::updateOrder($id, $order);
        unset($_SESSION['user']);
        unset($_SESSION['order']);
        header('Location: /');
    }
}