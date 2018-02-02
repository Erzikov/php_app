<?php 
namespace controllers;

use components\AdminBaseController;

class AdminController extends AdminBaseController
{
    public function actionIndex()
    {
        $this->view->render('admin/index');
        return true;
    }
}