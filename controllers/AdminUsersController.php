<?php 
namespace controllers;

use components\{AdminBaseController, Pagination};
use models\User;

class AdminUsersController extends AdminBaseController
{
    public function actionIndex(int $currentPage = 1)
    {
        $total = User::getTotalUsers();
        $limit = 6;
        $pagination = new Pagination($total, $currentPage, $limit, 'page-');
        $users = User::getAllUsers($currentPage, $limit);

        $this->view->render('admin/users/index', array('users' => $users, 'pagination' => $pagination));
        
        return true;
    }

    public function actionDeleteUser($id)
    {
        User::deleteUser($id);
        return true;
    }
}