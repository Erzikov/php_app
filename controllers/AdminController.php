<?php 
namespace controllers;

use components\AdminBaseController;
use models\User;

class AdminController extends AdminBaseController
{
    public function actionUsers()
    {
        $content = $this->getPartialUsers();
        $this->view->renderPartial('admin/main', array('content' => $content));
        
        return true;
    }

    public function actionDeleteUser($id)
    {
        User::deleteUser($id);
        echo $this->getPartialUsers();

        return true;
    }

    private function getPartialUsers()
    {
        $users = User::getAllUsers();
        return $this->view->fetchPartial('admin/users', array('users' => $users));
    }
}