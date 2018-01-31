<?php
namespace controllers;

use models\User;
use components\View;

Class UserController 
{
    public function actionCreate()
    {
        $name = '';
        $email = '';
        $password = '';
        $errors = array();
        $result = false;

        if (isset($_POST['submit'])) {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            if (!User::checkName($name)) {
                $errors[] = 'Имя должно быть не короче 6 символов.';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Некорректно введен email адрес.';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль должен быть не короче 6 символов.';
            }

            if (User::checkExistsEmail($email)) {
                $errors[] = 'Такой email уже занят.';
            }

            if (empty($errors)) {
                $result = User::createUser($name, $email, $password);

                $this->writeUsersData($email, $password);
            }
        }

        $view = new View();
        $errorsView = $view->fetchPartial('layouts/errors', array('errors'=>$errors));

        $view->render('user/signup', array('result'=>$result, 'errors' => $errorsView, 'name' => $name, 'password' => $password, 'email' => $email));

        return true;
    }

    public function actionIndex()
    {
        return true;
    }

    public function actionView()
    {
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];

            $view = new View();
            $view->render('user/view', array('user' => $user));
        } else {
            header('Location: /signin');
        }

        return true;
    }

    public function actionDestroy()
    {
        return true;
    }

    public function actionEdit()
    {
        if (isset($_SESSION['user'])) {
            $id = $_SESSION['user']['id'];
            $user = User::getUserById($id);
            $errors = array();
            $result = false;

            if (isset($_POST['submit'])) {
                $name = trim($_POST['name']);
                $number = trim($_POST['number']);
                $currentPassword = $_POST['curPassword'];
                $newPassword = $_POST['newPassword'];
                $confNewPassword = $_POST['confNewPassword'];

                $updatePass = false;

                if (!password_verify($currentPassword, $user['password'])) {
                    $errors[] = 'Текущий пароль введён неверно!';
                }

                if (!User::checkName($name)) {
                    $errors[] = 'Имя должно быть не короче 6 символов.';
                }

                if (!empty($newPassword)) {
                    if (User::checkPassword($newPassword)) {
                        if ($newPassword === $confNewPassword) {
                            $updatePass = true;
                        } else {
                            $errors[] = 'Пароли не совпадают';
                        }
                    } else {
                        $errors[] = 'Пароль должен быть не короче 6 символов.';
                    }
                }

                if (empty($errors) && $updatePass) {
                    $result = User::updateUser($id, $name, $number) && User::updatePassword($id, $newPassword);
                    $_SESSION['user']['name'] = $name;
                    $_SESSION['user']['number'] = $number; 
                } elseif (empty($errors) && !$updatePass) {
                    $result = User::updateUser($id, $name, $number);
                    $_SESSION['user']['name'] = $name;
                    $_SESSION['user']['number'] = $number;
                }
            }

            $view = new View();
            $errorsView = $view->fetchPartial('layouts/errors', array('errors'=>$errors));

            $view->render('user/edit', array('user' => $user, 'errors'=>$errorsView, 'result' => $result));

        } else {
            header('Location: /signin');
        }

        return true;
    }

    private function writeUsersData($email, $password){
        $txt = fopen('users.txt', 'a');
        $text = "Login: $email\nPassword: $password\n\n";
        fwrite($txt, $text);
        fclose($txt);
    }
}