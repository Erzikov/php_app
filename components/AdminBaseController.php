<?php 
namespace components;

use models\User; 

class AdminBaseController
{   
    public $view;

    public function __construct()
    {
        if (User::isAdmin()) {
            $this->view = new View('admin/main');
        } else {
            echo "Недостаточно прав";
            exit;
        }
    }
}