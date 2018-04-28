<?php 
namespace controllers;

use models\User;
use components\BaseController;

Class SessionController extends BaseController
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
                $_SESSION['order'] = json_decode($user['cart'], true);

                header('Location: /');
            } else {
                $errors[] = 'Неверено введён логин либо пароль!';
            }
        }

        $errorsView = $this->view->fetchPartial('layouts/errors', array('errors' => $errors));
        $this->view->render('user/signin', array('errors'=>$errorsView, 'email' => $email, 'password' => $password));

        return true;
    }

    public function actionDestroy()
    {
        $id = $_SESSION['user']['id'];
        $order = $_SESSION['order'];

        User::saveCart($id, $order);

        unset($_SESSION['user']);
        unset($_SESSION['order']);
        
        header('Location: /');

        return true;
    }
}